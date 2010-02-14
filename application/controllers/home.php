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
		$this->template->content= '<h1>Tela inicial - Em desenvolvimento</h1>';
		
		//$this->template->content= Kohana::debug(Kohana);
		
		
	
	}
}