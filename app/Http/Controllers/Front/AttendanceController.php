<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use App\Models\Workhour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AttendanceRequest;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Workhour::whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('company.employees.attendance',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $attendance = Workhour::find($id);
        if (!in_array($attendance->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Workhour::STATUS;
        return view('company.employees.attendance-details',compact('attendance','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $attendance = Workhour::find($id);
        if (!in_array($attendance->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($attendance->file);
    }

    public function update(AttendanceRequest $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();
        $attendance = Workhour::find($id);
        $allStatus=Workhour::STATUS;
        if (in_array($attendance->user->id,$employees)||in_array($request['status'],$allStatus)) {

        if ($attendance->getTranslation('status', 'en')!==$request['status.en']) {

            $this->addLog($attendance->user->id, 'Update Attendance', 'تحديث الحضور', 'Attendance Status has been updated', 'تم تحديث حالة الحضور لموظف', $request['note']);
        }

        if ($attendance->discount_value!==$request['discount_value']) {

            $this->addLog($attendance->user->id, 'Update Attendance', 'تحديث الحضور', 'Attendance Discount has been updated', 'تم تحديث قيمة خصم الحضور لموظف', $request['note']);
        }
        $attendance->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'time_departure'=>$request['time_departure'],
        ]);
        return redirect()->route('front.attendance.show',$attendance->id)
        ->with('success',__('views.UPDATED ATTENDANCE'));
    }else{
        return redirect()->back()
        ->with('error',__('views.WRONG MSG'));
    }
    }


}
