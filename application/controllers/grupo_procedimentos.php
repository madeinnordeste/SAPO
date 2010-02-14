<?php defined('SYSPATH') OR die('No direct access allowed.');

class Grupo_procedimentos_Controller extends Template_Controller {
 
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
		
		$grupos = ORM::factory('grupo_procedimento')->find_all();
				
		$view = View::Factory('grupo_procedimentos/lista');
		$view->set('grupos', $grupos);
		
				
		$this->template->content =	$view;		
		
	}
	
	
	
	public function formulario($id = FALSE){
		
		$grupo = ORM::Factory('grupo_procedimento', $id);
		
		$view = View::Factory('grupo_procedimentos/formulario');
		$view->set('grupo', $grupo);		
		$this->template->content =	$view;
			
	}
	
	
		
	public function salvar(){
		
		$grupo = ORM::Factory('grupo_procedimento', $_POST['id']);
		
		$salvar = objects::match_and_save_attributes($grupo, $_POST);
		
		html::flash_message('Dados do grupo de procedimentos salvos com sucesso!', 'success');
		
		url::redirect('grupo_procedimentos/');		
	}
	
		
	public function excluir($id){
		
		$grupo = ORM::Factory('grupo_procedimento', $id);
		
	
		if($grupo->tipo_procedimentos->count()){
			
			$conteudo = '<h1>Excluir Grupo de Procedimentos</h1>';
				$texto = 'Para remover este grupo de procedimentos, é necessário remover seus tipos de procedimentos primeiro.<br>';
				$texto.= html::anchor('grupo_procedimentos/formulario/'.$grupo->id, 'Voltar ao Grupo: '.$grupo->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$grupo->delete();
			
			html::flash_message('Grupo de procedimentos excluído com sucesso!', 'success');
			
			url::redirect('grupo_procedimentos/');
			
		}
		
	}
	
	
	
}