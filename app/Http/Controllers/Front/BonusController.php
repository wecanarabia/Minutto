<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Bonus;
use App\Models\Branch;
use App\Traits\LogTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\BonusRequest;

class BonusController extends Controller
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
      $data = Bonus::whereBelongsTo($employees)->orderByDesc('date')->get();
  }else{
      $data=collect([]);
  }
  return view('company.bonus.index',compact('data'));
 }

 /**
  * Show the form for creating a new resource.
  */
 public function create()
 {
  $branches = Branch::where('company_id', Auth::user()->company_id)->get();
  $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->get();
  $types=Bonus::TYPES;

  return view('company.bonus.create',compact('employees','types'));
 }

 /**
  * Store a newly created resource in storage.
  */
 public function store(BonusRequest $request)
 {


     $bonus = Bonus::create($request->all());
     $this->addLog($bonus->user->id,'Add Bonus','إضافة مكافئة','Bonus has been added to employee','تم إضافة مكافئة على موظف',$bonus->note);
     if ($bonus->getTranslation('type','en')=='vacation days') {
          if ($bonus->user->userVacation->vacation_balance>=$bonus->value) {
              $bonus->user->userVacation()->update(['vacation_balance'=>($bonus->user->userVacation->vacation_balance+$bonus->value)]);
          }
     }


     return redirect()->route('front.bonus.index')
                     ->with('success',__('views.CREATED BONUS'));
 }

 /**
  * Display the specified resource.
  */
 public function show(string $id)
 {
     $bonus = Bonus::with('user')->findOrFail($id);
     if ($bonus->user->branch->company_id!=Auth::user()->company_id) {
         return abort(404);
     }
     return view('company.bonus.show',compact('bonus'));
 }

 /**
  * Show the form for editing the specified resource.
  */
 public function edit(string $id)
 {
    $bonus = Bonus::with('user')->findOrFail($id);
    if ($bonus->user->branch->company_id!=Auth::user()->company_id) {
         return abort(404);
     }


     $branches = Branch::where('company_id', Auth::user()->company_id)->get();
     $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->get();
     $types=Bonus::TYPES;

     return view('company.bonus.edit',compact('bonus','employees','types'));
 }

 /**
  * Update the specified resource in storage.
  */
 public function update(BonusRequest $request, string $id)
 {

  $bonus = Bonus::with('user')->findOrFail($id);
  if ($request->has('file')&&$bonus->file&&File::exists($bonus->file)) {
      unlink($bonus->file);
  }
  if ($bonus->user->branch->company_id!=Auth::user()->company_id) {
         return abort(404);
     }
     if ($bonus->getTranslation('type','en')=='vacation days') {

        $sum=(int)$bonus->user->userVacation->vacation_balance-(int)$bonus->value;
        $bonus->user->userVacation()->update(['vacation_balance'=>(int)$sum]);

      }
      $bonus->update($request->all());
      $this->addLog($bonus->user->id,'Update Bonus','تحديث مكافئة','Bonus has been updated on employee','تم تحديث مكافئة على موظف',$bonus->note);
     if ($bonus->getTranslation('type','en')=='vacation days') {

              $bonus->user->userVacation()->update(['vacation_balance'=>(int)$sum+(int)$bonus->value]);

      }
     return redirect()->route('front.bonus.show',$bonus->id)
                     ->with('success',__('views.UPDATED BONUS'));
 }


 public function openFile($id)
 {
  $bonus = Bonus::with('user')->findOrFail($id);
  if ($bonus->user->branch->company_id!=Auth::user()->company_id) {
         return abort('404');
     }
     return response()->file($bonus->file);
 }
}
