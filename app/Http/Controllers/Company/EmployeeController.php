<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Shift;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();

        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();
        return view('front.employees.members',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $shifts = Shift::whereHas('branches', function($q){
            $q->whereIn('branch_id',Branch::where('company_id', Auth::user()->company_id)->pluck('id'));
        })->get();
        $employee = User::whereBelongsTo($branches)->with(['branch','shift'])->find($id);
        return view('front.employees.employee-profile',compact('employee','branches','shifts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        if ($request->has('password')&&$request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('image')&&$user->image  && File::exists($user->image)) {
            unlink($user->image);
        }
        $user->update($request->all());

        return redirect()->route('company.employees.show',$user->id)
                ->with('success','Employee Admin has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
