<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();
        if(!isset($_SESSION['rapidx_user_id'])){
            return redirect('../');
        }

        $user = DB::table('users')
                    ->where('rapidx_user_id', $_SESSION['rapidx_user_id'])
                    ->first();

        session(['global_user' => $user]);
        View::share('globalUser', $user);

        return $next($request);
    }
}
