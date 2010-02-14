<h1>Formulário de Esfera</h1>
<?=form::open('esferas/salvar', array('id' => 'form_esfera'), array('id' => $esfera->id))?>
<div class="grid_11 alpha">
	Nome:<br>
	<?=form::input('nome', $esfera->nome, 'class="validate[required]"')?>
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_esfera").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	if($esfera->id){
		echo '<h2>Orgãos'.html::anchor('orgaos/formulario/0/'.$esfera->id, '[ Adicionar Orgão]').'</h2>';
		
		
		if($esfera->orgaos->count()){

			$caption = $esfera->orgaos->count().' Orgãos encontradas';
			$headers = array('Nome', 'Processos', 'Ações');
				$headers['sizes'] = array(300, FALSE,200);
			$footers = FALSE;

			$lines = array();
			foreach($esfera->orgaos as $orgao){
				$col = array();			
				$col[] = $orgao->nome;
				$col[] = $orgao->processos->count();

				$action_links = html::anchor('orgaos/formulario/'.$orgao->id, 'Vizualizar', array('class' => 'view'));

				$title = 'Tem certeza que deseja excluir '.$orgao->nome.'?';
				$action_links.= html::anchor('orgaos/excluir/'.$orgao->id, 'Excluir', array('class' => 'delete', 'title' => $title));
				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);


		}else{
			
			$texto = 'Não existem Orgãos para esta esfera.';			
			echo html::message($texto, FALSE);
			
		}
		
	}
	
	
	
	

?>

