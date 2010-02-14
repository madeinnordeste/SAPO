<h1>Lista de Advogados<?=html::anchor('advogados/formulario', '[ Adicionar Novo ]')?></h1>
<?php
	if($advogados->count()){
		
		
		$caption = $advogados->count().' Advogados encontrados';
		$headers = array('Nome', 'Procedimentos', 'Proc. em Aberto', 'Proc. Finalizados', 'Ações');
			$headers['sizes'] = array(300, FALSE, FALSE, FALSE,50);
		$footers = FALSE;
		
		$lines = array();
		foreach($advogados as $advogado){
			$col = array();
			
			$col[] = $advogado->nome;
			$col[] = $advogado->procedimentos->count();
			$col[] = $advogado->procedimentos_aberto()->count();
			$col[] = $advogado->procedimentos_finalizados()->count();
			
			
			$action_links = html::anchor('advogados/formulario/'.$advogado->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$advogado->nome.' ?';
			$action_links.= html::anchor('advogados/excluir/'.$advogado->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			$lines[] = $col;
		}
			
		
		echo html::grid($headers, $lines, $footers, $caption);
		
		
	
	}else{
		
		$texto = 'Não existem advogados registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>