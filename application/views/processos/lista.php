<h1>Lista de Processos<?=html::anchor('processos/formulario', '[ Adicionar Novo ]')?></h1>
<div class="grid_10 alpha">
	Número ou Cliente:<br>
	<?=form::input('termo', $termo, 'class="validate[required]"')?>
</div>
<div class="grid_2 omega">
	<br>
	<?=form::submit('btn_search', 'Pesquisar')?>
</div>
<script language="javascript">
	$(document).bind('ready', function(){
		$("#btn_search").click(function(){
			var destino = "<?=url::site('processos/lista/1')?>/"+$('#termo').val();
			window.location = destino;
		});
	});
</script>
<div class="clear"></div>
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
                                            '', 
                                            array('class' => 'view', 
                                                  'title' => 'Vizualizar Processo: '.$processo->numero));

				$title = 'Tem certeza que deseja excluir o processo: '.$processo->numero.'?';
				$action_links.= html::anchor('processos/excluir/'.$processo->id, '', array('class' => 'delete', 
                                                                                            'title' => $title));
				$col[] = $action_links;

				$lines[] = $col;
			}

			echo html::grid($headers, $lines, $footers, $caption);
			
			echo $paginacao;


		}else{
			
			$texto = 'Não existem processos registrados.';			
			echo html::message($texto, FALSE);
			
		}
		
	

?>

