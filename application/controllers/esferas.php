<?php defined('SYSPATH') OR die('No direct access allowed.');

class Esferas_Controller extends Template_Controller {
 
 	public $template = 'template';  
 	public $auto_render = TRUE;
 
 	public function __construct()
	{
		parent::__construct();
		
		$this->session = Session::instance();
	}
 
 	public function index()
	{
		$this->lista();
		
	}
	
	public function lista(){
		
		$esferas = ORM::factory('esfera')->find_all();
				
		$view = View::Factory('esferas/lista');
		$view->set('esferas', $esferas);
		
		
		$this->template->content =	$view;		
		
	}
	
	public function formulario($id = 0){
		
		$esfera = ORM::Factory('esfera', $id);
		
		$view = View::Factory('esferas/formulario');
		$view->set('esfera', $esfera);
		
		$this->template->content = $view;
		
	}
	
	public function salvar(){
		
		$esfera = ORM::Factory('esfera', $_POST['id']);
		
		$salvo = objects::match_and_save_attributes($esfera, $_POST);
		
		html::flash_message('Dados da esfera salvos com sucesso!', 'success');
		
		url::redirect('esferas');
		
	}
	
	
	public function excluir($id){
		
		$esfera = ORM::Factory('esfera', $id);
		
		if($esfera->orgaos->count()){
			
			$conteudo = '<h1>Excluir esfera</h1>';
				$texto = 'Para remover esta esfera, é necessário remover seus orgãos primeiro.<br>';
				$texto.= html::anchor('esferas/formulario/'.$esfera->id, 'Voltar a esfera: '.$esfera->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$esfera->delete();
			
			html::flash_message('Esfera excluída com sucesso!', 'success');
			
			url::redirect('esferas/');
			
		}
		
	}
}