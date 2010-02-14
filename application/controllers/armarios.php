<?php defined('SYSPATH') OR die('No direct access allowed.');

class Armarios_Controller extends Template_Controller {
 
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
		
		$armarios = ORM::factory('armario')->find_all();
				
		$view = View::Factory('armarios/lista');
		$view->set('armarios', $armarios);
		
		
		$this->template->content =	$view;		
		
	}
	
	public function formulario($id = FALSE){
		
		$armario = ORM::Factory('armario', $id);
		
		$view = View::Factory('armarios/formulario');
		$view->set('armario', $armario);		
		$this->template->content =	$view;
			
	}
	
	public function salvar(){
		
		$armario = ORM::Factory('armario', $_POST['id']);
		
		$salvar = objects::match_and_save_attributes($armario, $_POST);
		
		html::flash_message('Dados do armário salvos com sucesso!', 'success');
				
		url::redirect('armarios/');		
	}
	
	
	public function excluir($armario_id){
		
		$armario = ORM::Factory('armario', $armario_id);
		
		//verifica se tem gavetas
		if($armario->gavetas->count()){
			
			$conteudo = '<h1>Excluir armário</h1>';
				$texto = 'Para remover este armário, é necessário remover suas gavetas primeiro.<br>';
				$texto.= html::anchor('armarios/formulario/'.$armario->id, 'Voltar ao Armário: '.$armario->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$armario->delete();
			
			html::flash_message('Armário excluído com sucesso!', 'success');
			
			url::redirect('armarios/');
			
		}
		
	}
	
	
}