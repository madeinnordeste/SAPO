<?php defined('SYSPATH') or die('No direct script access.');
 
class html extends html_Core {
 	


	/*
 	  	Example of use

		$caption = $armarios->count().' Armários encontrados';
		$headers = array('Nome', 'Gavetas', 'Ações');
			$headers['sizes'] = array(450, FALSE,50);
		$footers = FALSE;
		
		$lines = array();
		foreach($armarios as $armario){
			$col = array();
			
			$col[] = $armario->nome;
			$col[] = $armario->gavetas->count();
			
			$action_links = html::anchor('armarios/formulario/'.$armario->id, 'Editar', array('class' => 'editar'));
			$action_links.= html::anchor('armarios/excluir/'.$armario->id, 'Excluir', array('class' => 'excluir'));
			$col[] = $action_links;
			
			$lines[] = $col;
		}
			
		
		echo html::grid($headers, $lines, $footers, $caption); 	 
 	 */
	public static function grid($headers, $lines, $footers = FALSE, $caption = FALSE)
	{
		$html_code = "<table class='Grid'>\n";
		
		//caption
		if($caption){
			
			$html_code.="<caption>".$caption."</caption>\n";
			
		}
		
		
		//header sizes
		$sizes = array();
		if(isset($headers['sizes'])){
			$sizes = $headers['sizes'];
			unset($headers['sizes']);			
			$sizes = array_reverse($sizes);						
		}
		
		//header code
		$html_code.="<thead>\n";
		$html_code.="<tr>\n";			
			foreach($headers as $header){
				
				//verifica se existem tamanhos
				$width = array_pop($sizes);
				$aditional = '';
				if($width){
					$aditional =  ' width="'.$width.'"';
				}
				
				$html_code.="<th".$aditional.">";
					$html_code.= $header;
				$html_code.="</th>\n";		
			}		
			$html_code.="</tr>\n";
		$html_code.="</thead>\n";
		
		//footer	
		if($footers){	
			$html_code.="<tfoot>\n";
				$html_code.="<tr>\n";
					foreach($footers as $footer){
						$html_code.="<td>";
							$html_code.= $footer;
						$html_code.="</td>\n";
					}
				$html_code.="</tr>\n";
			$html_code.="</tfoot>\n";
		}
		
		
		//body
		$html_code.="<tbody>\n";
			foreach($lines as $line){
				$html_code.="<tr>\n";
					foreach($line as $col){
						$html_code.="<td>";
							$html_code.= $col;
						$html_code.="</td>";
					}
				$html_code.="</tr>\n";
			}		
		$html_code.="</tbody>\n";
		
		$html_code.="</table>\n";
		
		//confirm link
		$html_code.="<script language='javascript'>\n";		
			$html_code.="$(document).bind('ready', function(){\n";				
				$html_code.="$('table.grid a.delete').click(function(){\n";
					$html_code.="var t = $(this).attr('title');\n";
					$html_code.="return confirm(t);\n";
				$html_code.="});\n";	
                $html_code.="$('table.grid a.false').click(function(){\n";					
					$html_code.="return false;\n";
				$html_code.="});\n";			
			$html_code.="});\n";		
		$html_code.="</script>\n";
		
		return $html_code;
	
		
	}
	
	
	
	public function message($text, $title = FALSE, $type = 'info'){
		
		$html_code = "<div class='message ".$type."'>\n";
			if($title){
				$html_code.="<h1>".$title."</h1>\n";			
			}			
			$html_code.=$text;
		$html_code.="</div>\n";

		return $html_code;
	}
	
	
	public function flash_message($text, $type = 'info'){
		
		$html_code = "<div id='flash_message' class='message ".$type."'>\n";						
			$html_code.=$text;
		$html_code.="</div>\n";
		
		$html_code.="<script language='javascript'>\n";		
			$html_code.="$('#flash_message').oneTime('4s', function() {\n";				
					$html_code.="$(this).slideUp('slow');\n";
			$html_code.="});\n";		
		$html_code.="</script>\n";
		
		
		/*
		$this->session = Session::instance();
		$this->session->set_flash('user_message', $html_code);
		*/
		Session::instance()->set_flash('user_message', $html_code);
		
		
	}
	
 
}
?>
