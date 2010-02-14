<?php defined('SYSPATH') OR die('No direct access allowed.');

class Processos_Controller extends Template_Controller {
 
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
	
	public function lista($pagina = 1, $termo = ''){
		
		//$processos = ORM::factory('processo')->find_all();
		$objProcesso = ORM::factory('processo');
		
		$arrTermo = array();
		if($termo){
			$arrTermo = array('pessoas.nome' => $termo, 'processos.numero' => $termo);
			$objProcesso = $objProcesso->join('pessoas', 'pessoas.id', 'processos.cliente_id');
		}
		
		//limit
		$pp = Kohana::config('pagination.default.items_per_page');
		$processos = $objProcesso->orlike($arrTermo)->limit($pp, ($pagina -1) * $pp)->find_all();
		
		//total
		if($termo){
			$arrTermo = array('pessoas.nome' => $termo, 'processos.numero' => $termo);
			$objProcesso = $objProcesso->join('pessoas', 'pessoas.id', 'processos.cliente_id');
		}
		$total = $objProcesso->orlike($arrTermo)->find_all()->count();
		
		//paginacao
		$paginacao = $this->pagination = new Pagination(array(
		        'base_url'    => 'processos/lista/pagina/'.$termo, 
		        'uri_segment' => 3, 
		        'total_items' => $total 
		    ));
		
				
		$view = View::Factory('processos/lista');
		$view->set('processos', $processos);
		$view->set('termo', $termo);
      $view->set('pagina', $pagina);
 		$view->set('paginacao', $paginacao);
		$view->set('total', $total);
		
		$this->template->content =	$view;		
		
	}
	

	public function formulario($id = FALSE){		
		$processo = ORM::Factory('processo', $id);
		$pessoas = ORM::Factory('pessoa')->select_list('id', 'nome');
		$orgaos = ORM::Factory('esfera')->select_list_with_childrens();
		$gavetas = ORM::Factory('armario')->select_list_with_childrens();
		
		
		$view = View::Factory('processos/formulario');
		$view->set('processo', $processo);		
		$view->set('pessoas', $pessoas);
		$view->set('orgaos', $orgaos);
		$view->set('gavetas', $gavetas);
		
		$this->template->content =	$view;			
	}
	
		
	public function salvar(){		
		$processo = ORM::Factory('processo', $_POST['id']);		
		$processo = objects::match_and_save_attributes($processo, $_POST, TRUE);	
		
		html::flash_message('Dados do processo salvos com sucesso!', 'success');
					
		url::redirect('processos/formulario/'.$processo->id);		
	}
	
	

	public function excluir($id){		
		$processo = ORM::Factory('processo', $id);		
		if($processo->procedimentos->count()){			
			$conteudo = '<h1>Excluir Processo</h1>';
				$texto = 'Para remover este processo, é necessário move/remover todos os procedimentos vinculados a ele.<br>';
				$texto.= html::anchor('processos/formulario/'.$processo->id, 'Ver o formulário deste processo');			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');			
			$this->template->content =	$conteudo;			
		}else{			
			$processo->delete();			
			
			html::flash_message('Processo excluído com sucesso!', 'success');
			
			url::redirect('processos/');			
		}		
	}
   
	
	
	
}
