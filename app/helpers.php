<?php

use App\Facades\Currency;
use Illuminate\Support\Facades\Auth;

function currency($value){
    return Currency::formatCurrency($value,Auth::user()->company->currency??config('app.currency'));
}
