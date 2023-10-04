<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\BranchRequest;
use App\Models\Shift;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Branch::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.branches.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shifts = Shift::where('company_id',Auth::user()->company_id)->get();
        return view('company.branches.create',compact('shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $branch = Branch::create($request->except([
            'english_name',
            'arabic_name',
            'shifts',
        ]));
        $branch->shifts()->attach($request['shifts']);

        return redirect()->route('front.branches.index')
                        ->with('success',__('views.CREATED BRANCH'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::with('shifts')->findOrFail($id);
        if ($branch->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.branches.show',compact('branch'));
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
        $employees=User::active()->whereBelongsTo($branch)->get();
        $shifts = Shift::where('company_id',Auth::user()->company_id)->get();
        return view('company.branches.edit',compact('branch','employees','shifts'));
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
            'shifts'
        ]));
        $branch->shifts()->sync($request['shifts']);


        return redirect()->route('front.branches.show',$branch->id)
                        ->with('success',__('views.UPDATED BRANCH'));
    }
}
