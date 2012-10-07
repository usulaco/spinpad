<?php

class QformController extends Zend_Controller_Action {

    public function init() {
        /*
         * load QForm Login
         */
        $this->loginProc = new Application_Model_QFormLogin();
        $this->_helper->layout()->setLayout('qform');
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(TRUE);
        } else {
            $this->view->config = (object) $this->getInvokeArg('bootstrap')->getOptions()['qform'];
        }
    }

    public function loginsubmitAction() {
        $user = $this->loginProc->loginCheck($_REQUEST['username'],$_REQUEST['password']);
        if(count($user) > 0) {
           //$session = new Zend_Session_Namespace('qform_user');
           //$session->user = (object) $user[0];
           echo '{"success":true,"username":"'.$user[0]['username'].'"}';
        } else {
           //$session = new Zend_Session_Namespace('qform_user');
           //$session->user = (object) Array();
           echo '{"success":false, "msg":"{_LOGIN_OR_PASSWORD_ERROR}"}'; 
        }
    }

    public function indexAction() {
        
    }

    public function qformAction() {
        //ebug(new Zend_Session_Namespace('qform_user'));
    }

    public function adminAction() {
        
    }

}

