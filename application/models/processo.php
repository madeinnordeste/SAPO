<?php defined('SYSPATH') OR die('No direct access allowed.');

class Processo_Model extends ORM {
	
		
	protected $has_many = array('procedimentos');
	protected $belongs_to = array('gaveta', 'orgao', 'cliente' => 'pessoa', 'parte_oposta' => 'pessoa');
	
	
	public function ultimo_procedimento(){
	
        $procedimento = ORM::Factory('procedimento')
                        ->where('processo_id', $this->id)
                        ->orderby('data', 'DESC')
                        ->find();

        return $procedimento;

	}
	
	public function ultimo_procedimento_realizado(){
	
        $procedimento = ORM::Factory('procedimento')
                        ->where(array('processo_id' => $this->id, 'status' => 1))
                        ->orderby('data', 'DESC')
								->limit(1)								
                        ->find();

        return $procedimento;

	}
}
