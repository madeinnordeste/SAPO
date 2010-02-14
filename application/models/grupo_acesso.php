<?php defined('SYSPATH') OR die('No direct access allowed.');

class Grupo_acesso_Model extends ORM {
	
	protected $sorting = array('nome' => 'asc');
	
	protected $has_many = array('usuarios', 'acessos');
	
	public function definir_acessos($acessos){
		
		//remove os acesso do grupo
		$db = new Database();
		
		$db->where('grupo_acesso_id', $this->id)->delete('acessos');
		
		//adiciona os novos acessos
		foreach($acessos as $acesso){
			
			$db->insert('acessos', array('grupo_acesso_id' => $this->id, 'metodo' => $acesso));
			
		}
		
	}
		
	
	
}