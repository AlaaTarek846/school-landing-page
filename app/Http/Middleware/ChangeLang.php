<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $lang = $request->header('Accept-Language') ? $request->header('Accept-Language') : app()->getLocale();;

        app()->setLocale($lang);
        Carbon::setLocale($lang);

        return $next($request);
    }
}
