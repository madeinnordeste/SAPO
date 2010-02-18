<h1>Visão Geral</h1>
<h2>Processos</h2>
<div class="grid_12 alpha omega">	
	<img src="http://chart.apis.google.com/chart?cht=lc&chco=183579&chs=940x250&chd=t:100,10,250,5&chxt=x,y&chxl=0:|Oct|Nov|Dec|jan|1:||20K||60K||250K||5k">
</div>
<div class="clear"></div>
<h2>Advogados</h2>
<div class="grid_6 alpha omega">	
	<?php
		$values = array_keys($procedimentos);
		$values = implode(',', $values);					
		
		$labels = array_values($procedimentos);
		$labels = implode('|', $labels);
		
		$quadros = array_keys($procedimentos);
		$quadros = implode('|', $quadros);		
	
	?>
	<img src="http://chart.apis.google.com/chart?cht=p3&chtt=Advogados/Total Procedimentos&chco=183579&chs=460x200&chl=<?=$labels?>&chd=t:<?=$values?>&chdl=<?=$quadros?>">		
	
</div>
<div class="grid_6 omega">
	<?php
		$values = array_keys($proc_finalizados);
		$values = implode(',', $values);					
		
		$labels = array_values($proc_finalizados);
		$labels = implode('|', $labels);
		
		$quadros = array_keys($proc_finalizados);
		$quadros = implode('|', $quadros);
	
	?>
	<img src="http://chart.apis.google.com/chart?cht=p3&chtt=Advogados/Procedimentos Finalizados&chco=3B796C&chs=460x200&chl=<?=$labels?>&chd=t:<?=$values?>&chdl=<?=$quadros?>">		
	
</div>
<div class="clear"></div>