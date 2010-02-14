<?php defined('SYSPATH') OR die('No direct access allowed.');

class Relatorios_Controller extends Template_Controller {
 
 	public $template = 'template';
 
 	public $auto_render = TRUE; 
 
 	public function __construct()
	{
		parent::__construct(); 
		
		$this->session = Session::instance();
		
	}
 
 	public function index()
	{
		$this->template->content= '<h1>Relatórios - Em desenvolvimento</h1>';
		
		
	
	}
}