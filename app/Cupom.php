<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model{
   
   public function servicos(){
   	return $this->hasMany('App\Servico'); 
   }
   
}
