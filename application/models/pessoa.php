<?php defined('SYSPATH') OR die('No direct access allowed.');

class Pessoa_Model extends ORM {

   protected $sorting = array('nome' => 'asc');
	
	
	public function processos(){
		
		$orwhere = array('cliente_id' => $this->id, 'parte_oposta_id' => $this->id);
		$processos = ORM::Factory('processo')->orwhere($orwhere)->find_all();
		return $processos;
	}
	
	public function processos_cliente(){
		
		$where = array('cliente_id' => $this->id);
		$processos = ORM::Factory('processo')->where($where)->find_all();
		return $processos;
		
		
	}
	
	public function processos_oposto(){
		$where = array('parte_oposta_id' => $this->id);
		$processos = ORM::Factory('processo')->where($where)->find_all();
		return $processos;
	}
	
	
}
