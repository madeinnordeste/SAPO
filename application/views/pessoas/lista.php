<h1>Lista de Pessoas<?=html::anchor('pessoas/formulario', '[ Adicionar Nova ]')?></h1>
<div class="grid_10 alpha">
	Nome:<br>
	<?=form::input('termo', $termo, 'class="validate[required]"')?>
</div>
<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_search', 'Pesquisar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#btn_search").click(function(){
				var destino = "<?=url::site('pessoas/lista')?>/1/"+$('#termo').val();
				window.location = destino;			
		});		
	});
</script>
<div class="clear"></div>
<?php
	if($total){
		
		
		$caption = $total.' Pessoa(s) encontrada(s)';
		$headers = array('Nome', 'Processos', 'Proc. / Cliente', 'Proc. / P. Oposta', 'Ações');
			$headers['sizes'] = array(300, FALSE, FALSE, FALSE,50);
		$footers = FALSE;
		
		
		$lines = array();
		foreach($pessoas as $pessoa){
			$col = array();
			
			$col[] = $pessoa->nome;
			$col[] = $pessoa->processos()->count();
			$col[] = $pessoa->processos_cliente()->count();
			$col[] = $pessoa->processos_oposto()->count();
						
			
			$action_links = html::anchor('pessoas/formulario/'.$pessoa->id, 'Editar', array('class' => 'edit'));
			
			$title = 'Tem certeza que deseja excluir '.$pessoa->nome.' ?';
			$action_links.= html::anchor('pessoas/excluir/'.$pessoa->id, 'Excluir', array('class' => 'delete', 'title' => $title));
			$col[] = $action_links;
			
			
			$lines[] = $col;
		}
			
		
		echo html::grid($headers, $lines, $footers, $caption);
		
		echo $paginacao;
		
		
	
	}else{
		
		$texto = 'Não existem pessoas registrados.';			
		echo html::message($texto, FALSE);
		
	}

?>