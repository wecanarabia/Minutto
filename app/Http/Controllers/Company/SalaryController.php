<?php

namespace App\Http\Controllers\Company;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alert;
use App\Models\Extra;
use App\Models\Leave;
use App\Models\Branch;
use App\Models\Reward;
use App\Models\Salary;
use App\Models\Advance;
use App\Models\Workhour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\SalaryRequest;

class SalaryController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->get();
        if (count($employees)>0) {
            $data['leaves'] = Leave::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employees)->get()->sum('discount_value');
            $data['workhours'] = Workhour::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employees)->get()->sum('discount_value');
            $data['advances'] = Advance::whereMonth('created_at', Carbon::now()->month)->where('value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('value');
            $data['extras'] = Extra::whereMonth('created_at', Carbon::now()->month)->where('amount', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('amount');
            $data['rewards'] = Reward::whereMonth('created_at', Carbon::now()->month)->where('reward_value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('reward_value');
            $data['alerts_in_days'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', 'Salary number of working days')->whereBelongsTo($employees)->with('user')
            ->get()->map(function ($alert) {
                $alert->salary = $alert->punishment * $alert->user->daily_salary;
                return $alert;
            })->sum('salary');
            $data['alerts'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', '!=', 'Salary number of working days')->where('type->en', '!=', 'vacation days')->whereBelongsTo($employees)->get()->sum('punishment');
            $data['salaries'] = Salary::whereMonth('created_at', Carbon::now()->month)->whereBelongsTo($employees)->get();

        }else{
            $data['salaries'] = collect([]);
        }
        $employeesNoSalary = User::active()->whereDoesntHave('salary')->thisMonth($now)->whereBelongsTo($branches)->get();
        return view('front.salaries.index',compact('data','employeesNoSalary'));

    }

    public function generate()
    {
        $now = Carbon::now();
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->notOfThisMonth($now)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $salaryOfMonth = Salary::whereMonth('created_at', Carbon::now()->month)->whereBelongsTo($employees)->get();
            if (count($salaryOfMonth)==0) {
                foreach ($employees as $employee) {
                    $data['leaves'] = Leave::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employee)->get()->sum('discount_value');
                    $data['workhours'] = Workhour::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employee)->get()->sum('discount_value');
                    $data['advances'] = Advance::whereMonth('created_at', Carbon::now()->month)->where('value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('value');
                    $data['extras'] = Extra::whereMonth('created_at', Carbon::now()->month)->where('amount', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('amount');
                    $data['rewards'] = Reward::whereMonth('created_at', Carbon::now()->month)->where('reward_value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('reward_value');
                    $data['alerts_in_days'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', 'Salary number of working days')->whereBelongsTo($employee)->with('user')
                    ->get()->map(function ($alert) {
                        $alert->salary = $alert->punishment * $alert->user->daily_salary;
                        return $alert;
                    })->sum('salary');
                    $data['alerts'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', '!=', 'Salary number of working days')->where('type->en', '!=', 'vacation days')->whereBelongsTo($employees)->get()->sum('punishment');

                    $salary = new Salary([
                        'actual_salary'=>$employee->monthly_salary,
                        'discounts'=>(int)$data['workhours']+(int)$data['leaves']+(int)$data['alerts']+(int)$data['alerts_in_days'],
                        'advances'=>(int)$data['advances'],
                        'incentives_and_extra'=>(int)$data['rewards']+(int)$data['extras'],
                        'net_salary'=>((int)$data['rewards']+(int)$data['extras']+$employee->monthly_salary)-($data['advances']+(int)$data['workhours']+(int)$data['leaves']+(int)$data['alerts']+(int)$data['alerts_in_days']),
                    ]);
                    $employee->salary()->save($salary);
                }
            }
        }
        return redirect()->route('company.salaries.index')
        ->with('success','Salary of this month has been generated successfully');
    }


     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = Carbon::now();
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->thisMonth($now)->whereDoesntHave('salary')->get();
        return view('front.salaries.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalaryRequest $request)
    {
        $now = Carbon::now();

        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employee = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->thisMonth($now)->whereDoesntHave('salary')->find($request['user_id']);
        if ($employee) {
            Salary::create($request->all());
        }else {
            return redirect()->back();
        }
        return redirect()->route('company.salaries.index')
                        ->with('success','Salary has been added successfully');
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $salary = Salary::find($id);
        if (!in_array($salary->user->id,$employees)) {
            return abort('404');
        }
        return view('front.salaries.salary-details',compact('salary'));
    }


    public function update()
    {
        $now = Carbon::now();
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->notOfThisMonth($now)->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $salaryOfMonth = Salary::whereMonth('created_at', Carbon::now()->month)->whereBelongsTo($employees)->get();
            if (count($salaryOfMonth)>0) {
                foreach ($employees as $employee) {
                    $data['leaves'] = Leave::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employee)->get()->sum('discount_value');
                    $data['workhours'] = Workhour::whereMonth('created_at', Carbon::now()->month)->where('discount_value', '>', 0)->whereBelongsTo($employee)->get()->sum('discount_value');
                    $data['advances'] = Advance::whereMonth('created_at', Carbon::now()->month)->where('value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('value');
                    $data['extras'] = Extra::whereMonth('created_at', Carbon::now()->month)->where('amount', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('amount');
                    $data['rewards'] = Reward::whereMonth('created_at', Carbon::now()->month)->where('reward_value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employee)->get()->sum('reward_value');
                    $data['alerts_in_days'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', 'Salary number of working days')->whereBelongsTo($employee)->with('user')
                    ->get()->map(function ($alert) {
                        $alert->salary = $alert->punishment * $alert->user->daily_salary;
                        return $alert;
                    })->sum('salary');
                    $data['alerts'] = Alert::whereMonth('created_at', Carbon::now()->month)->where('punishment', '>', 0)->where('type->en', '!=', 'Salary number of working days')->where('type->en', '!=', 'vacation days')->whereBelongsTo($employees)->get()->sum('punishment');

                    $employee->salary()->update([
                        'actual_salary'=>$employee->monthly_salary,
                        'discounts'=>(int)$data['workhours']+(int)$data['leaves']+(int)$data['alerts']+(int)$data['alerts_in_days'],
                        'advances'=>(int)$data['advances'],
                        'incentives_and_extra'=>(int)$data['rewards']+(int)$data['extras'],
                        'net_salary'=>((int)$data['rewards']+(int)$data['extras']+$employee->monthly_salary)-($data['advances']+(int)$data['workhours']+(int)$data['leaves']+(int)$data['alerts']+(int)$data['alerts_in_days']),
                    ]);
                }
            }
        }
        return redirect()->route('company.salaries.index')
        ->with('success','Salary of this month has been updated successfully');
    }
}
