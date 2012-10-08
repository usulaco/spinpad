<?php

class Application_Model_QformDB extends Zend_Db_Table
{
   function __construct($config = array(), $definition = null) {
       parent::__construct($config, $definition);   
       
   }
   function query($query){
       return $this->_db->fetchAll($query);
   }


}

