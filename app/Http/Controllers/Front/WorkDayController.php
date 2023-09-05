<?php

namespace App\Http\Controllers\Front;

use App\Models\Shift;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\WorkDayRequest;

class WorkDayController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Workday::with('shift')->whereHas('shift',function ($q){
            $q->where('company_id',Auth::user()->company_id);
        })->where('status',1)->orderByDesc('shift_id')->orderByDesc('created_at')->get();
        return view('front.workdays.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days=Workday::WORKDAYS;
        // dd(Workday::WORKDAYS[0][App::getLocale()]);
        $shifts = Shift::where('company_id',Auth::user()->company_id)->whereDoesntHave('workdays')->get();

        return view('front.workdays.create',compact('days','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkDayRequest $request)
    {
        $days=Workday::WORKDAYS;
    foreach ($days as $i => $day) {
        if ($request[$day['en']]) {
            $validator = Validator::make([
                $day['en']."-from"=>$request[$day['en']."-from"],
                $day['en']."-to"=>$request[$day['en']."-to"],
                $day['en']=>$request[$day['en']],
                ], [
                    $day['en']."-from" => 'date_format:H:i',
                    $day['en']."-to" => 'date_format:H:i',
                    $day['en'] =>"in:1,2,3,4,5,6,7"
            ]);
            if ($validator->fails()) {
            Workday::create([
                    'day'=>$day,
                    'from'=>"00:00:00",
                    'to'=>"00:00:00",
                    'status'=>0,
                    'shift_id'=>$request->shift_id,
                ]);
            } else {
                Workday::create([
                    'day'=>$day,
                    'from'=>$request[$day['en']."-from"],
                    'to'=>$request[$day['en']."-to"],
                    'status'=>1,
                    'shift_id'=>$request->shift_id,
                ]);
            }
        }else{
            Workday::create([
                'day'=>$day,
                'from'=>"00:00:00",
                'to'=>"00:00:00",
                'status'=>0,
                'shift_id'=>$request->shift_id,
            ]);
        }
    }

    return redirect()->route('company.workdays.index')
                    ->with('success', 'Workdays has been added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shift = Shift::with('workdays')->findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.workdays.show',compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workday = Workday::findOrFail($id);
        if ($workday->shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.workdays.edit',compact('workday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkDayRequest $request, string $id)
    {
        $workday = Workday::findOrFail($id);
        if ($workday->shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        if ($request->status==0) {
            $workday->update([
                'from'=>"00:00:00",
                'to'=>"00:00:00",
                'status'=>0
                ]);
        }else {
            $workday->update($request->all());
        }


        return redirect()->route('company.workdays.index')
                        ->with('success','Workday has been updated successfully');
    }

    public function editShiftWorkdays($id)
    {
        $shift = Shift::with('workdays')->findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.workdays.shift-workdays-edit',compact('shift'));
    }

    public function updateShiftWorkdays($id,Request $request)
    {
        $shift = Shift::with('workdays')->findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }

        foreach ($shift->workdays as $i => $day) {
            if ($request[$day->getTranslation('day','en') ]) {
                $validator = Validator::make([
                    $day->getTranslation('day','en') ."-from"=>$request[$day->getTranslation('day','en')."-from"],
                    $day->getTranslation('day','en') ."-to"=>$request[$day->getTranslation('day','en')."-to"],
                    $day->getTranslation('day','en') =>$request[$day->getTranslation('day','en') ],
                    ], [
                        $day->getTranslation('day','en')."-from" => 'date_format:H:i',
                        $day->getTranslation('day','en')."-to" => 'date_format:H:i',
                        $day->getTranslation('day','en') =>"in:1,2,3,4,5,6,7"
                ]);
                if ($validator->fails()) {
                $day->update([
                        'from'=>"00:00:00",
                        'to'=>"00:00:00",
                        'status'=>0,
                    ]);
                } else {

                    $day->update([
                        'from'=>$request[$day->getTranslation('day','en')."-from"],
                        'to'=>$request[$day->getTranslation('day','en')."-to"],
                        'status'=>1,
                    ]);
                }
            }else{
                $day->update([
                    'from'=>"00:00:00",
                    'to'=>"00:00:00",
                    'status'=>0,
                ]);
            }
        }

        return redirect()->route('company.workdays.show',$shift->id)
                        ->with('success', 'Workdays has been updated successfully');

    }
}
