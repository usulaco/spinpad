<?php

class QformController extends Zend_Controller_Action
{

    public function init()
    {

    }
    public function indexAction()
    {
        
    }
    public function qformAction()
    {
       $auth = Zend_Auth::getInstance();
       if (!$auth->hasIdentity()) {
            $this->_redirect('qform/');
       } 
    }
    public function adminAction()
    {
        
    }


}

