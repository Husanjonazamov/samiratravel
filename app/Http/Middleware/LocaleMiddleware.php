<?php

namespace App\Http\Middleware;

use App\Traits\TranslateList;
use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // available language in template array
        $availLocale = ['uz'=>'uz','ru'=>'ru','en'=>'en'];

        // Locale is enabled and allowed to be change
        if (session()->has('locale') && array_key_exists(session()->get('locale'), $availLocale)) {
            // Set the Laravel locale
            app()->setLocale(session()->get('locale'));
        }else
        {
            // Set the Laravel locale
            app()->setLocale('uz');
        }

        return $next($request);
    }
}
