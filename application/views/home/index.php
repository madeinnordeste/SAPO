<h1>Visão Geral / Semana</h1>
<div id="dashboard_calendar">
	<?php
		
		$dias = array(1=>'DOM',2=>'SEGUNDA', 3=>'TERÇA', 4=>'QUARTA', 5=>'QUINTA', 6=>'SEXTA', 7=>'SAB');
		
		$c = 1;
		
		//monta o dia
		foreach ($procedimentos as $key => $value) {
			
			if($c == 1){
				$class = 'grid_1 alpha';
			}elseif($c == 7){
				$class = 'grid_1 omega';
			}else{
				$class = 'grid_2';
			}
			
			
			echo '<div class="'.$class.'">';
				echo '<div class="title">'.$dias[$c].'<br><span>'.date::us2br($key).'</span></div>';
				
				//lista os procedimentos do dia
				foreach($value as $procedimento){
					
					$proc_class = $procedimento->status ? 'aberto' : 'realizado';
					
					echo '<div class="procedimento '.$proc_class.'">';
						
						$texto = $procedimento->processo->numero;
						$texto.='<br>';
						$texto.= $procedimento->advogado->nome ? $procedimento->advogado->nome : '---';
						$texto.='<br>';
						$texto.= $procedimento->tipo_procedimento->nome;
						$texto.='<br>';
						$texto.= $procedimento->hora ? $procedimento->hora : '---';
						
						echo html::anchor('processos/formulario/'.$procedimento->processo_id, $texto);
						
					echo '</div>';
					
				}
				
			echo '</div>';
			
			$c++;
		}
	
	?>
</div>
<div class="clear"></div>
<script language="javascript">
	$(document).bind('ready', function(){
		var max = 0;
		$('#dashboard_calendar>div').each(function(){
			
			if($(this).height() > max ){
				max = $(this).height();
			}
			
		});
		
		$('#dashboard_calendar').height(max);
		
	});
</script>


<div class="grid_6 alpha">
	<h2>Números globais</h2>
	<div class="infobox">
		<b>Advogados:</b> <?=ORM::Factory('advogado')->count_all()?>
	</div>
	<div class="infobox">
		<b>Esferas:</b> <?=ORM::Factory('esfera')->count_all()?>
	</div>
	<div class="infobox">
		<b>Processos:</b>	<?=ORM::Factory('processo')->count_all()?>	
	</div>
	<div class="infobox">
		<b>Pessoas:</b> <?=ORM::Factory('pessoa')->count_all()?>
	</div>	
</div>
<div class="grid_6 omega">
	<h2>Notícias STJ</h2>
	<?php
		
		$num = 4;
		
		$feed = feed::parse('http://www.stj.gov.br/portal_stj/rss/index.wsp');
		
		//echo Kohana::debug($feed);
		
		$feed = array_slice($feed, 0, $num);
		
		foreach($feed as $news){			
		
			echo '<p>';			
				$text = '<b>'.$news['title'].'</b><br>'.$news['description'];
				echo html::anchor($news['link'], $text, array('target' => '_blank'));			
			echo '</p>';
			
		}
	
	?>
</div>
<div class="clear"></div>

