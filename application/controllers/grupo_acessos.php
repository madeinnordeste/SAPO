<?php defined('SYSPATH') OR die('No direct access allowed.');

class Grupo_acessos_Controller extends Template_Controller {
 
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
		
		$grupos = ORM::Factory('grupo_acesso')->find_all();
		
		$view = View::Factory('grupo_acessos/lista');
		$view->set('grupos', $grupos);
		
		$this->template->content= $view;
		
		
	
	}
	
	
	
	public function formulario($id = FALSE){
		$grupo = ORM::Factory('grupo_acesso', $id);
		
		$metodos =  objects::get_controllers_with_methods();
		
		
			//remove os metodos desportegidos
			//Kohana::config('vigilant.controllers_exception')
			foreach(Kohana::config('vigilant.controllers_exception') as $metodo_livre){
				
				unset($metodos[ucfirst($metodo_livre)]);
				
			}
			
				
		$view = View::Factory('grupo_acessos/formulario');
		$view->set('grupo', $grupo);
		$view->set('metodos', $metodos);
		
		$this->template->content= $view;
		
		
	}
	
	
	public function salvar(){
		
		$grupo = ORM::Factory('grupo_acesso', $_POST['id']);
		
						
		$grupo = objects::match_and_save_attributes($grupo, $_POST, TRUE);	
		
		if(!isset($_POST['acessos'])){
			
			$_POST['acessos'] = array();
			
		}
		
		$grupo->definir_acessos($_POST['acessos']);
		
		html::flash_message('Dados do grupo <b>'.$grupo->nome.'</b> salvos com sucesso!', 'success');
					
		url::redirect('grupo_acessos/lista/');		
		
				
	}
	
	

	public function excluir($id){
		
		$grupo = ORM::Factory('grupo_acesso', $id);

		if($grupo->usuarios->count()){

				$conteudo = '<h1>Excluir Grupo de Acesso</h1>';
					$texto = 'Para remover este Grupo de Acesso, é necessário remover/mover todos seus usuários primeiro.<br>';
					$texto.= html::anchor('grupo_acessos', 'Voltar a lista de Grupos de Acesso');

				$conteudo = $conteudo.html::message($texto, 'Atenção', 'erro');

				$this->template->content =	$conteudo;

		}else{

				$nome = $grupo->nome;

				$grupo->delete();

				html::flash_message('Grupo de Acesso <b>'.$nome.'</b> excluído com sucesso!', 'success');

				url::redirect('grupo_acessos');
			}
		
		
		
	}
	
	
	
}