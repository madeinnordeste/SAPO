<h1>Formulário de Grupos de procedimentos</h1>
<?=form::open('grupo_procedimentos/salvar', array('id' => 'form_grupo_procedimento'), array('id' => $grupo->id))?>
<div class="grid_11 alpha">
	Nome:<br>
	<?=form::input('nome', $grupo->nome, 'class="validate[required]"')?>
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_grupo_procedimento").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	if($grupo->id){
		echo '<h2>Tipos de procedimento'.html::anchor('tipo_procedimentos/formulario/0/'.$grupo->id, '[ Adicionar Novo ]').'</h2>';
		
		
		if($grupo->tipo_procedimentos->count()){
			
			$caption = $grupo->tipo_procedimentos->count().' Tipos de procedimento encontradas';
			$headers = array('Nome', 'Ações');
				$headers['sizes'] = array(FALSE, 100);
			$footers = FALSE;


			$lines = array();
			foreach($grupo->tipo_procedimentos as $procedimento){
				
				$col = array();			
				$col[] = $procedimento->nome;				

				
				$title = 'Tem certeza que deseja excluir '.$procedimento->nome.'?';
				$action_links= html::anchor('tipo_procedimentos/excluir/'.$procedimento->id, 'Excluir', array('class' => 'delete', 'title' => $title));
				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);
			

		}else{
			
			$texto = 'Não existem tipos procedimentos para este grupo de procedimentos.';			
			echo html::message($texto, FALSE);
			
		}
		
	}
	
	
	
	

?>

