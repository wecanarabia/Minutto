<?php

namespace App\Http\Controllers\Front;

use App\Models\RewardType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\ShiftRequest;

class RewardTypeController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RewardType::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.reward-types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.reward-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        RewardType::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('front.reward-types.index')
                        ->with('success','Allowance type has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = RewardType::findOrFail($id);
        if ($type->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.reward-types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = RewardType::findOrFail($id);
        if ($type->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.reward-types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, string $id)
    {
        $reward = RewardType::findOrFail($id);
        if ($reward->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $reward->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('front.reward-types.show',$reward->id)
                        ->with('success','Allowance type has been updated successfully');
    }
}
