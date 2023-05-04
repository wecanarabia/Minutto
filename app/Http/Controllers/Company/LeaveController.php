<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Leave;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();

        $data = Leave::whereBelongsTo($employees)->get();
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
        ($leave->user->monthly_salary/60)*$leave->period;
        $allStatus=Leave::STATUS;
        $request['status'] = json_decode($request['status'],true);
        if (!in_array($leave->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => "Some thing has been wrong",
            ]);
        }

        $leave->update([
            'status'=>$request['status'],
        ]);
        return response()->json(['success' => 'Leave Request updated successfully.']);
    }
}
