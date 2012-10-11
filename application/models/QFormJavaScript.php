<?php

class Application_Model_QFormJavaScript extends Application_Model_QformDB {

    private function compress($buffer) {
        /* remove comments */
        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace(array("\r\n", "\r", "\t", "\n", '  ', '    ', '     '), '', $buffer);
        /* remove other spaces before/after ) */
        $buffer = preg_replace(array('(( )+\))', '(\)( )+)'), ')', $buffer);
        return $buffer;
    }

    public function getScript($name,$tags=true) {
        $js_file = "../application/javascript/$name.js";
        if (!file_exists($js_file))
            throw new Zend_Controller_Action_Exception('This page does not exist', 404);
        else {
            $data = file_get_contents($js_file);
            $data = $this->compress($data);
            return ($tags ? '<script>' : '') . $data . ($tags ? '</script>' : '');
        }
    }

}

?>
