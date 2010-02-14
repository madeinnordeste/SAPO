<?php defined('SYSPATH') or die('No direct script access.');

class Vigilant {
	
	public function check(){
		
		
		//verifica as permissoes de url
		Vigilant::check_method_permission();
		
	}
	
	
	public function check_login(){
		
	}
	
	public function check_method_permission(){
   

		//controllers q nao sao checados
		$excessoes = Kohana::config('vigilant.controllers_exception');
		
		//se o controller nao estiver nas excessoes
		if(!in_array(Router::$controller, $excessoes)) {
			
			$controller_method = Router::$controller.'/'.Router::$method;
			
			url::redirect('mensagens/acesso_negado');
			
		}
		
	}
 
}
//Event::add('system.post_controller_constructor', array('Vigilant', 'check'));