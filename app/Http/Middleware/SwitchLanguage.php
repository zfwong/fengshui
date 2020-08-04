<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;

class SwitchLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') && in_array(Session::get('locale'), ['en', 'zh-CN'])) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale('zh-CN');
        }
        return $next($request);
    }
}
