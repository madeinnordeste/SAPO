<?php defined('SYSPATH') OR die('No direct access allowed.');

class Usuario_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $belongs_to = array('grupo_acesso');
		
	
	
}