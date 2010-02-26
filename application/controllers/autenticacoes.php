<?php defined('SYSPATH') OR die('No direct access allowed.');

class Autenticacoes_Controller extends Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index(){
		
		$view = View::Factory('autenticacoes/formulario');
		$view->render(TRUE);
		
	}
	
	
	public function login(){
		
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		
		$usuario = ORM::Factory('usuario')->where(array('email' => $email, 'senha' => $senha))->find();
		
		if($usuario->id){
			
			Session::instance()->set('usuario', $usuario);
			url::redirect('home');	
			
		}else{
			
			html::flash_message('E-mail ou Senhas inválidos.', 'erro');
			url::redirect('autenticacoes/');	
		}
		
		
	}
	
	public function logoff(){
	
		Session::instance()->delete('usuario');
		html::flash_message('Usuário desconectado.', 'success');
		$this->index();
		
	}
	
	

}