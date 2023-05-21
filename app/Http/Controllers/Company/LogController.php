<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user()->company->users->logs;
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
