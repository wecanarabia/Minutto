<?php

namespace App\Http\Controllers\Front;

use App\Models\CompanyAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\CompanyAdminRequest;
use App\Models\Role;

class CompanyAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CompanyAdmin::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.company-admins.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('company_id',Auth::user()->company_id)->get();
        return view('company.company-admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyAdminRequest $request)
    {
        $request['password']=bcrypt($request->password);
        $request['company_id']=Auth::user()->company_id;
        CompanyAdmin::create($request->all());


        return redirect()->route('company.admins.index')
                        ->with('success','Admin has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = CompanyAdmin::where('company_id',Auth::user()->company_id)->findOrFail($id);
        return view('company.company-admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = CompanyAdmin::where('company_id',Auth::user()->company_id)->findOrFail($id);
        $roles = $admin->company->roles;
        return view('company.company-admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyAdminRequest $request, string $id)
    {
        $admin = CompanyAdmin::where('company_id',Auth::user()->company_id)->findOrFail($id);
        if ($request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('image')&&$admin->image  && File::exists($admin->image)) {
            unlink($admin->image);
        }
        $request['company_id']=Auth::user()->company_id;
        $admin->update($request->all());


        return redirect()->route('front.admins.index')
                        ->with('success','Company Admin has been updated successfully');
    }

}
