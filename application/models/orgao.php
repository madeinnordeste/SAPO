<?php defined('SYSPATH') OR die('No direct access allowed.');

class Orgao_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $belongs_to = array('esfera');
	protected $has_many = array('processos');
	
}