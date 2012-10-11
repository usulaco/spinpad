<?php

class QformController extends Zend_Controller_Action {

    public function lang($string, $ident = 'en') {
        //$this->QFormDB->query("SELECT * FROM lang WHERE lang_ident='' AND keyword = '".$keyword."'")[0]['lang_translation'];
        return $string;
    }

    public function init() {
        /*
         *  initiate translation filter
         */
        $this->_helper->layout->getLayoutInstance()->getView()->addFilter('Lang');
        /*
         *  init QFormDB
         */
        $this->QFormDB = new Application_Model_QformDB();
        /*
         *  if not login redirect to login page 
         */
        $this->auth = Zend_Auth::getInstance();
        if (!$this->auth->hasIdentity()) {
            if (!in_array($this->_request->getRequestUri(), Array('/qform/login', '/qform/loginSubmit')))
                $this->_redirect('/qform/login');
        } else {
            $this->view->user = $this->auth->getStorage()->read();
        }
        /*
         *  loading models 
         */
        $this->QFormLogin     = new Application_Model_QFormLogin();
        $this->QFormInterface = new Application_Model_QFormLogin();
        /*
         * 
         */
        $this->_helper->layout()->setLayout('qform');
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout()->setLayout('qform_ajax');
            //$this->_helper->layout->disableLayout();
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
     * Load menu tee 
     */

    public function loadmenuAction() {
      return  $this->QFormInterface->getMenu($this->_request->getPost('menu_id'));
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

