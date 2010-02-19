<?php defined('SYSPATH') or die('No direct script access.');
 
class date extends html_Core {

    
    public static function us2br($date, $separator = "/"){

        if($date){        
            $p = explode('-', $date);    
            $return =  $p[2].$separator.$p[1].$separator.$p[0];
        }else{        
            $return = '-';            
        }
        return $return;
    }
	
	
	/*
	* Return infos for week
	* original post: http://www.phpbuilder.com/board/showthread.php?threadid=10358537
	*/
	public static function week($year=FALSE, $week=FALSE){

		if(!$year){
			$year = date('Y');			
		}
		
		if(!$week){
			$week = date('W');			
		}
		
	
		$from = date("Y-m-d", strtotime("{$year}-W{$week}+1")); 
		$to = date("Y-m-d", strtotime("{$year}-W{$week}-6")); 
		
		$result['year'] = $year;
		$result['week'] = $week;		
		$result['from'] = $from;
		$result['to'] = $to;
		
		return $result;
				
	}
	
	public function week_days($year=FALSE, $week=FALSE){
		
		$w = date::week($year, $week);	
		
		$list = array();		
		for($day=0; $day<=6; $day++)
		{
		   $list[] = date('Y-m-d', strtotime($w['year']."W".$w['week'].$day));
			
		}
		
		return $list;
		
	}

}
