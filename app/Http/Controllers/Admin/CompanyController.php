<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Company::with('subscription')->paginate(10);
        return view('admin.companies.index',compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show',compact('company'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Company::findOrFail($request->id)->delete();
        return redirect()->route('admin.companies.index')->with('success','Compnay has been removed successfully');
    }
}
