<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidateUserBasket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check if user is  not logged in
        if(!Auth::check())
        {
        //check if previous page was a POST request 
            if($request->isMethod('post'))
            {
                session([
                    'prev_route' => $request->route()->getName(),
                    'previous_post_data' => $request->all(),
                ]);
            }
            return redirect('login');

        }



        return $next($request);

    }
}
