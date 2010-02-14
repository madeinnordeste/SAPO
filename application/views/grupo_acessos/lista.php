<h1>Lista de Grupos de Acesso<?=html::anchor('grupo_acessos/formulario', '[ Adicionar Novo ]')?></h1>
<?php
	if($grupos->count()){
		
		
		$caption = $grupos->count().' Grupo(s) de Acesso encontrado(s)';
		$headers = array('Nome', 'Usuários', 'Permissões', 'Ações');
			$headers['sizes'] = array(FALSE, FALSE, FALSE, 100);
		$footers = FALSE;
		
		
		$lines = array();
		foreach($grupos as $grupo){
			$col = array();
			
			$col[] = $grupo->nome;
			$col[] = $grupo->usuarios->count();		
			$col[] = $grupo->acessos->count();		
			
			$action_links = html::anchor('grupo_acessos/formulario/'.$grupo->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$grupo->nome.' ?';
			$action_links.= html::anchor('grupo_acessos/excluir/'.$grupo->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			
			$lines[] = $col;
		}
		
		echo html::grid($headers, $lines, $footers, $caption);
		
	
	}else{
		
		$texto = 'Não existem grupos de acessos registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>