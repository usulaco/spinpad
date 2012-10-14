<?php

class Application_Model_QFormInterface extends Application_Model_QformDB {
    
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->qf_menu = new Application_Model_QFormComMenu();
    }
    public function getMenu($menu_id){
      return  $this->qf_menu->menu($menu_id);
    }
    
}
?>
