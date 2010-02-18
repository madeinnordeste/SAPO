<?php defined('SYSPATH') or die('No direct script access.');

class Vigilant {
	
	public function check(){
						
		//verifica as permissoes de url
		Vigilant::check_login();
		Vigilant::check_method_permission();
		
		
		
	}
	
	
	public function check_login(){
		
		//se nao estiver no controller de autenticacoes
		if(Router::$controller != 'autenticacoes'){
			
			$session = Session::instance();
			$usuario = Session::instance()->get('usuario', FALSE);			
			
			if(!$usuario){
				
				html::flash_message('Para ter acesso ao sistema por favor informe seu email e senha.', 'erro');
				url::redirect('autenticacoes/');
				
			}
			
		}	
		
	}
	
	public function check_method_permission(){
   
		$session = Session::instance();
		
		//controllers q nao sao checados
		$excessoes = Kohana::config('vigilant.controllers_exception');		
		
		//se o controller nao estiver nas excessoes
		if(!in_array(Router::$controller, $excessoes)) {
			
			
			//verifica se o usuario tem permissao ao metodo			
			$usuario = Session::instance()->get('usuario');
			
			
			//nao faz verificacoes pra o usuario root
			if($usuario->id > 1){
				
				$acesso_grupo = $usuario->grupo_acesso->acessos->select_list('id', 'metodo');

				$controller_method = Router::$controller.'/'.Router::$method;	

					if(!in_array($controller_method, $acesso_grupo)) {

						Vigilant::access_deny();									

					}				
				
			}
			
			
		}
		
		
	}
	
	public function access_deny(){
		url::redirect('mensagens/acesso_negado');
	}
	
 
}
Event::add('system.post_controller_constructor', array('Vigilant', 'check'));