<?php defined('SYSPATH') OR die('No direct access allowed.');

class Tipo_procedimentos_Controller extends Template_Controller {
 
 	public $template = 'template';  
 	public $auto_render = TRUE;
 
 	public function __construct()
	{
		parent::__construct();
		
		$this->session = Session::instance();
	}
	
	public function index(){
		$this->formulario();
	}
	
	public function formulario($id = 0, $grupo_procedimento_id = 0){
		
		$tipo = ORM::Factory('tipo_procedimento', $id);
		
			if(!$tipo->grupo_procedimento_id){
				$tipo->grupo_procedimento_id = $grupo_procedimento_id;
			}
		
		$grupo = ORM::Factory('grupo_procedimento');
		
		$view = View::Factory('tipo_procedimentos/formulario');
		$view->set('tipo', $tipo);
		$view->set('grupo', $grupo);
		
		$this->template->content = $view;
		
	}
	
	 
	public function salvar(){
		
		$tipo = ORM::Factory('tipo_procedimento', $_POST['id']);
		
		$salvo = objects::match_and_save_attributes($tipo, $_POST);
		
		html::flash_message('Dados do tipo de procedimento salvos com sucesso!', 'success');
		
		url::redirect('grupo_procedimentos/formulario/'.$_POST['grupo_procedimento_id']);
		
	}
	
	
	public function excluir($id){
		
		$tipo = ORM::Factory('tipo_procedimento', $id);
		
		if($tipo->procedimentos->count()){
			
			$conteudo = '<h1>Excluir tipo de procedimento</h1>';
				$texto = 'Para remover este tipo de procedimento, é necessário remover/mover todos os procedimentos deste tipo primeiro.<br>';
				$texto.= html::anchor('grupo_procedimentos/formulario/'.$tipo->grupo_procedimento->id, 
												'Voltar ao Grupo de procedimentos: '.$tipo->grupo_procedimento->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$grupo = $tipo->grupo_procedimento->id;
			
			$tipo->delete();
			
			html::flash_message('Tipo de procedimento excluído com sucesso!', 'success');
			
			url::redirect('grupo_procedimentos/formulario/'.$grupo);
		}
	}
	
	
}