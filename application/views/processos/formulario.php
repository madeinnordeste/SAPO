<h1>Formulário de Processo</h1>
<?=form::open('processos/salvar', array('id' => 'form_processos'), array('id' => $processo->id))?>
<div class="grid_4 alpha">
	Número:<br>
	<?=form::input('numero', $processo->numero, 'class="validate[required]"')?>
</div>
<div class="grid_4">
	Cliente:<br>
	<?=form::dropdown('cliente_id', $pessoas, $processo->cliente->id)?>
</div>
<div class="grid_4 omega">
	Parte Oposta:<br>
	<?=form::dropdown('parte_oposta_id', $pessoas, $processo->parte_oposta->id)?>
</div>
<div class="clear"></div>

<div class="grid_4 alpha">
	Orgão:<br>
	<?=form::dropdown('orgao_id', $orgaos, $processo->orgao_id)?>
</div>
<div class="grid_4">
	Gaveta:<br>
	<?=form::dropdown('gaveta_id', $gavetas, $processo->gaveta_id)?>
</div>
<div class="grid_4 omega">
	Arquivado:<br>
	<?=form::dropdown('arquivado', array(0 => 'Não', 1 => 'Sim'), $processo->arquivado)?>
</div>
<div class="clear"></div>

<div class="grid_10 alpha">
	&nbsp;
</div>
<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_processos").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<?php
	
	
	//procedimentos dos processos
	if($processo->id){
		echo '<h2>Procedimentos do processo '.html::anchor('procedimentos/formulario/0/'.$processo->id, '[ Adicionar Novo ]').'</h2>';
		
		
		if($processo->procedimentos->count()){

			
			$caption = $processo->procedimentos->count().' Procedimento(s) encontrado(s)';
			$headers = array('Data', 'Hora', 'Tipo', 'Advogado', 'Observações', 'Realizado', 'Ações');
				$headers['sizes'] = array(90,70,150, 150,FALSE, 80, 80);
			$footers = FALSE;

			$lines = array();
			foreach($processo->procedimentos as $procedimento){
				$col = array();			
				$col[] = date::us2br($procedimento->data);
				$col[] = $procedimento->hora;
				$col[] = $procedimento->tipo_procedimento->nome;
				$col[] = $procedimento->advogado->nome;					
				$col[] = html::anchor('#', 
											text::limit_words($procedimento->observacoes, 6, '...'), 
											array('title' => $procedimento->observacoes, 'class' => 'false'));
				$col[] = html::image('static/images/icons/flag_'.$procedimento->status.'.gif');

				$action_links = html::anchor('procedimentos/formulario/'.$procedimento->id.'/'.$processo->id, 'Ver', array('class' => 'view'));
				
				
				
				$excluir_title = 'Tem certeza que deseja excluir o procedimento: ';
				$excluir_title.= $procedimento->tipo_procedimento->nome;
				$excluir_title.= ' em '.date::us2br($procedimento->data);
				
				$action_links.= html::anchor('procedimentos/excluir/'.$procedimento->id, 
														'Excluir', 
														array('class' => 'delete',
																'title' => $excluir_title));

				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);

		}else{
			
			$texto = 'Não existem procedimentos cadastrados para este processo.';			
			echo html::message($texto, FALSE);
			
		}
		
	}

?>

