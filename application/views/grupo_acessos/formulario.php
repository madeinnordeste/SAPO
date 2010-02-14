<h1>Formulário de Grupo de Acessos</h1>
<?=form::open('grupo_acessos/salvar', array('id' => 'form_grupo_acesso'), array('id' => $grupo->id))?>
<div class="grid_12 alpha omega">
	Nome:<br>
	<?=form::input('nome', $grupo->nome, 'class="validate[required]"')?>
</div>
<div class="clear"></div>
<div class="grid_12 alpha omega">
	Permissões disponíveis:<br>
	<?php
	
		$atributos = array('id' => 'acessos[]', 
								'name' => 'acessos[]', 
								'multiple' => 'multiple',
								'size' => 10 );
		
		echo form::dropdown($atributos, $metodos, $grupo->acessos->select_list('id', 'metodo'));
	
	?>
</div>
<div class="clear"></div>
<div class="grid_11 alpha">
	<a href="#" id="marcar_todos">[ Maracar Todos ]</a> 
	<a href="#" id="desmarcar_todos">[ Desmarcar Todos ]</a> 
	<a href="#" id="inverter_marcacao">[ Inverter Marcação ]</a> 
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
		
		$('a#marcar_todos').click(function(){
			$('select[multiple=multiple] option').each(function(){
				$(this).attr('selected', 'selected');
			});			
			return false;
		});
		
		$('a#desmarcar_todos').click(function(){
			$('select[multiple=multiple] option').each(function(){
				$(this).removeAttr('selected');
			});			
			return false;
		});
		
		$('a#inverter_marcacao').click(function(){
			$('select[multiple=multiple] option').each(function(){
				var s = $(this).attr('selected');			
				if(s){
					$(this).removeAttr('selected');
				}else{
					$(this).attr('selected', 'selected');
				}
			});			
			return false;
		});
		
						
	});
</script>
<div class="clear"></div>