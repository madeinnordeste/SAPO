<?php defined('SYSPATH') OR die('No direct access allowed.');

class Advogados_Controller extends Template_Controller {
 
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
		
								
		$advogados = ORM::factory('advogado')->find_all();
				
		$view = View::Factory('advogados/lista');
		$view->set('advogados', $advogados);
		
		
		$this->template->content =	$view;		
		
	}
	
	
	public function formulario($id = FALSE){
		
		$advogado = ORM::Factory('advogado', $id);
		
		$view = View::Factory('advogados/formulario');
		$view->set('advogado', $advogado);		
		$this->template->content =	$view;
			
	}
	
	
	public function salvar(){
		
		$advogado = ORM::Factory('advogado', $_POST['id']);
		
		$salvar = objects::match_and_save_attributes($advogado, $_POST);
		
		html::flash_message('Dados do advogado salvos com sucesso!', 'success');
				
		url::redirect('advogados/');		
	}
	
	
	
	public function excluir($id){
		
		$advogado = ORM::Factory('advogado', $id);
		
		
		if($advogado->procedimentos->count()){
			
			$conteudo = '<h1>Excluir Advogado</h1>';
				$texto = 'Para remover este advogado, é necessário move/remover todos os procedimentos que ele é responsável.<br>';
				$texto.= html::anchor('advogados/', 'Voltar a lista de Advogados');
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$advogado->delete();
			
			html::flash_message('Advogado excluído com sucesso!', 'success');
			
			url::redirect('advogados/');
			
		}
		
	}
	
	
	
}