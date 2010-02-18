<html>
<head>
<title><?=Kohana::config('application.name')?></title>
<?php
	echo html::stylesheet(array
	(
		'static/css/960-grid-system/code/css/reset',
		'static/css/960-grid-system/code/css/text',
		'static/css/960-grid-system/code/css/960',
		'static/css/global',
		'static/plugins/formValidator/css/validationEngine.jquery',
		'static/plugins/date-picker-v4/css/datepicker'
	),
		array
		(
			'screen',
			'screen',
			'screen',
			'screen',			
			'screen',		
			'screen'
		), 
	FALSE);
			
	
	echo html::script(array
		(
			'static/js/jquery-1.4.1',
			'static/plugins/formValidator/js/jquery.validationEngine-pt_BR.js',
			'static/plugins/formValidator/js/jquery.validationEngine.js',
			'static/plugins/maskedinput/jquery.maskedinput-1.2.2',
			'static/plugins/date-picker-v4/language/pt_BR',
			'static/plugins/date-picker-v4/js/datepicker',
			'static/plugins/jquery-timer/jquery.timers'
		), FALSE);
		
		?>
	</head>
	<body>
		<div class="container_12">		
			<div id="header" class="grid_12">
				<div id="logo" class="grid_6 alpha">
					<?=html::image('static/images/logo.png')?>
				</div>		
				<div id="header_options" class="grid_6 omega">
					<div class="box">
						<?php
						
							echo html::image('static/images/user.png');
						
							$usuario = Session::instance()->get('usuario');
							echo 'Bem vindo <b>'.$usuario->nome.'</b><br>';
							echo html::anchor('usuarios/meu_cadastro', '[ Meu cadastro ]');
							echo '  ';
							echo html::anchor('autenticacoes/logoff', '[ Sair ]');					
						?>
					</div>
				</div>
			</div>
			<div class="clear">&nbsp;</div>
			
			<div id="menu" class="grid_12">		
				<ul>
					<li><?=html::anchor('home', 'ínicio')?></li>
					<li><?=html::anchor('armarios', 'Armarios')?></li>
					<li><?=html::anchor('esferas', 'Esferas')?></li>
					<li><?=html::anchor('pessoas', 'Pessoas')?></li>
					<li><?=html::anchor('advogados', 'Advogados')?></li>
					<li><?=html::anchor('grupo_procedimentos', 'Grupos de Procedimentos')?></li>
					<li><?=html::anchor('processos', 'Processos')?></li>
					<li><?=html::anchor('relatorios', 'Relatórios')?></li>
					<li><?=html::anchor('grupo_acessos', 'Grupos de Acessos')?></li>	
					<li><?=html::anchor('usuarios', 'Usuários')?></li>				
				</ul>
			</div>
			<div class="clear">&nbsp;</div>
			
			<?php
				//flash message
				if(isset($_SESSION['user_message'])){					
					
					echo $_SESSION['user_message'];
					
				}
			
			?>
			
			
			
			<div id="content" class="grid_12">
				<?=$content?>		
			</div>
			<div class="clear">&nbsp;</div>			
			<div id="footer" class="grid_12">
				<?=Kohana::config('application.name')?>			
			</div>
		</div>		
	</body>
</html>

