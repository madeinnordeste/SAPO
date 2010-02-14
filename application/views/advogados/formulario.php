<h1>Formulário de Advogado</h1>
<?=form::open('advogados/salvar', array('id' => 'form_advogado'), array('id' => $advogado->id))?>
<div class="grid_11 alpha">
	Nome:<br>
	<?=form::input('nome', $advogado->nome, 'class="validate[required]"')?>
</div>
<div class="grid_1 omega">
	<br>
	<?=form::submit('btn_save', 'Gravar')?>
</div>
<?=form::close()?>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#form_advogado").validationEngine({
				success :  false,
				failure : function() {}
		});		
	});
</script>
<div class="clear"></div>
<div class="clear"></div>
<?php
	
	
	//procedimentos do advogado
	if($advogado->id){
		echo '<h2>Procedimentos em aberto para este Advogado</h2>';
		
		
		if($advogado->procedimentos_aberto()->count()){
			

			$caption = $advogado->procedimentos_aberto()->count().' Procedimento(s) encontrado(s)';
			$headers = array('Data', 'Hora', 'Orgão', 'Tipo', 'Procedimento', 'Processo', 'Observações');
				$headers['sizes'] = array(80,50, FALSE, 150, 100, 150);
			$footers = FALSE;

			$lines = array();
			
			foreach($advogado->procedimentos_aberto() as $procedimento){
				$col = array();			
				$col[] = date::us2br($procedimento->data);
				$col[] = $procedimento->hora;
				
				$orgao = html::anchor('orgaos/formulario/'.$procedimento->processo->orgao->id, 
												$procedimento->processo->orgao->nome,
												array('title' => 'Ver informações de: '.$procedimento->processo->orgao->nome));
				$col[] = $orgao;
				$col[] = $procedimento->tipo_procedimento->nome;
				$col[] = $procedimento->tipo_procedimento->grupo_procedimento->nome;
				
				$processo = html::anchor('processos/formulario/'.$procedimento->processo->id,
												$procedimento->processo->numero,
												array('title' => 'Ver informações do processo: '.$procedimento->processo->numero));
				$col[] = $processo;					
				
				$col[] = html::anchor('#', 
											text::limit_words($procedimento->observacoes, 4, '...'), 
											array('title' => $procedimento->observacoes, 'class' => 'false'));
				

				/*
				$action_links = html::anchor('procedimentos/formulario/'.$procedimento->id.'/'.$procedimento->processo->id, 'Ver', array('class' => 'view'));
				
				
				
				$excluir_title = 'Tem certeza que deseja excluir o procedimento: ';
				$excluir_title.= $procedimento->tipo_procedimento->nome;
				$excluir_title.= ' em '.date::us2br($procedimento->data);
				
				$action_links.= html::anchor('procedimentos/excluir/'.$procedimento->id, 
														'Excluir', 
														array('class' => 'delete',
																'title' => $excluir_title));

				$col[] = $action_links;
				*/

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);
			

		}else{
			
			$texto = 'Não existem procedimentos em abertos cadastrados para este processo.';			
			echo html::message($texto, FALSE);
			
		}
		
		
	}

?>