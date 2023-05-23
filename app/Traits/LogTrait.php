<?php
namespace App\Traits;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

trait LogTrait
{
    public function addLog($employeeId,$enTitle,$arTitle,$enLog,$arLog,$note=null)
    {
        Log::create([
            'company_admin_id'=>Auth::user()->id,
            'employee_id'=>$employeeId,
            'on'=>['en'=>$enTitle,'ar'=>$arTitle],
            'log'=>['en'=>$enLog,'ar'=>$arLog],
            'note'=>$note,
        ]);
    }
}
