<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario; 
use Hash; 

class UsuarioController extends Controller{
    
    public function register(Request $request){
    	$this->validate($request,[
    		'nome'               => 'required|min:3|max:45', 
    		'telefone'           => 'required|min:9|max:12|unique:usuario', 
    		'senha'              => 'required|confirmed', 
    		'senha_confirmation' => 'required'
    	]); 

    	$usuario = new Usuario; 

    	$usuario->nome     = $request->nome;
    	$usuario->telefone = $request->telefone;
    	$usuario->senha    = Hash::make($request->senha);
    
        $usuario->save(); 	
    	return ['status' => true]; 
    }

    public function getUser(Request $request){
        $usuario = Usuario::find( $request->user_id); 
        return ['status' => true, 'msg' => $usuario]; 
    }

    public function update(Request $request){
        $this->validate($request,[
            'telefone' => 'required'
        ]); 

        $user_id = $request->user_id; 

        $usuario = Usuario::find($user_id); 
        $usuario->telefone = $request->telefone; 

        $usuario->save(); 

        return ['status' => true ]; 
    }

    public function login(Request $request){
        $this->validate($request, [
            'telefone' => 'required', 
            'senha'    => 'required'
        ]); 

        $usuario = Usuario::where('telefone', '=', $request->telefone )->
        get()->
        first(); 

        if(empty($usuario) || Hash::check($usuario->senha, $request->senha))
            return ['status' => false]; 

        $usuario->api_key = Hash::make( time() + $usuario->senha); 
        $usuario->save(); 

        $msg = ['api_key' => $usuario->api_key]; 

        return ['status' => true, 'msg' => $msg]; 
    }

}
