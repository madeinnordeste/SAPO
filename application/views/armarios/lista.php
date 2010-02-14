<h1>Lista de Armários<?=html::anchor('armarios/formulario', '[ Adicionar Novo ]')?></h1>
<?php
	if($armarios->count()){
		
		
		$caption = $armarios->count().' Armários encontrados';
		$headers = array('Nome', 'Gavetas', 'Ações');
			$headers['sizes'] = array(450, FALSE,50);
		$footers = FALSE;
		
		$lines = array();
		foreach($armarios as $armario){
			$col = array();
			
			$col[] = $armario->nome;
			$col[] = $armario->gavetas->count();
			
			
			$action_links = html::anchor('armarios/formulario/'.$armario->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$armario->nome.' ?';
			$action_links.= html::anchor('armarios/excluir/'.$armario->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			$lines[] = $col;
		}
			
		
		echo html::grid($headers, $lines, $footers, $caption);
		
		
	
	}else{
		
		$texto = 'Não existem armários registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>
