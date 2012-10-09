<?php

class Zend_View_Filter_Lang
{
    public function filter($string)
    {
          $session = new Zend_Session_Namespace('lang');
          if(is_null($session->lang_tab)) {
            $session->lang_tab = file_get_contents('../application/lang/lang.en');
            $session->lang_tab = explode("\n",$session->lang_tab);
 	    $session->lang_arr = Array();
            foreach($session->lang_tab as $key => $value){
	     @$session->lang_arr[current(explode(':',$value))] = trim(end(explode(':',$value))); 
	    }           
          }
          preg_match_all('/' . preg_quote('{_', '/') . '(.*?)'. preg_quote('}', '/').'/i', $string, $m);

          foreach($m[1] as $key => $value){ 
	      $string = str_replace('{_'.$value.'}',(isset($session->lang_arr['{_'.$value.'}']) ? $session->lang_arr['{_'.$value.'}'] : '{_'.$value.'}' ) ,$string);
	  } 
          return $string;
    }
}


?>
