<?php

class QformController extends Zend_Controller_Action {
    public function lang($string,$ident='en'){
        return $string;
    } 
    public function init() {
        /*
         *  init QFormDB
         */
        $this->QFormDB = new Application_Model_QformDB();
        /*
         *  if not login redirect to login page 
         */
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            if (!in_array($this->_request->getRequestUri(), Array('/qform/login', '/qform/loginSubmit')))
                $this->_redirect('/qform/login');
        }
        /*
         * 
         */
        $this->QFormLogin = new Application_Model_QFormLogin();
        $this->_helper->layout()->setLayout('qform');
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(TRUE);
        } else {
            //echo ($this->_request->getRequestUri());
            $this->view->config = (object) $this->getInvokeArg('bootstrap')->getOptions()['qform'];
        }
    }

    /*
     * main layout creator
     */

    public function indexAction() {
        echo '<a href="/qform/logout">'.$this->lang('{_LOGOUT}').'</a>'; 
    }

    /*
     *  ajax action dispacher
     */

    public function qformAction() {
        
    }

    /*
     * login page creator
     */

    public function loginAction() {
        
    }

    /*
     * admin function dispacher
     */

    public function adminAction() {
        
    }

    /*
     * Ajax Login Action
     */

    public function loginsubmitAction() {
        echo $this->QFormLogin->login($this->_request->getPost('username'), $this->_request->getPost('password'));
    }

    /*
     * Logout Action
     */

    public function logoutAction() {
        $this->QFormLogin->logout();
        $this->_redirect('/qform');
    }

}

