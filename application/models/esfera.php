<?php defined('SYSPATH') OR die('No direct access allowed.');

class Esfera_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('orgaos');
	
	public function select_list_with_childrens(){
		$lista = array();
		$esferas = ORM::Factory('esfera')->find_all();
		
		foreach($esferas as $esfera){
			$orgaos = $esfera->orgaos->select_list('id', 'nome');
			if(sizeof($orgaos)){
				$lista[$esfera->nome] = $orgaos;
			}
		}
		
	return $lista;
		
		
	}
	
}