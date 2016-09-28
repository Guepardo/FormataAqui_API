<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model{
	protected $table      = 'servico'; 
	public    $timestamps = true; 

	public function usuario(){
		return $this->belongsTo('App\Usuario'); 
	}
	
}
