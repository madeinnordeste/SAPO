<?php defined('SYSPATH') OR die('No direct access allowed.');

class Procedimento_Model extends ORM {
	
	protected $sorting = array('data' => 'desc', 'hora' => 'asc');
	
	protected $belongs_to = array('tipo_procedimento', 'processo', 'advogado');	
	
	
	public function lista_semana(){
		
		$semana = date::week_days();
		//echo Kohana::debug($semana);
		
		$lista = array();
		
		foreach($semana as $dia){
			
			$lista[$dia] = ORM::Factory('procedimento')->where('data', $dia)->find_all();
			
		
		}
		
		return $lista;
		
		
	}
	
}