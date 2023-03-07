<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentinel;
class admin
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
        $user=Sentinel::check();
        if(empty($user))
        {
            return redirect('login');
        }
        else if ($user->user_type != 'admin') 
        { // user is authenticated but he is a customer
            return redirect()->route('login')->with('error', 'You are a Customer and cannot access to backend section');
        }
         return $next($request);
    }
}
