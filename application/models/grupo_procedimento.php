<?php defined('SYSPATH') OR die('No direct access allowed.');

class Grupo_procedimento_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('tipo_procedimentos');
	
	public function select_list_with_childrens(){
		$lista = array();
		$grupos = ORM::Factory('grupo_procedimento')->find_all();
		
		foreach($grupos as $grupo){
			$tipos = $grupo->tipo_procedimentos->select_list('id', 'nome');
			if(sizeof($tipos)){
				$lista[$grupo->nome] = $tipos;
			}
		}
		
	return $lista;
		
		
	}
	
}