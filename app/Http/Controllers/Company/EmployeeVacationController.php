<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\EmployeeVacation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeVacationController extends Controller
{
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = EmployeeVacation::whereBelongsTo($employees)->get();
        }else{
            $data=collect([]);
        }
        return view('front.employee-vacations.index',compact('data'));
    }

    public function show($id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();

        $vacation = EmployeeVacation::find($id);
        if (!in_array($vacation->user->id,$employees)) {
            return abort('404');
        }
        return view('front.employee-vacations.vacation-details',compact('vacation'));
    }


    public function update(Request $request,$id)
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::whereBelongsTo($branches)->with(['branch','shift'])->pluck('id')->toArray();
        $validator = Validator::make($request->all(), [
            'vacation_balance'=>'required|numeric',
            
        ]);

        $vacation = EmployeeVacation::find($id);

        if ($validator->fails()||!in_array($vacation->user->id,$employees)) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $vacation->update($request->all());
        return response()->json(['success' => 'Advance updated successfully.']);
    }
}
