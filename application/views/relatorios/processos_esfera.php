<h1>Relatório de Processos</h1>
<div class="grid_12 alpha omega">
	<?php
		
		
		$totais =  array_values($processos);
		
		$labels = array_keys($processos);
		
		
		function add_pct(&$item1, $key, $total)
		{
		    //$item1 = "@ $total: @ $item1 $key";
		    $pct = round((100 * $item1) / $total);
			$item1 = "$key -  $pct %";
		}
		
		array_walk($processos, 'add_pct', $total_processos);
		
		$diagramas = array_values($processos);
		
		$v = implode($totais, ',');
		
		$t = implode($labels, '|');
		
		$d = implode($diagramas, '|');
		
		
		$img = 'http://chart.apis.google.com/chart?cht=p3&chco=183579&chdl='.$d.'&chd=t:'.$v.'&chs=940x250&chl='.$t;

		echo html::image($img);
	
	?>	
	
</div>