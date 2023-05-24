<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use App\Models\Reward;
use App\Models\RewardType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\RewardRequest;

class RewardController extends Controller
{
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
    return view('front.rewards.index',compact('data'));
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

    return view('front.rewards.create',compact('employees','types','allStatus'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(RewardRequest $request)
   {


       $reward = Reward::create($request->all());
       if ($reward->getTranslation('status','en')=='approve'&&$reward->rtype->getTranslation('name','en')=='vacation days') {
        if ($reward->user->userVacation->vacation_balance>=$reward->reward_value) {

            $reward->user->userVacation()->update(['vacation_balance'=>($reward->user->userVacation->vacation_balance+$reward->reward_value)]);
        }
   }
       return redirect()->route('company.rewards.index')
                       ->with('success','Incentive has been added successfully');
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
       return view('front.rewards.show',compact('reward'));
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

       return view('front.rewards.edit',compact('reward','employees','types','allStatus'));
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
       if ($reward->getTranslation('status','en')=='approve'&&$reward->rtype->getTranslation('name','en')=='vacation days') {

        $sub=(int)$reward->user->userVacation->vacation_balance-(int)$reward->reward_value;
        $reward->user->userVacation()->update(['vacation_balance'=>(int)$sub]);

        }
       $reward->update($request->all());
       if ($reward->getTranslation('status','en')=='approve'&&$reward->rtype->getTranslation('name','en')=='vacation days'&&$reward->user->userVacation->vacation_balance>=$reward->reward_value) {

        $reward->user->userVacation()->update(['vacation_balance'=>(int)$sub+(int)$reward->reward_value]);

}

       return redirect()->route('company.rewards.show',$reward->id)
                       ->with('success','Incentive has been updated successfully');
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
