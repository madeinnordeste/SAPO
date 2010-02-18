<?php defined('SYSPATH') OR die('No direct access allowed.');

class Procedimentos_Controller extends Template_Controller {
 
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
	
	

	public function formulario($id = FALSE, $processo_id = FALSE){		
		$procedimento = ORM::Factory('procedimento', $id);
		$advogados = ORM::Factory('advogado')->select_list('id', 'nome');
			$advogados[0] = 'Não Definido';
			//$advogados = array_merge(array(0 => 'Não definido'), $advogados);
		$tipo_procedimentos = ORM::Factory('grupo_procedimento')->select_list_with_childrens();
		$processo = ORM::Factory('processo', $processo_id);
		
		
		$view = View::Factory('procedimentos/formulario');
		$view->set('procedimento', $procedimento);		
		$view->set('advogados', $advogados);	
		$view->set('tipo_procedimentos', $tipo_procedimentos);		
		$view->set('processo', $processo);	
		
		
		$this->template->content =	$view;			
	}
	
	
	public function salvar(){		
		$procedimento = ORM::Factory('procedimento', $_POST['id']);		
		$salvar = objects::match_and_save_attributes($procedimento, $_POST);	
		
		html::flash_message('Dados do procedimento salvos com sucesso!', 'success');
					
		url::redirect('processos/formulario/'.$_POST['processo_id']);		
	}	

	public function excluir($id){		
		$procedimento = ORM::Factory('procedimento', $id);	
		$processo = $procedimento->processo;
		
		$procedimento->delete();
		
		html::flash_message('Procedimento excluído com sucesso!', 'success');
		
		url::redirect('processos/formulario/'.$processo->id);
		
	}
   
	
	
	
}
