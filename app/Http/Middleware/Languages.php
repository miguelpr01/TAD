<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Languages
{
    public function handle($request, Closure $next)
    {
        App::setLocale(session('locale'));
        return $next($request);
    }
}