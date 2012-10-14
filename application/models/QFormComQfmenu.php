<?php

class Application_Model_QFormComQfmenu extends Application_Model_QFormMain{
    
    public function menu($menu_id = 0){

        $menu_query = "
                        SELECT 
                          CONCAT('menu.',m.`menu_id`) as id,
                          m.`menu_text` as  `text`,
                          m.`menu_expanded` as `expanded`,
                          IF((SELECT count(*) FROM menu where menu_parent_id = m.`menu_id`) > 0,'false','true') as `leaf`,
                          m.`menu_iconCls` as `iconCls`,
                          m.`menu_tab_xtype` as `tab_xtype`
                        FROM 
                          menu m
                        WHERE 
                          CONCAT('menu.',m.menu_parent_id) = '$menu_id'
                      ";
        $menu_results = $this->_db->query($menu_query)->fetchAll();
        
                
        return strtr(json_encode($menu_results),Array(':"true"'=>':true',':"false"'=>':false'));
    }
    
}
?>