<?php

namespace App\Http\Controllers\Front;

use App\Models\VacationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\ShiftRequest;

class VacationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VacationType::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.vacation-types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.vacation-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        VacationType::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('front.vacation-types.index')
                        ->with('success','Vacation type has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = VacationType::with('vacations')->findOrFail($id);
        if ($type->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.vacation-types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = VacationType::findOrFail($id);
        if ($type->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.vacation-types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, string $id)
    {
        $type = VacationType::findOrFail($id);
        if ($type->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $type->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('front.vacation-types.show',$type->id)
                        ->with('success','Vacation type has been updated successfully');
    }
}
