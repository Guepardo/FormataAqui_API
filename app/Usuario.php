<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = 'usuario'; 
    public    $timestamps = true; 

    public function servicos(){
    	return $this->hasMany('App\Servico'); 
    }
    
}
