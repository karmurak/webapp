<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, $userRole)
  {
    //dd($request->user()->role, $userRole);//this fun only hit when url becomes /admin/home in browser
    if (auth()->user()->role == $userRole) {
      return $next($request);
    }
    // return response()->json(['You do not have permission to access for this page.']);
    abort(403);
  }
}
