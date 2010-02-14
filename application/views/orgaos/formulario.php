<h1>Formulário de Orgão</h1>
<?=form::open('orgaos/salvar', array('id' => 'form_orgaos'), array('id' => $orgao->id))?>
<div class="grid_5 alpha">
	Nome:<br>
	<?=form::input('nome', $orgao->nome, 'class="validate[required]"')?>
</div>
<div class="grid_5 alpha">
	Esfera:<br>
	<?=form::dropdown('esfera_id', $esfera->select_list('id', 'nome'), $orgao->esfera_id)?>
</div>

<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_orgaos").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	if($orgao->id){
		echo '<h2>Processos</h2>';
		
		
		if($orgao->processos->count()){

			
			$caption = $orgao->processos->count().' Processo(s) encontrado(s)';
			$headers = array('Número', 'Gaveta', 'Cliente', 'Parte Oposta', 'Ações');
				$headers['sizes'] = array(200,200,200,200);
			$footers = FALSE;

			$lines = array();
			foreach($orgao->processos as $processo){
				$col = array();			
				$col[] = $processo->numero;
				$col[] = $processo->gaveta->armario->nome.' > '.$processo->gaveta->nome;
				$col[] = $processo->cliente->nome;
				$col[] = $processo->parte_oposta->nome;

				$action_links = html::anchor('processos/formulario/'.$processo->id, 'Vizualizar', array('class' => 'view'));

				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);
			
			
			
			

		}else{
			
			$texto = 'Não existem processos neste orgão.';			
			echo html::message($texto, FALSE);
			
		}
		
	}
	
	
	
	

?>

