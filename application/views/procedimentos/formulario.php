<h1>Informações do Processo</h1>
<div class="grid_4 alpha">
	<b>Número:</b><br>
	<?=$processo->numero?>
</div>
<div class="grid_4">
	<b>Cliente:</b><br>
	<?=$processo->cliente->nome?>
</div>
<div class="grid_4 omega">
	<b>Parte Oposta:</b><br>
	<?=$processo->parte_oposta->nome?>
</div>
<div class="clear"></div>
<div class="grid_4 alpha">
	<b>Orgão:</b><br>
	<?=$processo->orgao->nome?>
</div>
<div class="grid_4">
	<b>Gaveta:</b><br>
	<?=$processo->gaveta->armario->nome.' > '.$processo->gaveta->nome?>
</div>
<div class="grid_4 omega">
	<b>Arquivado:</b><br>
	<?php if($processo->arquivado){ echo 'Sim'; }else{ echo 'Não'; }?>
</div>
<div class="clear"></div>

<h2>Formulário de Procedimento</h2>
<?=form::open('procedimentos/salvar', array('id' => 'form_procedimento'), array('id' => $procedimento->id, 'processo_id' => $processo->id))?>
<div class="grid_4 alpha">
	Data:<br>
	<?=form::input('data', $procedimento->data, 'class="validate[required] w16em dateformat-Y-ds-m-ds-d"')?>
</div>
<div class="grid_4">
	Hora:<br>
	<?=form::input('hora', $procedimento->hora)?>
</div>
<div class="grid_4 omega">
	Realizado:<br>
	<?=form::dropdown('status', array(0 => 'Não', 1 => 'Sim'), $procedimento->status)?>
</div>
<div class="clear"></div>

<div class="grid_6 alpha">
	Advogado:<br>
	<?=form::dropdown('advogado_id', $advogados, $procedimento->advogado_id)?>
</div>
<div class="grid_6 omega">
	Tipo de procedimento:<br>
	<?=form::dropdown('tipo_procedimento_id', $tipo_procedimentos, $procedimento->tipo_procedimento_id)?>
</div>
<div class="clear"></div>
<div class="grid_12 omega alpha">
	Observações:<br>
	<?=form::textarea(array('id' => 'observacoes', 'name' => 'observacoes', 'rows' => '5'), $procedimento->observacoes)?>
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
		
		$("#hora").mask("99:99");			
		$("#data").keypress(function() {
		  return false;
		});
		$('#data').css('width', '90%');	
		$('#data').click(function(){
			$('#fd-but-data').trigger('click');			
		});	
				
	});
</script>
<div class="clear"></div>