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
use App\Traits\LogTrait;

class SalaryController extends Controller
{
    use LogTrait;
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
            $data['salaries'] = Salary::whereMonth('created_at', Carbon::now()->month)->whereBelongsTo($employees)->orderByDesc('created_at')->get();
            $data['years'] = Salary::select('year')->distinct()->whereBelongsTo($employees)->pluck('year')??Carbon::now()->year;
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
            $salary = Salary::create($request->all());
            $this->addLog($salary->user->id, 'Add Employee salary', 'إضافة راتب لموظف', 'Employee salary has been added', 'تم إضافة راتب لموظف');
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

    public function filter(Request $request)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->get();
          ## Read value
      $draw = $request->get('draw');
      $start = $request->get("start");
      $rowperpage = $request->get("length"); // Rows display per page

      $columnIndex_arr = $request->get('order');
      $columnName_arr = $request->get('columns');
      $order_arr = $request->get('order');
      $search_arr = $request->get('search');

      $columnIndex = $columnIndex_arr[0]['column']; // Column index
      $columnName = $columnName_arr[$columnIndex]['data']; // Column name
      $columnSortOrder = $order_arr[0]['dir']; // asc or desc
      $searchValue = $search_arr['value']; // Search value

      // Custom search filter
      $month = $request->get('month');
      $year = $request->get('year');

      // Total records
      $records = Salary::whereBelongsTo($employees)->where('month',$month)->where('year',$year);


      $totalRecords = $records->count();

      // Total records with filter
            $records = Salary::select('count(*) as allcount')->whereBelongsTo($employees)->where('year',$year)->where('month',$month);
            if (!empty($searchValue)) {

            $records->whereHas('user',function($q)use($searchValue){
                $q->where('name','like',"%$searchValue%");
            })->orWhere('id','like',"%$searchValue%")
            ->orWhere('actual_salary','like',"%$searchValue%")->orWhere('net_salary','like',"%$searchValue%");
        }
      ## Add custom filter conditions
      if(!empty($month)){
       $records->where('month',$month);
      }
      if(!empty($year)){
        $records->where('year',$year);
      }

      $totalRecordswithFilter = $records->count();

      // Fetch records
            $records = Salary::select('salaries.*')->whereBelongsTo($employees)->where('year',$year)->where('month',$month)->orderBy($columnName, $columnSortOrder);
            if (!empty($searchValue)) {

                $records->whereHas('user',function($q)use($searchValue){
                    $q->where('name','like',"%$searchValue%");
                })->orWhere('id','like',"%$searchValue%")
                ->orWhere('actual_salary','like',"%$searchValue%")->orWhere('net_salary','like',"%$searchValue%");
            }
                ## Add custom filter conditions

      $slaries = $records->skip($start)
                   ->take($rowperpage)
                   ->get();
      $data = $this->getTotals($employees,$month,$year);
      $data['net']=$slaries->sum('net_salary');
      $data['actual']=$slaries->sum('actual_salary');
      $data['discounts']=$data['workhours'] + $data['leaves'] + $data['alerts_in_days'] + $data['alerts'];
      $data_arr = array();
      foreach($slaries as $salary){

         $id = $salary->id;
         $employee = " <img class='avatar rounded-circle' src='/".$salary->user->image."' alt=''>
         <a href='/employees/".$salary->user->id."' class='fw-bold text-secondary'>
         <span class='fw-bold ms-1'>".$salary->user->name."</span></a>";
         $year = $salary->year;
         $month = $salary->month;
         $actual_salary = $salary->actual_salary;
         $net_salary = $salary->net_salary;
         $show = "     <div class='btn-group' role='group' aria-label='Basic outlined example'>
         <a class='btn btn-outline-secondary' href='/salaries/".$salary->id."'><i class='icofont-location-arrow'></i></a>
     </div>";

         $data_arr[] = array(
             "id" => $id,
             "employee" => $employee,
             "month" => $month,
             "year" => $year,
             "actual_salary" => $actual_salary,
             "net_salary" => $net_salary,
             "show" => $show,
         );
      }

      $response = array(
         "draw" => intval($draw),
         "iTotalRecords" => $totalRecords,
         "iTotalDisplayRecords" => $totalRecordswithFilter,
         "aaData" => $data_arr,
         "additionalData" => $data,
      );

      return response()->json($response);
   }

   public function getTotals($employees,$month,$year)
   {
    if ($employees) {
        $data['leaves'] = Leave::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('discount_value', '>', 0)->whereBelongsTo($employees)->get()->sum('discount_value');
        $data['workhours'] = Workhour::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('discount_value', '>', 0)->whereBelongsTo($employees)->get()->sum('discount_value');
        $data['advances'] = Advance::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('value');
        $data['extras'] = Extra::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('amount', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('amount');
        $data['rewards'] = Reward::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('reward_value', '>', 0)->where('status->en', 'approve')->whereBelongsTo($employees)->get()->sum('reward_value');
        $data['alerts_in_days'] = Alert::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('punishment', '>', 0)->where('type->en', 'Salary number of working days')->whereBelongsTo($employees)->with('user')
        ->get()->map(function ($alert) {
            $alert->salary = $alert->punishment * $alert->user->daily_salary;
            return $alert;
        })->sum('salary');
        $data['alerts'] = Alert::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('punishment', '>', 0)->where('type->en', '!=', 'Salary number of working days')->where('type->en', '!=', 'vacation days')->whereBelongsTo($employees)->get()->sum('punishment');
        return $data;
    }

   }

}
