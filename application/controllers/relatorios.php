<?php defined('SYSPATH') OR die('No direct access allowed.');

class Relatorios_Controller extends Template_Controller {
 
 	public $template = 'template';
 
 	public $auto_render = TRUE; 
 
 	public function __construct()
	{
		parent::__construct(); 
		
		$this->session = Session::instance();
		
	}
 
 	public function index()
	{
		
		$txt = '<h1>Relatórios - Em desenvolvimento</h1>';
		// Get the methods that are only in this class and not the parent class.
		$examples = array_diff
		(
			get_class_methods(__CLASS__),
			get_class_methods(get_parent_class($this))
		);
		sort($examples);
		$txt.=  "<strong>Examples:</strong>\n";
		$txt.= "<ul>\n";
		foreach ($examples as $method)
		{
			if ($method == __FUNCTION__)
				continue;
			$txt.='<li>'.html::anchor('relatorios/'.$method, $method)."</li>\n";
		}
		$txt.="</ul>\n";
		$this->template->content =	$txt;	
		
	}
	
	public function processos($procedimento_id = FALSE, $status = FALSE, $dias = FALSE, $pagina = 1){
		
		
		$tipo_procedimentos = ORM::Factory('grupo_procedimento')->select_list_with_childrens();
		$tipo_procedimentos[0] = 'Independente';
		
		
		//se algum filtro for setado	
		$processos = FALSE;	
		$total = 0;
		
		if(($procedimento_id) or ($status) or ($dias)){
			
			$where = array();
			
			if($procedimento_id){
				//$where['tipo_procedimento_id'] = $procedimento_id;
				$where[] = 'tipo_procedimento_id='.$procedimento_id;
			}
			
			if($status != 'independente'){
				//$where['status'] = $status;
				$where[] = 'status='.$status;
			}
			
			//$where['(to_days(curdate()) - to_days(data)) >'] = $dias;
			$where[] = '(to_days(curdate()) - to_days(data)) >='.$dias;
			
			$where = implode($where, ' AND ');
			
			
			$db = Database::instance();
		
			
			//ids dos processos
			$sql = 'SELECT processo_id FROM procedimentos ';
			$sql.='WHERE '.$where.' ';
			$sql.='GROUP BY processo_id ';
			$sql.='ORDER BY data DESC, hora ASC ';
			
			$result = $db->query($sql);

			$total = $result->count();
			
				//paginacao
				$conf =  Kohana::config('pagination.default');
				$limit = ($pagina - 1 ) * $conf['items_per_page'];
				
				$sql.='LIMIT '.$limit.', '.$conf['items_per_page'];
				
			$result = $db->query($sql);	
			
			$ids = array();
			foreach ($result as $r) {
				$ids[] = $r->processo_id;
			}
			
			
			//processos
			if($total){
				$processos = ORM::Factory('processo')->in('id', $ids)->find_all();
			}
			
		}
		
		$paginacao = new Pagination(array(
		        'base_url'    => 'relatorios/processos/'.$procedimento_id.'/'.$status.'/'.$dias, 
		        'uri_segment' => 6, 
		        'total_items' => $total 
		    ));
		
		
		
		$view = View::Factory('relatorios/processos');
		$view->set('tipo_procedimentos', $tipo_procedimentos);
		$view->set('procedimento_id', $procedimento_id);
		$view->set('status', $status);
		$view->set('dias', $dias);
		$view->set('processos', $processos);
		$view->set('total', $total);
		$view->set('paginacao', $paginacao);
		
		
		$this->template->content =	$view;	
		
	}
	
}