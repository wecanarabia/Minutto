<?php

namespace App\Http\Controllers\Company;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use App\Models\EmployeeVacation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\EmployeeVacationRequest;

class EmployeeVacationController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = EmployeeVacation::whereBelongsTo($employees)->orderByDesc('created_at')->get();
            $vacationsOfYear = EmployeeVacation::where('year',Carbon::now()->year)->whereBelongsTo($employees)->get();
            $employeesHasNoVacation = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->whereDoesntHave('userVacation')->get();
        }else{
            $data=collect([]);
        }
        return view('front.employee-vacations.index',compact('data',"vacationsOfYear",'employeesHasNoVacation'));
    }

    public function generate()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $vacationsOfYear = EmployeeVacation::where('year',Carbon::now()->year)->whereBelongsTo($employees)->get();
            if (count($vacationsOfYear)==0) {
                foreach ($employees as $employee) {
                    $vacation = new EmployeeVacation(['year' => Carbon::now()->year,'vacation_balance'=>(Auth::user()->company->sick_leaves+Auth::user()->company->holidays_count)]);
                    $employee->userVacation()->save($vacation);
                }
            }
        }
        return redirect()->route('company.employee-vacations.index')
        ->with('success','Vacations of this year has been generated successfully');
    }


     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->whereDoesntHave('userVacation')->get();
        return view('front.employee-vacations.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeVacationRequest $request)
    {
        $request['year']=Carbon::now()->year;
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employee = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->whereDoesntHave('userVacation')->find($request['user_id']);
        if ($employee) {
            EmployeeVacation::create($request->all());
        }else {
            return redirect()->back();
        }
        return redirect()->route('company.employee-vacations.index')
                        ->with('success','Employee Vacation has been added successfully');
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = EmployeeVacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        return view('front.employee-vacations.vacation-details',compact('vacation'));
    }


    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();
        $validator = Validator::make($request->all(), [
            'vacation_balance'=>'required|numeric|min:0',

        ]);

        $vacation = EmployeeVacation::find($id);

        if ($validator->fails()||!in_array($vacation->user->id,$employees)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $vacation->update($request->all());
        return response()->json(['success' => 'Advance updated successfully.']);
    }
}
