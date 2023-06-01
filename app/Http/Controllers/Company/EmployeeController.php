<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Shift;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\UpdateEmployeeRequest;
use App\Traits\LogTrait;

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
        return view('front.employees.members',compact('employees'));
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
        $employee = User::whereBelongsTo($branches)->with(['branch','shift'])->find($id);
        return view('front.employees.employee-profile',compact('employee','branches','shifts','departments'));
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
    public function updateData(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        if ($request['image']=='undefined') {
            unset($request['image']);
        };
        $validator = Validator::make($request->all(), $this->rules($user));

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
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

        return response()->json(['success' => 'User updated successfully.']);

    }
    public function rules($user)
    {
        return [
            'nationality'=>'sometimes|min:4|max:255',
            'gender'=>'sometimes|in:male,female',
            'marital_status'=>'sometimes|min:4|max:255',
            'date_of_birth'=>'sometimes|date',
            'passport_identity'=>'sometimes|min:4|max:255',
            'national_identity'=>'sometimes|min:4|max:255',
            'emergency_contact'=>'sometimes|min:4|max:255',
            'bank_name'=>'sometimes|min:4|max:255',
            'account_number'=>'sometimes|min:4|max:255',
            'bank_branch'=>'sometimes|min:4|max:255',
            'ipan'=>'sometimes|min:4|max:255',
            'swift_number'=>'sometimes|min:4|max:255',
            'career'=>'sometimes|min:4|max:255',
            'description'=>'sometimes|min:4|max:2000',
            'duration_of_contract'=>'sometimes|numeric|min:0',
            'monthly_salary'=>'sometimes|numeric|min:0',
            'daily_salary'=>'sometimes|numeric|min:0',
            'hourly_salary'=>'sometimes|numeric|min:0',
            'contract_expire'=>'sometimes|date',
            'department_id'=>'sometimes|exists:departments,id',
            'branch_id'=>'sometimes|exists:branches,id',
            'shift_id'=>'sometimes|exists:shifts,id',
            'work_start'=>'sometimes|date',
            'address'=>'sometimes|min:4|max:255',
            'name'=>'sometimes|min:4|max:255',
            'last_name'=>'sometimes|min:4|max:255',
            'phone' => 'sometimes|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.$user->id,
            'email'=>'sometimes|min:4|max:255|unique:users,email,'.$user->id,
            'password'=>['nullable',"min:8"],
            'image'=>'nullable|image|mimes:jpg,jpeg,gif,png|max:4000',
            'active'=>'sometimes|in:0,1',
        ];
    }

}
