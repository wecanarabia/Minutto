<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use App\Models\Reward;
use App\Models\RewardType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\RewardRequest;
use App\Traits\LogTrait;

class RewardController extends Controller
{
    use LogTrait;
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->get();
    if ($employees->count()>0) {
        $data = Reward::whereBelongsTo($employees)->orderByDesc('created_at')->get();
    }else{
        $data=collect([]);
    }
    return view('company.rewards.index',compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->get();
    $types = RewardType::where('company_id', Auth::user()->company_id)->get();
    $allStatus=Reward::STATUS;

    return view('company.rewards.create',compact('employees','types','allStatus'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(RewardRequest $request)
   {


       $reward = Reward::create($request->all());
       $this->addLog($reward->user->id, 'Add Employee Allownce Request', 'إضافة طلب بدل لموظف', 'Employee Allownce Request has been added', 'تم إضافة طلب بدل لموظف',$request['note']);

       return redirect()->route('front.rewards.index')
                       ->with('success','Allowance Request has been added successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
       $reward = Reward::with('user')->findOrFail($id);
       if ($reward->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }
       return view('company.rewards.show',compact('reward'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
    $reward = Reward::with('user')->findOrFail($id);
    if ($reward->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }


       $branches = Branch::where('company_id', Auth::user()->company_id)->get();
       $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->get();
       $types = RewardType::where('company_id', Auth::user()->company_id)->get();
       $allStatus=Reward::STATUS;

       return view('company.rewards.edit',compact('reward','employees','types','allStatus'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(RewardRequest $request, string $id)
   {


    $reward = Reward::with('user')->findOrFail($id);
    if ($request->has('file')&&$reward->file&&File::exists($reward->file)) {
        unlink($reward->file);
    }
    if ($reward->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }

        if ($reward->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($reward->user->id,'Update Employee Allowance Request','تحديث طلب بدل لموظف','Employee Allowance Request has been approved','تم الموافقة على طلب بدل',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($reward->user->id,'Update Employee Allowance Request','تحديث طلب بدل لموظف','Employee Allowance Request has been rejected','تم رفض  طلب بدل',$request['note']);
            };
        }else{
            $this->addLog($reward->user->id, 'Update Employee Allowance Request', 'تحديث طلب بدل لموظف', 'Employee Allowance Request has been updated', 'تم تحديث طلب بدل لموظف',$request['note']);
        }

       $reward->update($request->all());


       return redirect()->route('front.rewards.show',$reward->id)
                       ->with('success','Allowance Request has been updated successfully');
   }
   public function openFile($id)
   {
    $reward = Reward::with('user')->findOrFail($id);
    if ($reward->user->branch->company_id!=Auth::user()->company_id) {
           return abort('404');
       }
       return response()->file($reward->file);
   }
}
