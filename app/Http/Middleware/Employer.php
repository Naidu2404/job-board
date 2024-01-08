<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //we handle the request by checking whether the user is logged in first and check whether he is an employer
        if($request->user() == null || $request->user()->employer == null) {
            return redirect()->route('employer.create')
            ->with('error','You need to register as an Employer First!');
        }
        return $next($request);
    }
}
