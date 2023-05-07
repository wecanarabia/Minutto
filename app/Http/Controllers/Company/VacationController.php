<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use App\Models\Vacation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VacationController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Vacation::whereBelongsTo($employees)->get();
        }else{
            $data=collect([]);
        }
        return view('front.employees.vacation-requests',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = Vacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Vacation::STATUS;
        return view('front.employees.vacation-details',compact('vacation','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = Vacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($vacation->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Vacation::find($id);
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'from'=>'required|date',
            'to'=>'required|date',
            'note'=>'nullable|min:4|max:2000',
            'status.en'=>"required|in:waiting,approve,rejected",
            'status.ar'=>"required|in:في الانتظار,مقبول,مرفوض",
        ]);

        $attendance = Vacation::find($id);
        $allStatus=Vacation::STATUS;
        if ($validator->fails()||!in_array($leave->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }
        $leave->update([
            'status'=>$request['status'],
            'from'=>$request['from'],
            'to'=>$request['to'],
            'note'=>$request['note'],
        ]);
        return response()->json(['success' => 'Vacation Request updated successfully.']);
    }
}
