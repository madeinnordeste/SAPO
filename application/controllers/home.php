<?php defined('SYSPATH') OR die('No direct access allowed.');

class Home_Controller extends Template_Controller {
 
 	public $template = 'template'; //defaults to template but you can set your own view file
 
 	public $auto_render = TRUE; //defaults to true, renders the template after the controller method is done
 
 	public function __construct()
	{
		parent::__construct(); //necessary
	}
 
 	public function index()
	{
		
		$procedimentos = ORM::Factory('procedimento')->lista_semana();
		
		
		$view = View::Factory('home/index');
		$view->set('procedimentos', $procedimentos);
		
		$this->template->content= $view;
		
		
	
	}
}