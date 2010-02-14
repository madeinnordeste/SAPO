<?php defined('SYSPATH') OR die('No direct access allowed.');

class Gaveta_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('processos');
	protected $belongs_to = array('armario');
	
}