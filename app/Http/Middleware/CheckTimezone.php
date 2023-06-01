<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CheckTimezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $guards = empty($guards) ? [null] : $guards;
        $guards = ['api','company'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'api') {
                    Config::set('app.timezone', Auth::guard('api')->user()->branch->company->timezone);
                    date_default_timezone_set(config('app.timezone'));

                }else if($guard == 'company'){
                    Config::set('app.timezone', Auth::guard('company')->user()->company->timezone);
                    date_default_timezone_set(config('app.timezone'));
                }
            }
        }

        return $next($request);
    }
}
