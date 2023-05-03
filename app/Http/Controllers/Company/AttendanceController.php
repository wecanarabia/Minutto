<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use App\Models\Workhour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();

        $data = Workhour::whereBelongsTo($employees)->get();
        return view('front.employees.attendance',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $attendance = Workhour::find($id);
        if (!in_array($attendance->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Workhour::STATUS;
        return view('front.employees.attendance-details',compact('attendance','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $attendance = Workhour::find($id);
        if (!in_array($attendance->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($attendance->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $attendance = Workhour::find($id);
        $validator = Validator::make($request->all(), [
            'discount_value'=>'nullable|numeric',
        ]);
        $allStatus=Workhour::STATUS;
        $request['status'] = json_decode($request['status'],true);
        if ($validator->fails()||!in_array($attendance->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => "Some thing has been wrong",
            ]);
        }

        $attendance->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
        ]);
        return response()->json(['success' => 'Attendance updated successfully.']);
    }


}
