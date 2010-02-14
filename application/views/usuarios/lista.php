<h1>Lista de Usuários<?=html::anchor('usuarios/formulario', '[ Adicionar Novo ]')?></h1>
<?php
	if($usuarios->count()){
		
		
		$caption = $usuarios->count().' Usuário(s) encontrada(s)';
		$headers = array('Nome', 'Email', 'Grupo', 'Ações');
			$headers['sizes'] = array(FALSE, 250, 250, 100);
		$footers = FALSE;
		
		
		$lines = array();
		foreach($usuarios as $usuario){
			$col = array();
			
			$col[] = $usuario->nome;
			$col[] = $usuario->email;
			$col[] = $usuario->grupo_acesso->nome;
			
			$action_links = html::anchor('usuarios/formulario/'.$usuario->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$usuario->nome.' ?';
			$action_links.= html::anchor('usuarios/excluir/'.$usuario->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			
			$lines[] = $col;
		}
		
		echo html::grid($headers, $lines, $footers, $caption);
		
	
	}else{
		
		$texto = 'Não usuários registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>