<?php

namespace App\Http\Middleware;

use Closure;     

class AdmMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $isAuthticated = session('auth'); 

        // dd(session()->all()); 

        if(empty($isAuthticated) || !$isAuthticated )
            return redirect('blocked');  

        return $next($request); 
    }
}
