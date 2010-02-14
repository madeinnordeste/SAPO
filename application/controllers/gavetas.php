<?php defined('SYSPATH') OR die('No direct access allowed.');

class Gavetas_Controller extends Template_Controller {
 
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
	
	public function formulario($id = 0, $armario_id = 0){
		
		$gaveta = ORM::Factory('gaveta', $id);
		
			if(!$gaveta->armario_id){
				$gaveta->armario_id = $armario_id;
			}
		
		$armario = ORM::Factory('armario');
		
		$view = View::Factory('gavetas/formulario');
		$view->set('gaveta', $gaveta);
		$view->set('armario', $armario);
		
		$this->template->content = $view;
		
	}
	
	public function salvar(){
		
		$gaveta = ORM::Factory('gaveta', $_POST['id']);
		
		$salvo = objects::match_and_save_attributes($gaveta, $_POST);
		
		html::flash_message('Dados da gaveta salvos com sucesso!', 'success');
		
		url::redirect('armarios/formulario/'.$_POST['armario_id']);
		
	}
	
	
	public function excluir($id){
		
		$gaveta = ORM::Factory('gaveta', $id);
		
		if($gaveta->processos->count()){
			
			$conteudo = '<h1>Excluir gaveta</h1>';
				$texto = 'Para remover esta gaveta, é necessário remover/mover seus processos primeiro.<br>';
				$texto.= html::anchor('armarios/formulario/'.$gaveta->armario->id, 'Voltar ao Armário: '.$gaveta->armario->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$armario = $gaveta->armario->id;
			
			$gaveta->delete();
			
			html::flash_message('Gaveta excluída com sucesso!', 'success');
			
			url::redirect('armarios/formulario/'.$armario);
		}
	}
	
}