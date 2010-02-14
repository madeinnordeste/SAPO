<?php defined('SYSPATH') OR die('No direct access allowed.');

class Procedimento_Model extends ORM {
	
	protected $sorting = array('data' => 'desc', 'hora' => 'asc');
	
	protected $belongs_to = array('tipo_procedimento', 'processo', 'advogado');	
	
}