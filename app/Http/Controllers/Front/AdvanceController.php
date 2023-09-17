<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use App\Models\Advance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AdvanceRequest;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdvanceController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Advance::whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('company.advances.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $advance = Advance::find($id);
        if (!in_array($advance->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Advance::STATUS;
        return view('company.advances.advance-details',compact('advance','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $advance = Advance::find($id);
        if (!in_array($advance->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($advance->file);
    }

    public function update(AdvanceRequest $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $advance = Advance::find($id);

        $allStatus=Advance::STATUS;
        if (in_array($advance->user->id,$employees)||in_array($request['status'],$allStatus)) {


        if ($advance->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($advance->user->id,'Update advance request','تحديث طلب السلفة','Advance request has been approved','تم الموافقة على طلب السلفة',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($advance->user->id,'Update advance request','تحديث طلب السلفة','Advance request has been rejected','تم رفض طلب السلفة',$request['note']);
            };
        };
        $advance->update([
            'status'=>$request['status'],
            'value'=>$request['value'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'req_date'=>$request['req_date'],
        ]);
            return redirect()->route('front.advances.show',$advance->id)
            ->with('success','Advance has been update successfully');
        }else{
            return redirect()->back()
            ->with('error','Something has been wrong');
        }
    }
}
