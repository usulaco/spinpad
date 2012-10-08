<?php
function ebug($object){
   $dp = "OBJECT: (".gettype($object).") ";
   switch(true){
    case is_object($object):
       $dp .= "\n Class \n Variable: ";
       foreach(get_class_methods($object) as $m){
          $dp .= "\n Method: ".$m;
       }      
       foreach(get_object_vars($object) as $v){
          $dp .= "\n Variables: ".$v;
       }
    break;
    case is_array($object):
       $dp .= "\n Array: \n";
       $dp .= print_r($object,true);
    break;
    default:
       $dp .= "\n Variable: \n";
       $dp .= print_r($object,true);
    break;
   } 
   
   echo  nl2br($dp) ;
}
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   function __init(){
   
   }

}

