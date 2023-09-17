<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\OfficialVacation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\OfficialVacationRequest;

class OfficialVacationController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OfficialVacation::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.official-vacations.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.official-vacations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficialVacationRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['note']=['en'=>$request->english_note,'ar'=>$request->arabic_note];
        $request['company_id'] = Auth::user()->company_id;
        OfficialVacation::create($request->except([
            'english_name',
            'arabic_name',
            'english_note',
            'arabic_note',
        ]));


        return redirect()->route('front.official-vacations.index')
                        ->with('success','Official Vacation has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vacation = OfficialVacation::findOrFail($id);
        if ($vacation->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.official-vacations.show',compact('vacation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vacation = OfficialVacation::findOrFail($id);
        if ($vacation->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.official-vacations.edit',compact('vacation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficialVacationRequest $request, string $id)
    {
        $vacation = OfficialVacation::findOrFail($id);
        if ($vacation->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['note']=['en'=>$request->english_note,'ar'=>$request->arabic_note];
        $request['company_id'] = Auth::user()->company_id;
        $vacation->update($request->except([
            'english_name',
            'arabic_name',
            'english_note',
            'arabic_note',
        ]));


        return redirect()->route('front.official-vacations.show',$vacation->id)
                        ->with('success','Official Vacation has been updated successfully');
    }

}
