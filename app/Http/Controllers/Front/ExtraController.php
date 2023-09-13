<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Extra;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ExtraRequest;
use App\Traits\LogTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExtraController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Extra::whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('company.extras.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        if (!in_array($extra->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Extra::STATUS;
        return view('company.extras.extra-details',compact('extra','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        if (!in_array($extra->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($extra->file);
    }

    public function update(ExtraRequest $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        $allStatus=Extra::STATUS;

        if($request['status']['en']=='approve'){
            $firstTime = Carbon::parse($request['from']);
            $secondTime = Carbon::parse($request['to']);
            $mount = (($extra->user->hourly_salary/60)*Auth::user()->company->extra_rate)*$firstTime->diffInMinutes($secondTime);
        }else{
            $mount=0;
        }
        if ($extra->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($extra->user->id,'Update extra request','تحديث طلب الإضافي','Extra request has been approved','تم الموافقة على طلب الإضافي',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($extra->user->id,'Update extra request','تحديث طلب الإضافي','Extra request has been rejected','تم رفض على طلب الإضافي',$request['note']);
            };
        };
        $extra->update([
            'status'=>$request['status'],
            'from'=>$request['from'],
            'to'=>$request['to'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'amount'=>$mount
        ]);
            return redirect()->route('front.extras.show',$extra->id)
            ->with('success','Extra Request has been update successfully');
        }
}
