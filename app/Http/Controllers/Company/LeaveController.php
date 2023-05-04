<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Leave;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Leave::whereBelongsTo($employees)->get();
        }else{
            $data=null;
        }
        return view('front.employees.leave-requests',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        if (!in_array($leave->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Leave::STATUS;
        return view('front.employees.leave-details',compact('leave','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        if (!in_array($leave->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($leave->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'discount_value'=>'nullable|numeric|declined_if:status.en,approve',
            'note'=>'nullable|min:4|max:2000',
            'status.en'=>"required|in:waiting,approve,rejected",
            'status.ar'=>"required|in:في الانتظار,مقبول,مرفوض",
        ]);

        $attendance = Leave::find($id);
        $allStatus=Leave::STATUS;
        if ($validator->fails()||!in_array($leave->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }
        $leave->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
            'note'=>$request['note'],
        ]);
        return response()->json(['success' => 'Leave Request updated successfully.']);
    }
}
