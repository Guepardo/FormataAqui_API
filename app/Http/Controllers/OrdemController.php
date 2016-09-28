<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enum\OrderStatus; 

use App\Http\Requests;
use App\Servico; 
use Hash; 

class OrdemController extends Controller{

    public function getAllActiveOrder(Request $request){
        $orders = Servico::where('aberto', '=', '1')->get(); 
        foreach($orders as $order)
            $order->usuario; 

        return ['status' => true, 'msg' => $orders ]; 
    }

    public function setInProgressOrder(Resquest $request ){
    	$this->validate($request,[
    		'order_id' => 'required'
    	]); 

    	$order_id = $request->order_id; 

    	$order = Servico::find($order_id); 

    	if(empty($order))
    		return ['status' => false]; 

    	$order->status = OrderStatus::IN_PROGRESS; 
    	$order->save(); 

    	return['status' => true]; 
    }

    public function setCancelOrder(Request $request){
    	$this->validate($request,[
    		'order_id' => 'required'
    	]); 

    	$order_id = $request->order_id; 

    	$order = Servico::find($order_id); 

    	if(empty($order))
    		return ['status' => false]; 

    	$order->status = OrderStatus::CANCELED; 
    	$order->aberto = false; 
    	$order->save(); 

    	return['status' => true]; 	
    }
	
	public function getAllCanceledOrder(Request $request){
		$orders = Servico::where('status', '=', OrderStatus::CANCELED)->take(100)->get(); 

		foreach($orders as $order)
			$order->usuario; 

		return ['status' => true, 'msg' => $orders ]; 
	} 

	public function getAllInProgressOrder(Request $request ){
		$orders = Servico::where('status', '=', OrderStatus::IN_PROGRESS)->take(100)->get(); 

		foreach($orders as $order)
			$order->usuario; 

		return ['status' => true, 'msg' => $orders ];	
	}

	public function getAllFinishedOrder(Request $request ){
		$orders = Servico::where('status', '=', OrderStatus::FINISHED)->take(100)->get(); 

		foreach($orders as $order)
			$order->usuario; 

		return ['status' => true, 'msg' => $orders ];	
	}
}
