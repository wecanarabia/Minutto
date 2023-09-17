<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\DepartmentRequest;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.departments.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $request['company_id'] = Auth::user()->company_id;
        Department::create($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
        ]));


        return redirect()->route('front.departments.index')
                        ->with('success','department has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        if ($department->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        if ($department->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $employees=User::active()->hasSalary()->hasVacation()->whereBelongsTo($department)->get();
        return view('company.departments.edit',compact('department','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        $department = Department::findOrFail($id);
        if ($department->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $request['company_id'] = Auth::user()->company_id;
        $department->update($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
        ]));


        return redirect()->route('front.departments.show',$department->id)
                        ->with('success','department has been updated successfully');
    }



}
