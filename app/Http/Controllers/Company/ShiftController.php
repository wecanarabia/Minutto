<?php

namespace App\Http\Controllers\Company;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\ShiftRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Shift::where('company_id',Auth::user()->company_id)->get();
        return view('front.shifts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        Shift::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('company.shifts.index')
                        ->with('success','Shift has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shift = Shift::findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.shifts.show',compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shift = Shift::findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.shifts.edit',compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, string $id)
    {
        $shift = Shift::findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $shift->update($request->except([
            'english_name',
            'arabic_name',

        ]));


        return redirect()->route('company.shifts.show',$shift->id)
                        ->with('success','Shift has been updated successfully');
    }
}
