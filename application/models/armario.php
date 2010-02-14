<?php defined('SYSPATH') OR die('No direct access allowed.');

class Armario_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('gavetas');
	
	public function select_list_with_childrens(){
		$lista = array();
		$armarios = ORM::Factory('armario')->find_all();
		
		foreach($armarios as $armario){
			$gavetas = $armario->gavetas->select_list('id', 'nome');
			if(sizeof($gavetas)){
				$lista[$armario->nome] = $gavetas;
			}
		}
		
	return $lista;
		
		
	}
	
	
}