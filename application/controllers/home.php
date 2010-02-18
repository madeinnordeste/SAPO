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
		
		//procedimentos
		$procedimentos = array();
		$proc_finalizados = array();
		$advogados = ORM::factory('advogado')->find_all();
		foreach($advogados as $advogado){
			//procedimentos finalizados
			$total = $advogado->procedimentos_finalizados()->count();
			if($total){
				$proc_finalizados[$total] = $advogado->nome;	
			}
			
			//procedimentos
			$total = $advogado->procedimentos->count();
			if($total){
				$procedimentos[$total] = $advogado->nome;	
			}
			
		}
		
		
		$view = View::Factory('home/index');
		$view->set('procedimentos', $procedimentos);
		$view->set('proc_finalizados', $proc_finalizados);
		
		$this->template->content= $view;
		
		
	
	}
}