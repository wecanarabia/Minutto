<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Alert;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\AlertRequest;
use App\Traits\LogTrait;

class AlertController extends Controller
{
    use LogTrait;
      /**
    * Display a listing of the resource.
    */
   public function index()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::active()->whereBelongsTo($branches)->get();
    if ($employees->count()>0) {
        $data = Alert::whereBelongsTo($employees)->orderByDesc('alert_date')->get();
    }else{
        $data=collect([]);
    }
    return view('company.alerts.index',compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::active()->whereBelongsTo($branches)->get();
    $types=Alert::TYPES;

    return view('company.alerts.create',compact('employees','types'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(AlertRequest $request)
   {


       $alert = Alert::create($request->all());
       $this->addLog($alert->user->id,'Add Alert','إضافة مخالفة','Alert has been added to employee','تم إضافة مخالفة على موظف',$alert->note);
       if ($alert->getTranslation('type','en')=='vacation days') {
            if ($alert->user->userVacation->vacation_balance>=$alert->punishment) {
                $alert->user->userVacation()->update(['vacation_balance'=>($alert->user->userVacation->vacation_balance-$alert->punishment)]);
            }
       }
       return redirect()->route('front.alerts.index')
                       ->with('success','Alert has been added successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
       $alert = Alert::with('user')->findOrFail($id);
       if ($alert->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }
       return view('company.alerts.show',compact('alert'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
    $alert = Alert::with('user')->findOrFail($id);
    if ($alert->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }


       $branches = Branch::where('company_id', Auth::user()->company_id)->get();
       $employees = User::active()->whereBelongsTo($branches)->get();
       $types=Alert::TYPES;

       return view('company.alerts.edit',compact('alert','employees','types'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(AlertRequest $request, string $id)
   {

    $alert = Alert::with('user')->findOrFail($id);
    if ($request->has('file')&&$alert->file&&File::exists($alert->file)) {
        unlink($alert->file);
    }
    if ($alert->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }
       if ($alert->getTranslation('type','en')=='vacation days') {

        $sum=(int)$alert->user->userVacation->vacation_balance+(int)$alert->punishment;
        $alert->user->userVacation()->update(['vacation_balance'=>(int)$sum]);

        }
        $alert->update($request->all());
        $this->addLog($alert->user->id,'Update Alert','تحديث مخالفة','Alert has been updated on employee','تم تحديث مخالفة على موظف',$alert->note);
       if ($alert->getTranslation('type','en')=='vacation days'&&$alert->user->userVacation->vacation_balance>=$alert->punishment) {

                $alert->user->userVacation()->update(['vacation_balance'=>(int)$sum-(int)$alert->punishment]);

        }
       return redirect()->route('front.alerts.show',$alert->id)
                       ->with('success','Alert has been updated successfully');
   }


   public function openFile($id)
   {
    $alert = Alert::with('user')->findOrFail($id);
    if ($alert->user->branch->company_id!=Auth::user()->company_id) {
           return abort('404');
       }
       return response()->file($alert->file);
   }
}
