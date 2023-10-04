<?php

namespace App\Http\Controllers\Front;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\RoleRequest;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
       $data=Role::where('company_id',Auth::guard('company')->user()->company_id)->orderByDesc('created_at')->get();
        return view('company.roles.index', compact('data'));
    }

    public function create(){
        return view('company.roles.create');
    }

    public function store(RoleRequest $request){

            $role = $this->process(new Role, $request);

                return redirect()->route('front.roles.index')->with(['success' => __('views.CREATED ROLE')]);



    }

    public function show($id){
        $role=Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);
        return view('company.roles.show', compact('role'));
    }

    public function edit($id){
        $role=Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);
        return view('company.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request,$id){

            $role = Role::where('company_id',Auth::guard('company')->user()->company_id)->findOrFail($id);


            $role = $this->process($role, $request);
            return redirect()->route('front.roles.index')->with(['success' => __('views.UPDATED ROLE')]);

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
