<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario; 

class ApiMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $api_key = $request->api_key; 
        
        if(empty($api_key)){
            redirect('/blocked');  
            return;
        }
        
        $opts = array(
          'http' => array('ignore_errors' => true)
        );

        $context = stream_context_create($opts);
        $facebook = file_get_contents("https://graph.facebook.com/v2.7/me?access_token=".$api_key, false, $context); 
        $facebook = json_decode($facebook); 


        if(array_key_exists('error', $facebook)){
            return redirect('blocked');  
        }

        $usuario = Usuario::where('facebook_id', '=', $facebook->id)-> 
        get()->
        first(); 
        
        if(empty($usuario)){
            $usuario = new Usuario(); 

            $usuario->nome        = $facebook->name; 
            $usuario->facebook_id = $facebook->id;
            $usuario->email       = $facebook->email; 

            $usuario->save(); 
        }

        $request->user_id = $usuario->id; 

        return $next($request); 
    }
}
