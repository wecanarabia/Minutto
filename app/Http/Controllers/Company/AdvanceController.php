<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use App\Models\Advance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdvanceController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Advance::whereBelongsTo($employees)->get();
        }else{
            $data=collect([]);
        }
        return view('front.advances.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $advance = Advance::find($id);
        if (!in_array($advance->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Advance::STATUS;
        return view('front.advances.advance-details',compact('advance','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $advance = Advance::find($id);
        if (!in_array($advance->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($advance->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'value'=>'required|numeric|declined_if:status.en,waiting|declined_if:status.en,rejected|min:0',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'req_date'=>'required|date',
            'status.en'=>"required|in:waiting,approve,rejected",
        ]);

        $advance = Advance::find($id);

        $allStatus=Advance::STATUS;
        if ($validator->fails()||!in_array($advance->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $advance->update([
            'status'=>$request['status'],
            'value'=>$request['value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'req_date'=>$request['req_date'],
        ]);
        return response()->json(['success' => 'Advance updated successfully.']);
    }
}
