<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(TRUE);
        }
        $this->view->config = (object) $this->getInvokeArg('bootstrap')->getOptions()['apps'];
    }

    public function indexAction() {

        echo __METHOD__;
        
        
    }

    public function examplesAction() {

        echo __METHOD__;
    }

    public function newsAction() {

        echo __METHOD__;
    }

    public function productAction() {

        echo __METHOD__;
    }

    public function pucharseAction() {

        echo __METHOD__;
    }

    public function supportAction() {

        echo __METHOD__;
    }

    public function contactAction() {

        echo __METHOD__;
    }

}

