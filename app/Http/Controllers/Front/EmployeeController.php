<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Branch;
use App\Models\Salary;
use App\Traits\LogTrait;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\EmployeeVacation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\UserRequest;
use App\Http\Requests\Company\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    use LogTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->orderByDesc('created_at')->get();

        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();
        return view('company.employees.members',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $departments = Department::where('company_id', Auth::user()->company_id)->get();
        $shifts = Shift::whereHas('branches', function($q){
            $q->whereIn('branch_id',Branch::where('company_id', Auth::user()->company_id)->pluck('id'));
        })->get();
        $employee = User::whereBelongsTo($branches)->with(['branch','shift'])->findOrFail($id);
        return view('company.employees.employee-profile',compact('employee','branches','shifts','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $user = User::findOrFail($id);
        if ($request->active&&(is_null($user->daily_salary)||is_null($user->monthly_salary)||is_null($user->hourly_salary)||is_null($user->department_id)||is_null($user->branch_id)||is_null($user->shift_id)||is_null($user->work_start))){
            return redirect()->back()->with('error','Salary Info And Work Info Are Required to activate Employee Account');
        }

        if ($request->has('password')&&$request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('image')  && File::exists($user->image)) {
            unlink($user->image);
        }
        if ($request->has('nationality')||$request->has('gender')||$request->has('address')) {
            $this->addLog($user->id, 'Update Employee Data', 'تحديث بيانات الموظف', 'Employee personal information has been updated', 'تم تحديث المعلومات الشخصية لموظف');
        }else if ($request->has('bank_name')||$request->has('account_number')||$request->has('swift_number')) {
            $this->addLog($user->id, 'Update Employee Data', 'تحديث بيانات الموظف', 'Employee bank information has been updated', 'تم تحديث المعلومات البنكية لموظف');
        }else if ($request->has('work_start')||$request->has('contract_expire')||$request->has('branch_id')) {
            $this->addLog($user->id, 'Update Employee Data', 'تحديث بيانات الموظف', 'Employee work information has been updated', 'تم تحديث معلومات العمل لموظف');
        }else if ($request->has('name')||$request->has('phone')||$request->has('email')) {
            $this->addLog($user->id, 'Update Employee Data', 'تحديث بيانات الموظف', 'Employee profile information has been updated', 'تم تحديث معلومات الحساب التعريفي لموظف');
        }else if ($request->has('monthly_salary')||$request->has('daily_salary')||$request->has('hourly_salary')) {
            $this->addLog($user->id, 'Update Employee Data', 'تحديث بيانات الموظف', 'Employee salary information has been updated', 'تم تحديث معلومات الراتب لموظف');
        }
        $user->update($request->all());
        if($user->active&&is_null($user->salary)){
            $salary = new Salary([
                "year"=>Carbon::now()->year,
                "month"=>Carbon::now()->month,
                'net_salary'=>$user->daily_salary,
            ]);
            $user->salary()->save($salary);
        }
        if($user->active&&(is_null($user->UserVacations()?->latest()?->first()?->year)||$user->UserVacations()?->latest()?->first()?->year!=Carbon::now()->year)){

            EmployeeVacation::create([
                'vacation_balance'=>Auth::user()->company->holidays_count+Auth::user()->company->sick_leaves,
                'user_id'=>$user->id,
                'year'=>Carbon::now()->year,
            ]);
        }

        return redirect()->route('front.employees.show',$user->id)
        ->with('success','Employeet of this year has been update successfully');

    }

}
