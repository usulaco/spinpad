<?php
 session_start();
 $_SESSION['numbers'] .= $_REQUEST['button'];
 
 if(empty($_SESSION['sets'])) 
    $_SESSION['sets'] = Array('7661','1975','1983');
 
 if(empty($_SESSION['clips'])) 
    $_SESSION['clips'] = Array(0,0,0);
 
 foreach($_SESSION['sets'] as $key => $value){
     if(strpos($_SESSION['numbers'],$value) > -1){
       $_SESSION['clips'][$key] = 1;  
     }
 }
 if(strlen($_SESSION['numbers']) > 30) {
     $_SESSION['clips'] = Array(0,0,0);
     session_destroy();
 }
     
 echo json_encode(array_merge($_SESSION['clips'],Array($_SESSION['numbers'])));
?>
