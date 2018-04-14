<?php

namespace App\Http\Middleware;

use App\Models\HousingAdmin;
use Closure;

class AdminMiddleware
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
      $admin = HousingAdmin::findOrFail(session('cwid'));

      return $next($request);
    }
}
