<?php defined('SYSPATH') or die('No direct script access.');
 
class objects_core {
	
	public function match_attributes($object, $attributes_array){
		
		$object_attributes = $object->table_columns;
				
		foreach($attributes_array as $k => $v){			
			if(array_key_exists($k, $object_attributes)){
				 $object->$k = $v;
			}			
		}
		
		return $object;
		
	}
	
	
	public function match_and_save_attributes($object, $attributes_array, $return_object = FALSE){
		
		$object = objects::match_attributes($object, $attributes_array);
		
		$object->save();
		
		if($return_object){
			return $object;
		}else{
			return $object->saved;
		}
		
	}
	
	
	
	public function get_controllers(){
		
				
		$pointer  = opendir(APPPATH.'/controllers');
	
		$itens = array();
	
		while ($name = readdir($pointer)) {
			
			$controller = substr($name, 0, -4);
			
			if($controller){
				$itens[] = 	ucfirst($controller.'_Controller');
			}
			
		    
		}
		
				
		return $itens;
		
	}
	
	
	public function get_controllers_with_methods(){
		
		$controllers = objects::get_controllers();
		
		
		
		$list = array();
		
		foreach($controllers as $controller){
			
			
			$methods = get_class_methods($controller);
			
			$methods_list = array();
			
			$controller = str_replace('_Controller', '', $controller);
			
						
			//remove os metodos privados
			foreach($methods as $method){
				
				if((substr($method, 0, 1) != '_') && ($method != 'index')){
					
					$methods_list[strtolower($controller).'/'.$method] = $method;
					
				}
				
			}
			
			$list[$controller] = $methods_list;
			
		}
		
		return $list;
		
	}
	
	
	
	
}