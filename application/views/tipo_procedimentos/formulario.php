<h1>Formulário de Tipos de procedimentos</h1>
<?=form::open('tipo_procedimentos/salvar', array('id' => 'form_tipo_procedimento'), array('id' => $tipo->id))?>
<div class="grid_5 alpha">
	Nome:<br>
	<?=form::input('nome', $tipo->nome, 'class="validate[required]"')?>
</div>
<div class="grid_5 alpha">
	Grupo de procedimentos:<br>
	<?=form::dropdown('grupo_procedimento_id', $grupo->select_list('id', 'nome'), $tipo->grupo_procedimento_id)?>
</div>

<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_tipo_procedimento").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
