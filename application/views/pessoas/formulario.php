<h1>Formulário de Pessoa</h1>
<?=form::open('pessoas/salvar', array('id' => 'form_pessoa'), array('id' => $pessoa->id))?>
<div class="grid_12 alpha omega">
	Nome:<br>
	<?=form::input('nome', $pessoa->nome, 'class="validate[required]"')?>
</div>
<div class="clear"></div>
<div class="grid_6 alpha">
	Data de Nascimento:<br>
	<?=form::input('data_nascimento', $pessoa->data_nascimento, 'class="w16em dateformat-Y-ds-m-ds-d"')?>
</div>
<div class="grid_6 omega">
	Telefones:<br>
	<?=form::input('telefones', $pessoa->telefones)?>
</div>
<div class="clear"></div>
<div class="grid_11 alpha">
	&nbsp;
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<div class="clear"></div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_pessoa").validationEngine({
				success :  false,
				failure : function() {}
		});		
		$("#data_nascimento").keypress(function() {
		  return false;
		});
		$('#data_nascimento').css('width', '95%');	
		$('#data_nascimento').click(function(){
			$('#fd-but-data_nascimento').trigger('click');			
		});
	});
</script>
<div class="clear"></div>