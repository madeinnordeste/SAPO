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

}
