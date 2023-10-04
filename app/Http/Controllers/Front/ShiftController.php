<?php

namespace App\Http\Controllers\Front;

use App\Models\Shift;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Company\ShiftRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Shift::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.shifts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days=Workday::WORKDAYS;
        return view('company.shifts.create',compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        DB::beginTransaction();
        $shift = Shift::create($request->only([
            'name',
            'company_id',

        ]));
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
                        'shift_id'=>$shift->id,
                    ]);
                } else {
                    Workday::create([
                        'day'=>$day,
                        'from'=>$request[$day['en']."-from"],
                        'to'=>$request[$day['en']."-to"],
                        'status'=>1,
                        'shift_id'=>$shift->id,
                    ]);
                }
            }else{
                Workday::create([
                    'day'=>$day,
                    'from'=>"00:00:00",
                    'to'=>"00:00:00",
                    'status'=>0,
                    'shift_id'=>$shift->id,
                ]);
            }
        }
        DB::commit();


        return redirect()->route('front.shifts.index')
                        ->with('success',__('views.CREATED SHIFT'));
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
        return view('company.shifts.show',compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shift = Shift::with('workdays')->findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('company.shifts.edit',compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, string $id)
    {
        $shift = Shift::with('workdays')->findOrFail($id);
        if ($shift->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        DB::beginTransaction();
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['company_id'] = Auth::user()->company_id;
        $shift->update($request->only([
            'name',
            'company_id',

        ]));
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
        DB::commit();
        return redirect()->route('front.shifts.index')
                        ->with('success',__('views.UPDATED SHIFT'));
    }
}
