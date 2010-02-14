<h1>Formulário de Armário</h1>
<?=form::open('armarios/salvar', array('id' => 'form_armario'), array('id' => $armario->id))?>
<div class="grid_11 alpha">
	Nome:<br>
	<?=form::input('nome', $armario->nome, 'class="validate[required]"')?>
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_armario").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	if($armario->id){
		echo '<h2>Gavetas'.html::anchor('gavetas/formulario/0/'.$armario->id, '[ Adicionar Gaveta]').'</h2>';
		
		
		if($armario->gavetas->count()){

			$caption = $armario->gavetas->count().' Gavetas encontradas';
			$headers = array('Gaveta', 'Processos', 'Ações');
				$headers['sizes'] = array(300, FALSE,200);
			$footers = FALSE;

			$lines = array();
			foreach($armario->gavetas as $gaveta){
				$col = array();			
				$col[] = $gaveta->nome;
				$col[] = $gaveta->processos->count();

				$action_links = html::anchor('gavetas/formulario/'.$gaveta->id, 'Vizualizar', array('class' => 'view'));

				$title = 'Tem certeza que deseja excluir '.$gaveta->nome.'?';
				$action_links.= html::anchor('gavetas/excluir/'.$gaveta->id, 'Excluir', array('class' => 'delete', 'title' => $title));
				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);


		}else{
			
			$texto = 'Não existem gavetas para este armário.';			
			echo html::message($texto, FALSE);
			
		}
		
	}
	
	
	
	

?>

