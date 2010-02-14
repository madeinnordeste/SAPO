<h1>Formulário de Usuário</h1>
<?=form::open('usuarios/salvar', array('id' => 'form_usuario'), array('id' => $usuario->id))?>
<div class="grid_4 alpha">
	Nome:<br>
	<?=form::input('nome', $usuario->nome, 'class="validate[required]"')?>
</div>
<div class="grid_4">
	E-mail:<br>
	<?=form::input('email', $usuario->email, 'class="validate[required]"')?>
</div>
<div class="grid_4 omega">
	Grupo de Acesso:<br>
	<?=form::dropdown('grupo_acesso_id', $grupos, $usuario->grupo_acesso_id)?>
</div>
<div class="clear"></div>

<?php
	//verifica se a senha e obrigatoria
	if($usuario->id){
		$modo = 'optional';
	}else{
		$modo = 'required';
	}

?>
<div class="grid_6 alpha">
	Senha:<br>
	<?=form::password('senha', '', 'class="validate['.$modo.',confirm[confirm_senha]]"')?>
</div>
<div class="grid_6 omega">
	Confirmação de Senha:<br>	
	<?=form::password('confirm_senha', '', 'class="validate['.$modo.',confirm[senha]]"')?>	
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
		$("#form_usuario").validationEngine({
				success :  false,
				failure : function() {}
		});				
	});	
</script>
<div class="clear"></div>