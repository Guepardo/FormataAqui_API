<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin; 
use Hash; 

class AdminController extends Controller{

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required',  
            'senha' => 'required'
        ]); 

        $admin = Admin::where('email', '=', $request->email )->
        get()->
        first();

        // if(empty($admin) || Hash::check($admin->senha, $request->senha)){
        if(empty($admin) || $admin->senha != $request->senha)
            return redirect('login'); 

        session()->put('auth', true); 

        return redirect('/'); 
    }
    

    public function logout(Request $request){
        session('auth', false); 
        return ['status' => true]; 
    }
}
