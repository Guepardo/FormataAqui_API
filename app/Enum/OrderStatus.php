<?php 
namespace App\Enum; 

abstract class OrderStatus {
	//Significa que alguém já está indo atender a ordem de serviço; 	
	const IN_PROGRESS = 1; 

	//Significa que o adminstrador do sistema cancelou a ordem de serviço por alguma razão. 
	const CANCELED   =  2; 

	//Significa que a ordem de serviço foi finalizada com o fluxo do processo esperado (rendeu dinheiro); 
	const FINISHED   = -1; 
}