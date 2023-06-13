<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Leave;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Leave::whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('front.employees.leave-requests',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

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
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        if (!in_array($leave->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($leave->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $leave = Leave::find($id);
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'discount_value'=>'nullable|numeric|declined_if:status.en,approve|min:0',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'status.en'=>"required|in:waiting,approve,rejected",
        ]);

        $allStatus=Leave::STATUS;
        if ($validator->fails()||!in_array($leave->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }
        if ($leave->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($leave->user->id,'Update leave request','تحديث طلب المغادرة','Leave request has been approved','تم الموافقة على طلب المغادرة',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($leave->user->id,'Update leave request','تحديث طلب المغادرة','Leave request has been rejected','تم رفض طلب المغادرة',$request['note']);
                $request['is_left']=0;
            };
        };

        if ($leave->discount_value!==$request['discount_value']) {

            $this->addLog($leave->user->id, 'Update leave request', 'تحديث طلب المغادرة', 'Leave request Discount has been updated', 'تم تحديث قيمة خصم طلب المغادرة لموظف', $request['note']);
        }
        $leave->update([
            'status'=>$request['status'],
            'discount_value'=>$request['discount_value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
        ]);
        return response()->json(['success' => 'Leave Request updated successfully.']);
    }
}
