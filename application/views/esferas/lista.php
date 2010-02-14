<h1>Lista de Esferas<?=html::anchor('esferas/formulario', '[ Adicionar Nova ]')?></h1>
<?php
	if($esferas->count()){
		
		
		$caption = $esferas->count().' Esferas encontrados';
		$headers = array('Nome', 'Orgãos', 'Ações');
			$headers['sizes'] = array(450, FALSE,50);
		$footers = FALSE;
		
		$lines = array();
		
		foreach($esferas as $esfera){
			$col = array();
			
			$col[] = $esfera->nome;
			$col[] = $esfera->orgaos->count();
			
			
			$action_links = html::anchor('esferas/formulario/'.$esfera->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$esfera->nome.' ?';
			$action_links.= html::anchor('esferas/excluir/'.$esfera->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			$lines[] = $col;
		}
		
			
		
		echo html::grid($headers, $lines, $footers, $caption);
		
		
	
	}else{
		
		$texto = 'Não existem esferas registradas.';			
		echo html::message($texto, FALSE);
		
	}

?>
