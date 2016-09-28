<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servico; 
use App\Usuario; 

class ServicoController extends Controller{
	
	public function order(Request $request){

		$this->validate($request, [
			'complemento'    => 'sometimes|required',
			'latitude'       => 'sometimes|required', 
			'longitude'      => 'sometimes|required', 
			'cep'            => 'sometimes|required', 
			'bairro'         => 'sometimes|required', 
			'numero'         => 'sometimes|required', 
			'rua'            => 'sometimes|required', 
			'geoposicionada' => 'sometimes|required', 
			'cidade_id'      => 'sometimes|required', 
			'data_visita'    => 'required', 
			'hora_visita'    => 'required'
		]); 

		//cep, cidade, estado, rua, bairro, complemento, nº

		$usuario = Usuario::find($request->user_id); 

		$servicos = $usuario->servicos()->where('aberto', '=', 1)->get(); 

		foreach($servicos as $servico ){
			$servico->aberto = 0; 
			$servico->save(); 
		}

		$servico = new Servico(); 

		if($request->geoposicionada == true ){
			$servico->complemento = $request->complemento; 
			$servico->latitude    = $request->latitude; 
			$servico->longitude   = $request->longitude; 
			$servico->cidade_id   = 3; //Apenas para não dar pau. 
		}else{
			$servico->complemento = $request->complemento. 'numero: ' + $request->numero; 
			$servico->latitude    = -1; 
			$servico->longitude   = -1;
			$servico->cep         = $request->cep; 
			$servico->bairro      = $request->bairro; 
			$servico->rua         = $request->rua;
			$servico->cidade_id   = $request->cidade_id;   
		}

		$servico->geoposicionada = $request->geoposicionada; 
		$servico->data_visita    = $request->data_visita;
		$servico->hora_visita    = $request->hora_visita;		
		$servico->usuario_id     = $request->user_id;	
		
		$servico->save();  

		return['status' => true ];  
	}

	public function getActiveOrder (Request $request){
		$usuario = Usuario::find($request->user_id); 
		
		$order = $usuario->servicos()->where('aberto', '=', 1)->get()->first(); 

		return ['status' => true, 'msg' => $order ];  
	}

	public function cancelActiveOrder (Request $request ){
		$usuario = Usuario::find($request->user_id); 
		
		$order = $usuario->servicos()->where('aberto', '=', 1)->get()->first(); 

		if(empty($order))
			return ['status' => true ]; 

		$order->aberto = false; 
		$order->save(); 

		return ['status' => true ]; 
	} 

	public function getAll (Request $request){
		$usuario = Usuario::find($request->user_id); 

		$msg = $usuario->servicos()->orderBy('created_at', 'desc')->take(15)->get(); 

		return ['status' => true, 'msg' => $msg ]; 
	}
}	