<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use App\Models\Workhour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        if ($employees->count()>0) {
            $data = Workhour::whereBelongsTo($employees)->get();
        }else{
            $data=collect([]);
        }
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
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'discount_value'=>'nullable|numeric|declined_if:status.en,disciplined',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'time_departure'=>'nullable|date_format:H:i',
            'status.en'=>"required|in:disciplined,late,absence,vacation",
        ]);

        $attendance = Workhour::find($id);

        $allStatus=Workhour::STATUS;
        if ($validator->fails()||!in_array($attendance->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $attendance->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'time_departure'=>$request['time_departure'],
        ]);
        return response()->json(['success' => 'Attendance updated successfully.']);
    }


}
