<?php

namespace App\Http\Controllers\Company;

use App\Models\Log;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        if ($employees->count()>0) {
            $data = Log::with('admin','user')->whereBelongsTo($employees)->orderByDesc('created_at')->get();
        }else{
            $data=collect([]);
        }
        return view('front.logs.index',compact('data'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $log = Log::findOrFail($id);
        if ($log->admin->company_id!=Auth::user()->company_id) {
            return abort(404);
        }
        return view('front.logs.show',compact('log'));
    }
}
