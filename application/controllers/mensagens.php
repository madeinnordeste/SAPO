<?php defined('SYSPATH') OR die('No direct access allowed.');

class Mensagens_Controller extends Template_Controller {
 
 	public $template = 'template'; 
 
 	public $auto_render = TRUE;
 
 	public function __construct()
	{
		parent::__construct();
		
		$this->session = Session::instance();
	}
 
 	public function index()
	{
		$this->acesso_negado();
	
	}
	
	public function acesso_negado(){
		
		
		$texto = 'Você não tem permissão para acessar este recurso.<br>Por favor entre em contato com o administrador.';			
		$conteudo =  html::message($texto, 'Acesso Negado', 'erro');
		
		$this->template->content = $conteudo;
		
	}
	
	
}