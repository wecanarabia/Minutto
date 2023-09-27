<?php

namespace App\Http\Controllers\Front;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\DeductionRequest;

class DeductionController extends Controller
{

    public function index(){
        $data = Discount::where('company_id',Auth::user()->company_id)->get();
        return view('company.deductions.index',compact('data'));
    }

      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.deductions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeductionRequest $request)
    {
        $request['company_id'] = Auth::user()->company_id;
        Discount::create($request->all());
        return redirect()->route('front.deductions.index')
                        ->with('success','department has been added successfully');
    }

    public function show(String $id){
        $deduction = Discount::where('company_id',Auth::user()->company_id)->findOrFail($id);
        return view('company.deductions.show',compact('deduction'));
    }
    public function update(DeductionRequest $request,String $id){
        $deduction = Discount::where('company_id',Auth::user()->company_id)->findOrFail($id);
        $deduction->update($request->all());
        return redirect()->route('front.deductions.show')
        ->with('success','Deduction has been updated successfully');
    }
}
