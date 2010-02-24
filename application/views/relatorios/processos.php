<h1>Relatório de Processos</h1>
<?php

	echo form::open('relatorios/processos',
						array('id' => 'form_rel_processos'));

?>
<div class="grid_6 alpha">
	Tipo de Procedimento:<br>
	<?=form::dropdown('tipo_procedimento_id', $tipo_procedimentos, $procedimento_id)?>
</div>
<div class="grid_3">
	Status do Procedimento:<br>
	<?=form::dropdown('status', array(0 => 'Em aberto', 1 => 'Realizado', 'independente' => 'Independente'), $status)?>
</div>
<div class="grid_2">
	Qtd. Min. Dias:<br>
	<?=form::input('dias', $dias, 'class="validate[required, custom[onlyNumber]]"')?>
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_submit', 'OK')?>
</div>
<div class="clear"></div>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_rel_processos").validationEngine({
				success :  false,
				failure : function() {	}
		});	
		
		$("#form_rel_processos").submit(function(){
			
			var a = "<?=Kohana::config('config.site_domain')?>relatorios/processos";
			var p = $('#tipo_procedimento_id').val();
			var s = $('#status').val();
			var d = $('#dias').val();			
			a = a+'/'+p+'/'+s+'/'+d;			
			$(this).attr('action', a);
			
			return true;
			
		});	
	});
</script>
<?php
	
	if($total){
		
		$caption = $total.' Processo(s) encontrado(s)';
		$headers = array('Número', 'Orgão', 'Cliente', 'P. Oposta', 'Proceds.', 'Últ. Pcd. Realizado', 'Gaveta', 'Ações');
			$headers['sizes'] = array(100);
		$footers = FALSE;


		$lines = array();
		foreach($processos as $processo){
			$col = array();			
			$col[] = html::anchor('processos/formulario/'.$processo->id, $processo->numero, 
										array('title' => 'Ver processo: '.$processo->numero));

             $orgao = text::limit_words($processo->orgao->nome, 5, '...');
                 $attr = array('title' => 'Ver iformações de: '.$processo->orgao->nome,
                                 'class' => '');
             $orgao = html::anchor('orgaos/formulario/'.$processo->orgao->id, $orgao, $attr);
			$col[] = $orgao;

             $cliente = text::limit_words($processo->cliente->nome, 3, '...');
                 $attr = array('title' => 'Ver iformações de: '.$processo->cliente->nome,
                                 'class' => '');
             $cliente = html::anchor('pessoas/formulario/'.$processo->cliente->id, $cliente, $attr);
             $col[] = $cliente;

             $p_oposta = text::limit_words($processo->parte_oposta->nome, 3, '...');
                 $attr = array('title' => 'Ver informações de: '.$processo->parte_oposta->nome,
                                 'class' => '');
             $p_oposta = html::anchor('pessoas/formulario/'.$processo->parte_oposta->id, $p_oposta, $attr);
             $col[] = $p_oposta;

             $col[] = $processo->procedimentos->count();
             $col[] = date::us2br($processo->ultimo_procedimento_realizado()->data);

				$armario = html::anchor('#', $processo->gaveta->nome, 
									array('title' => $processo->gaveta->armario->nome.' >'.$processo->gaveta->nome,
									'class' => 'false'));

             $col[] = $armario;

			$action_links = html::anchor('processos/formulario/'.$processo->id, 
                                         'Ver', 
                                         array('class' => 'view', 
                                               'title' => 'Vizualizar Processo: '.$processo->numero));

			
			$col[] = $action_links;

			$lines[] = $col;
		}

		echo html::grid($headers, $lines, $footers, $caption);
		
		echo $paginacao;


	}else{
		
		$texto = 'Não existem processos com esses parametros.';			
		echo html::message($texto, FALSE);
		
		
		
	}
?>

