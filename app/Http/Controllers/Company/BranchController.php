<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Branch::where('company_id',Auth::user()->company_id)->get();
        return view('front.branches.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        Branch::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('company.branches.index')
                        ->with('success','Branch has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        if ($branch->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::findOrFail($id);
        if ($branch->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $employees=User::whereBelongsTo($branch)->get();
        return view('front.branches.edit',compact('branch','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(branchRequest $request, string $id)
    {
        $branch = Branch::findOrFail($id);
        if ($branch->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $branch->update($request->except([
            'english_name',
            'arabic_name',

        ]));


        return redirect()->route('company.branches.show',$branch->id)
                        ->with('success','Branch has been updated successfully');
    }
}
