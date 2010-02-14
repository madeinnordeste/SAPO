<?php defined('SYSPATH') OR die('No direct access allowed.');

class Advogado_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('procedimentos');
		
	public function procedimentos_aberto(){

		$procedimentos = ORM::Factory('procedimento')
							->where(array('advogado_id' => $this->id,'status' => 0))
							->find_all();
		return $procedimentos;
	}
	
	public function procedimentos_finalizados(){
		$procedimentos = ORM::Factory('procedimento')
							->where(array('advogado_id' => $this->id,'status' => 1))
							->find_all();
		return $procedimentos;
	}
	
}