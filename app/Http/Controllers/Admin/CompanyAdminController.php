<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\CompanyAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CompanyAdminRequest;

class CompanyAdminController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CompanyAdmin::paginate(5);
        return view('admin.company-admins.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.company-admins.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyAdminRequest $request)
    {
        $request['password']=bcrypt($request->password);
        CompanyAdmin::create($request->all());


        return redirect()->route('admin.company-admins.index')
                        ->with('success','Company Admin has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = CompanyAdmin::findOrFail($id);
        return view('admin.company-admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $admin = CompanyAdmin::findOrFail($id);
        return view('admin.company-admins.edit',compact('admin','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyAdminRequest $request, string $id)
    {
        $admin = CompanyAdmin::findOrFail($id);
        if ($request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('image')&&$admin->image  && File::exists($admin->image)) {
            unlink($admin->image);
        }
        $admin->update($request->all());


        return redirect()->route('admin.company-admins.index')
                        ->with('success','Company Admin has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        CompanyAdmin::findOrFail($request->id)->delete();
        return redirect()->route('admin.company-admins.index')->with('success','Company Admin has been removed successfully');
    }
}
