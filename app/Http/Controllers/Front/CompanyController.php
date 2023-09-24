<?php

namespace App\Http\Controllers\Front;

use DateTimeZone;
use App\Models\Role;
use App\Models\Shift;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Workday;
use App\Models\Department;
use App\Models\RewardType;
use App\Models\CompanyAdmin;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\ShiftRequest;
use App\Http\Requests\Company\BranchRequest;
use App\Http\Requests\Company\CompanyRequest;
use App\Http\Requests\Company\DepartmentRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['CheckCompany','timezone','can:company'])->only(['edit', 'update','show']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $branch = $request->session()->get('branch');
        $shift = $request->session()->get('shift');
        $department = $request->session()->get('department');
        $subscriptions = Subscription::all();
        $timezones = DateTimeZone::listIdentifiers();
        return view('company.company-settings.create',compact('company','subscriptions','timezones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        if(empty($request->session()->get('company'))){
            $company = new Company();
            $request['code']=$this->getCode($request->english_name);
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
            $company->fill($request->except([
                'english_name',
                'arabic_name',
                'english_description',
                'arabic_description',
                 ]));
            $request->session()->put('company', $company);
        }else{
            $company = $request->session()->get('company');
            $request['code']=$this->getCode($request->english_name);
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
            $company->fill($request->except([
                'english_name',
                'arabic_name',
                'english_description',
                'arabic_description',
                 ]));
            $request->session()->put('company', $company);
        }
    return redirect()->route('front.company-settings.branch.create');
    }
    public function createBranch(Request $request)
    {
        $branch = $request->session()->get('branch');

        return view('company.company-settings.create-branch',compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBranch(BranchRequest $request)
    {
        if(empty($request->session()->get('branch'))){
            $branch = new Branch();
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $branch->fill($request->except([
            'english_name',
            'arabic_name',
             ]));
            $request->session()->put('branch', $branch);
        }else{
            $branch = $request->session()->get('branch');
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $branch->fill($request->except([
            'english_name',
            'arabic_name',
             ]));
            $request->session()->put('branch', $branch);
        }

        return redirect()->route('front.company-settings.department.create');
    }


    public function createDepartment(Request $request)
    {
        $department = $request->session()->get('department');
        return view('company.company-settings.create-department',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDepartment(DepartmentRequest $request)
    {
        if(empty($request->session()->get('department'))){
            $department = new Department();

            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
            $department->fill($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
             ]));
            $request->session()->put('department', $department);
        }else{
            $department = $request->session()->get('department');
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
            $department->fill($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
             ]));
            $request->session()->put('department', $department);
        }

        return redirect()->route('front.company-settings.shift.create');
    }
    public function createShift(Request $request)
    {
        $shift = $request->session()->get('shift');
        return view('company.company-settings.create-shift',compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeShift(ShiftRequest $request)
    {
        if(empty($request->session()->get('shift'))){
            $shift = new Shift();
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $shift->fill($request->except([
            'english_name',
            'arabic_name',
             ]));
            $request->session()->put('shift', $shift);
        }else{
            $shift = $request->session()->get('shift');
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $shift->fill($request->except([
            'english_name',
            'arabic_name',
             ]));
            $request->session()->put('shift', $shift);
        }

        return redirect()->route('front.company-settings.shift-workdays.create');
    }
    public function createWorkdays(Request $request)
    {
        $shift = $request->session()->get('shift');
        $days=Workday::WORKDAYS;
        return view('company.company-settings.create-workdays',compact('shift','days'));
    }

    public function storeWorkdays(Request $request)
    {
        $shift = $request->session()->get('shift');
        $branch = $request->session()->get('branch');
        $department = $request->session()->get('department');
        $company = $request->session()->get('company');
        $company->save();
        $branch->company_id=$company->id;
        $branch->save();
        $shift->company_id=$company->id;
        $shift->save();
        $department->company_id=$company->id;
        $department->save();
        $branch->shifts()->attach($shift->id);
        $role = Role::create([
            'name'=>['en'=>'admin','ar'=>'مسؤل'],
            'company_id'=>$company->id,
            'permissions'=>json_encode(array_keys(config('global.permissions'))),
        ]);
        CompanyAdmin::find(Auth::guard('company')->user()->id)->update(['company_id'=>$company->id,'role_id'=>$role->id]);
        $days=Workday::WORKDAYS;
        foreach (RewardType::DEFAULTTYPES as $value) {
            RewardType::create([
                'company_id'=>$company->id,
                'name'=>$value,
            ]);
        }
    foreach ($days as $i => $day) {
        if ($request[$day['en']]) {
            $validator = Validator::make([
                $day['en']."-from"=>$request[$day['en']."-from"],
                $day['en']."-to"=>$request[$day['en']."-to"],
                $day['en']=>$request[$day['en']],
                ], [
                    $day['en']."-from" => 'date_format:H:i',
                    $day['en']."-to" => 'date_format:H:i',
                    $day['en'] =>"in:1,2,3,4,5,6,7"
            ]);
            if ($validator->fails()) {
            Workday::create([
                    'day'=>$day,
                    'from'=>"00:00:00",
                    'to'=>"00:00:00",
                    'status'=>0,
                    'shift_id'=>$shift->id,
                ]);
            } else {
                Workday::create([
                    'day'=>$day,
                    'from'=>$request[$day['en']."-from"],
                    'to'=>$request[$day['en']."-to"],
                    'status'=>1,
                    'shift_id'=>$shift->id,
                ]);
            }
        }else{
            Workday::create([
                'day'=>$day,
                'from'=>"00:00:00",
                'to'=>"00:00:00",
                'status'=>0,
                'shift_id'=>$shift->id,
            ]);
        }
    }
    $request->session()->forget('shift');
    $request->session()->forget('branch');
    $request->session()->forget('department');
    $request->session()->forget('company');
        return redirect()->route('front.company-settings.show')->with(['success'=>'Company settings has been added Successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $company = Company::with('branches')->find(Auth::guard('company')->user()->company_id);
        $subscriptions = Subscription::all();
        $timezones = DateTimeZone::listIdentifiers();
        return view('company.company-settings.show',compact('company','subscriptions','timezones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit()
    // {
    //     $company = Company::find(Auth::guard('company')->user()->company_id);
    //     // $subscriptions = Subscription::all();
    //     // $timezones = DateTimeZone::listIdentifiers();
    //     return view('company.company-settings.edit',compact('company','subscriptions','timezones'));
    // }

    /**
    * Update the specified resource in storage.
    */
    public function update(CompanyRequest $request)
    {
        $company = Company::find(Auth::guard('company')->user()->company_id);
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $company->update($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
             ]));
        return redirect()->route('front.company-settings.show')->with(['success'=>'Company settings has been Updated Successfully']);

    }

    public function getCode($english_name)
    {
        $array_name=explode(" ",ucwords($english_name));
        if(count($array_name)>2) {
            $new_arr=[];
            foreach ($array_name as $value) {
                array_push($new_arr, $value[0]);
            }
            $code = implode("", $new_arr)."#".rand(10000, 100000);
        }else{
            $code = implode("", $array_name)."#".rand(10000, 100000);
         }
         return $code;
    }

}
