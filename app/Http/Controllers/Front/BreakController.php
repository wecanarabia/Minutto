<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Leave;
use App\Models\Branch;
use App\Traits\LogTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\LeaveRequest;


class BreakController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Leave::where('is_break',1)->whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('company.breaks.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::where('is_break',1)->find($id);
        if (!in_array($leave->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Leave::STATUS;
        return view('company.breaks.show',compact('leave','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        if (!in_array($leave->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($leave->file);
    }

    public function update(LeaveRequest $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::where('is_break',1)->find($id);

        $allStatus=Leave::STATUS;

        if ($leave->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($leave->user->id,'Update Break request','تحديث طلب الإستراحة','Break request has been approved','تم الموافقة على طلب الإستراحة',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($leave->user->id,'Update Break request','تحديث طلب الإستراحة','Break request has been rejected','تم رفض طلب الإستراحة',$request['note']);
                $leave->user()->update([
                    'is_left'=>0
                ]);
            };
        };

        if ($leave->discount_value!==$request['discount_value']) {

            $this->addLog($leave->user->id, 'Update Break request', 'تحديث طلب الإستراحة', 'Break request Deduction has been updated', 'تم تحديث قيمة خصم طلب الإستراحة لموظف', $request['note']);
        }
        $leave->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
        ]);

        return redirect()->route('front.breaks.show',$leave->id)
        ->with('success','Break Request has been update successfully');
    }
}
