<h1>Lista de Grupo de procedimentos<?=html::anchor('grupo_procedimentos/formulario', '[ Adicionar Novo ]')?></h1>
<?php
	if($grupos->count()){
		
		
		$caption = $grupos->count().' Grupos de procedimentos encontrados';
		$headers = array('Nome', 'Tipos de procedimento', 'Ações');
			$headers['sizes'] = array(450, FALSE,50);
		$footers = FALSE;
		
		
		$lines = array();
		foreach($grupos as $grupo){
			$col = array();
			
			$col[] = $grupo->nome;
			$col[] = $grupo->tipo_procedimentos->count();
			
			
			$action_links = html::anchor('grupo_procedimentos/formulario/'.$grupo->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$grupo->nome.' ?';
			$action_links.= html::anchor('grupo_procedimentos/excluir/'.$grupo->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			$lines[] = $col;
		}
			
		
		echo html::grid($headers, $lines, $footers, $caption);
		
		
	
	}else{
		
		$texto = 'Não existem Grupos de procedimentos registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>
