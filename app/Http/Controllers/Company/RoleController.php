<?php

namespace App\Http\Controllers\Company;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\RoleRequest;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
       $data=Role::where('company_id',Auth::guard('company')->user()->company_id)->get();
        return view('front.roles.index', compact('data'));
    }

    public function create(){
        return view('front.roles.create');
    }

    public function store(RoleRequest $request){

            $role = $this->process(new Role, $request);

                return redirect()->route('company.roles.index')->with(['success' => "Role has been created successfully"]);



    }

    public function show($id){
        $role=Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);
        return view('front.roles.show', compact('role'));
    }

    public function edit($id){
        $role=Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);
        return view('front.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request,$id){

            $role = Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);


            $role = $this->process($role, $request);
            return redirect()->route('company.roles.index')->with(['success' => "Role has been updated successfully"]);

    }

    public function process(Role $role,Request $r)
    {
        $role->name=['en'=>$r->english_name,'ar'=>$r->arabic_name];
        $role->company_id=Auth::guard('company')->user()->company_id;
        $role->permissions=json_encode($r->permissions);
        $role->save();
        return $role;
    }
}
