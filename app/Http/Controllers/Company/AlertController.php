<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Alert;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\AlertRequest;

class AlertController extends Controller
{
      /**
    * Display a listing of the resource.
    */
   public function index()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::whereBelongsTo($branches)->get();
    if ($employees->count()>0) {
        $data = Alert::whereBelongsTo($employees)->get();
    }else{
        $data=collect([]);
    }
    return view('front.alerts.index',compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
    $branches = Branch::where('company_id', Auth::user()->company_id)->get();
    $employees = User::whereBelongsTo($branches)->get();
    $types=Alert::TYPES;

    return view('front.alerts.create',compact('employees','types'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(AlertRequest $request)
   {


       $alert = Alert::create($request->all());
       return redirect()->route('company.alerts.index')
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
       return view('front.alerts.show',compact('alert'));
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
       $employees = User::whereBelongsTo($branches)->get();
       $types=Alert::TYPES;

       return view('front.alerts.edit',compact('alert','employees','types'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(AlertRequest $request, string $id)
   {
    $request['type'] = json_decode($request['type'],true);

    $alert = Alert::with('user')->findOrFail($id);
    if ($request->has('file')&&$alert->file&&File::exists($alert->file)) {
        unlink($alert->file);
    }
    if ($alert->user->branch->company_id!=Auth::user()->company_id) {
           return abort(404);
       }

       $alert->update($request->all());


       return redirect()->route('company.alerts.show',$alert->id)
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
