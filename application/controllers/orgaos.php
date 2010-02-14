<?php defined('SYSPATH') OR die('No direct access allowed.');

class Orgaos_Controller extends Template_Controller {
 
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
	
	public function formulario($id = 0, $esfera_id = 0){
		
		$orgao = ORM::Factory('orgao', $id);
		
			if(!$orgao->esfera_id){
				$orgao->esfera_id = $esfera_id;
			}
		
		$esfera = ORM::Factory('esfera');
		
		$view = View::Factory('orgaos/formulario');
		$view->set('orgao', $orgao);
		$view->set('esfera', $esfera);
		
		$this->template->content = $view;
		
	}
	
	public function salvar(){
		
		$orgao = ORM::Factory('orgao', $_POST['id']);
		
		$salvo = objects::match_and_save_attributes($orgao, $_POST);
		
		html::flash_message('Dados do orgão salvos com sucesso!', 'success');
		
		url::redirect('esferas/formulario/'.$_POST['esfera_id']);
		
	}
	
	
	public function excluir($id){
		
		$orgao = ORM::Factory('orgao', $id);
		
		if($orgao->processos->count()){
			
			$conteudo = '<h1>Excluir orgão</h1>';
				$texto = 'Para remover esta orgão, é necessário remover/mover seus processos primeiro.<br>';
				$texto.= html::anchor('orgaos/formulario/'.$orgao->id, 'Voltar ao Orgão: '.$orgao->nome);
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$esfera = $orgao->esfera->id;
			
			$orgao->delete();
			
			html::flash_message('Orgão excluído com sucesso!', 'success');
			
			url::redirect('esferas/formulario/'.$esfera);
		}
	}
	
}