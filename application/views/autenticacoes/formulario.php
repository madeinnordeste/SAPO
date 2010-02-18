<html>
<head>
<title><?=Kohana::config('application.name')?></title>
<?php
	echo html::stylesheet(array
	(
		'static/css/autenticacoes',
		'static/plugins/formValidator/css/validationEngine.jquery',

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
			'static/plugins/jquery-timer/jquery.timers'
		), FALSE);
		
		?>
	</head>
	<body>
		<?php
			//flash message
			if(isset($_SESSION['user_message'])){					
				
				echo $_SESSION['user_message'];
				
			}
		
		?>
		<?=form::open('autenticacoes/login', array('id' => 'form_autenticacao'))?>
		<div id="formulario">
			<div id="header">
				<?=html::image('static/images/logo.png')?>
			</div>
			<div>
				E-mail:<br>
				<?=form::input('email')?>
			</div>
			<div>
				Senha:<br>
				<?=form::password('senha')?>
			</div>
			<div>
				<?=form::submit('btn_submit', 'Enviar')?>
			</div>			
		</div>	
		</form>	
	</body>
</html>