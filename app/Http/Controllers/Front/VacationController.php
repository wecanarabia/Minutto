<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use App\Models\Vacation;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VacationController extends Controller
{
    use LogTrait;
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Vacation::whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('company.vacations.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = Vacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        $allStatus=Vacation::STATUS;
        return view('company.vacations.show',compact('vacation','allStatus'));
    }

    public function openFile($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = Vacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        return response()->file($vacation->file);
    }

    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->hasVacation()->whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = Vacation::find($id);

        $allStatus=Vacation::STATUS;
        if ($request['status.en']=='approve') {
            $period = CarbonPeriod::create($request['from'], $request['to']);
            $workdays=$vacation->user->shift->workdays->where('status',1)->map(function ($model) {
                return json_decode($model->getRawOriginal('day'), true)['en'];
            })->toArray();
            $days=[];
            foreach ($period as $day) {
                $day=$day->format('l');
                if(in_array($day,$workdays)){
                    array_push($days,$day);
                }
            }
            if ($vacation->user->userVacation->vacation_balance<count($days)) {
                $errors[]='Something went wrong, please try again';
                return response()->json([
                    'error' => $errors,
                ]);
            }else{
                $num=count($days);
            }
        }else{
            $num = 0;
        }


        if (!in_array($vacation->getTranslation('status','en'),['approve','rejected'])||!in_array($vacation->user->id,$employees)||!in_array($request['status'],$allStatus)) {
            return redirect()->back()->with("error",'Something went wrong, please try again');

        }
        if ($vacation->getTranslation('status','en')!==$request['status.en']) {
            if($request['status.en'] == 'approve'){
                $this->addLog($vacation->user->id,'Update vacation request','تحديث طلب الإجازة','vacation request has been approved','تم الموافقة على طلب الإجازة',$request['note']);
            }else if($request['status.en'] == 'rejected'){
                $this->addLog($vacation->user->id,'Update vacation request','تحديث طلب الإجازة','vacation request has been rejected','تم رفض طلب الإجازة',$request['note']);
            };
        };
        $vacation->user->userVacation()->update(['vacation_balance'=>($vacation->user->userVacation->vacation_balance-$num)]);
        $vacation->update([
            'status'=>$request['status'],
            'from'=>$request['from'],
            'to'=>$request['to'],
            'note'=>$request['note'],
            'replay'=>$request['replay'],
        ]);
        return redirect()->route('front.vacations.show',$vacation->id)
        ->with('success','Vacation Request has been update successfully');
    }
}
