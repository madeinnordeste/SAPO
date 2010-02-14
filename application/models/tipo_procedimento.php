<?php defined('SYSPATH') OR die('No direct access allowed.');

class Tipo_procedimento_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $belongs_to = array('grupo_procedimento');
	protected $has_many = array('procedimentos');
	
}