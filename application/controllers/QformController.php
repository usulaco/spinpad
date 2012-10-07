<?php

class QformController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout()->setLayout('qform');
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(TRUE);
        } else {
            $this->view->config = (object) $this->getInvokeArg('bootstrap')->getOptions()['qform'];
        }
    }

    public function loginsubmitAction() {
        
        echo '{"success":true}';
    }

    public function indexAction() {
        
    }

    public function qformAction() {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect('qform/');
        }
    }

    public function adminAction() {
        
    }

}

