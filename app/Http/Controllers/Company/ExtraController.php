<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Extra;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExtraController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Extra::whereBelongsTo($employees)->get();
        }else{
            $data=collect([]);
        }
        return view('front.extras.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        if (!in_array($extra->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Extra::STATUS;
        return view('front.extras.extra-details',compact('extra','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        if (!in_array($extra->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($extra->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $extra = Extra::find($id);
        $request['status'] = json_decode($request['status'],true);
        $validator = Validator::make($request->all(), [
            'from'=>'required|date_format:H:i',
            'to'=>'required|date_format:H:i',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'status.en'=>"required|in:waiting,approve,rejected",
        ]);

        $allStatus=Extra::STATUS;
        if ($validator->fails()||!in_array($extra->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }
        if($request['status']['en']=='approve'){
            $firstTime = Carbon::parse($request['from']);
            $secondTime = Carbon::parse($request['to']);
            $mount = (($extra->user->hourly_salary/60)*Auth::user()->company->extra_rate)*$firstTime->diffInMinutes($secondTime);
        }else{
            $mount=0;
        }
        $extra->update([
            'status'=>$request['status'],
            'from'=>$request['from'],
            'to'=>$request['to'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
            'amount'=>$mount
        ]);
        return response()->json(['success' => 'Extra Request updated successfully.']);
    }
}
