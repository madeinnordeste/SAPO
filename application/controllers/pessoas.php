<?php defined('SYSPATH') OR die('No direct access allowed.');

class Pessoas_Controller extends Template_Controller {
 
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
		
		
		$objPessoa = ORM::factory('pessoa');
		$objPessoa->orderby('nome', 'ASC');
		
		//like
		$arrTermo = array();
		if($termo){
			$arrTermo = array('nome' => $termo);		
		
		}
		
		//limit
		$pp = Kohana::config('pagination.default.items_per_page');
		$pessoas = $objPessoa->like($arrTermo)->limit($pp, ($pagina -1) * $pp)->find_all();
		
		//total
		$total = $objPessoa->like($arrTermo)->find_all()->count();
		
		
		//paginacao
		$paginacao = $this->pagination = new Pagination(array(
		        'base_url'    => 'pessoas/lista/pagina/'.$termo, 
		        'uri_segment' => 3, 
		        'total_items' => $total 
		    ));
		
		

				
		$view = View::Factory('pessoas/lista');
		$view->set('pessoas', $pessoas);
		$view->set('pagina', $pagina);
		$view->set('termo', $termo);
		$view->set('paginacao', $paginacao);
		$view->set('total', $total);
		
		
		
		$this->template->content =	$view;		
		
		
		
	}
	

	public function formulario($id = FALSE){
		
		$pessoa = ORM::Factory('pessoa', $id);
			
		$view = View::Factory('pessoas/formulario');
		$view->set('pessoa', $pessoa);		
		$this->template->content =	$view;
			
	}
	
	
	public function salvar(){
		
		$pessoa = ORM::Factory('pessoa', $_POST['id']);
		
		$salvar = objects::match_and_save_attributes($pessoa, $_POST);
		
		html::flash_message('Dados da pessoa salvos com sucesso!', 'success');
				
		url::redirect('pessoas/');		
	}
	
	
	
	public function excluir($id){
		
		$pessoa = ORM::Factory('pessoa', $id);
		
		
		if($pessoa->processos()->count()){
			
			$conteudo = '<h1>Excluir Pessoa</h1>';
				$texto = 'Para remover esta pessoa, é necessário remover todos os processos que ela faz parte.<br>';
				$texto.= html::anchor('pessoas/', 'Voltar a lista de Pessoas');
			
			$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');
			
			$this->template->content =	$conteudo;
			
		}else{
			
			$pessoa->delete();
			
			html::flash_message('Pessoa excluída com sucesso!', 'success');
			
			url::redirect('pessoas/');
			
		}
		
	}
	
	
	
}
