<h1>Formulário de Gaveta</h1>
<?=form::open('gavetas/salvar', array('id' => 'form_gavetas'), array('id' => $gaveta->id))?>
<div class="grid_5 alpha">
	Nome:<br>
	<?=form::input('nome', $gaveta->nome, 'class="validate[required]"')?>
</div>
<div class="grid_5 alpha">
	Armário:<br>
	<?=form::dropdown('armario_id', $armario->select_list('id', 'nome'), $gaveta->armario_id)?>
</div>

<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_gavetas").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	if($gaveta->id){
		echo '<h2>Processos</h2>';
		
		
		if($gaveta->processos->count()){

			
			$caption = $gaveta->processos->count().' Processo(s) encontrado(s)';
			$headers = array('Número', 'Orgão', 'Cliente', 'Parte Oposta', 'Ações');
				$headers['sizes'] = array(200,200,200,200);
			$footers = FALSE;

			$lines = array();
			foreach($gaveta->processos as $processo){
				$col = array();			
				$col[] = $processo->numero;
				$col[] = $processo->orgao->nome;
				$col[] = $processo->cliente->nome;
				$col[] = $processo->parte_oposta->nome;

				$action_links = html::anchor('processos/formulario/'.$processo->id, 'Vizualizar', array('class' => 'view'));

				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);
			
			
			
			

		}else{
			
			$texto = 'Não existem processos nesta gaveta.';			
			echo html::message($texto, FALSE);
			
		}
		
	}
	
	
	
	

?>

