<?php

namespace app\components;

class Uservaludate{
    
      public function validateInput($arr){
        
        $arr = str_replace("'", "", $arr);
        
        $arr = str_replace("<", "", $arr);

        $arr = str_replace(">", "", $arr);
        
        return $arr;
    }
    
}