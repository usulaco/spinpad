<?php

class Application_Model_QFormLogin extends Application_Model_QformDB {

    public function login($username = null, $password = null) {
            $f = new Zend_Filter_StripTags();
            $username = $f->filter($username);
            $password = $f->filter($password);
            if (empty($username)) {
                echo json_encode((object) Array('success'=>false,'msg'=>'{_PROVIDE_USERNAME}'));
            }
            $authAdapter = new Zend_Auth_Adapter_DbTable();
            $authAdapter->setTableName('users');
            
            $authAdapter->setIdentityColumn('username');
            $authAdapter->setCredentialColumn('password');
            
            $authAdapter->setIdentity($username);
            $authAdapter->setCredential(md5($password));
            
             $auth = Zend_Auth::getInstance();
             $result = $auth->authenticate($authAdapter);
             if ($result->isValid()) {
                    // success: store database row to auth's storage
                    // system. (Not the password though!)
                    $data = $authAdapter->getResultRowObject(null,'password');
                    $auth->getStorage()->write($data);
                    return json_encode((object) Array('success'=>true,'data'=>$data));
             } else {
                    // failure: clear database row from session
                    return json_encode((object) Array('success'=>false,'msg'=>'{_ERROR_USERNAME_OR_PASSWORD}'));
             }
    }
    public function logout(){
        Zend_Auth::getInstance()->clearIdentity();
    }

}

