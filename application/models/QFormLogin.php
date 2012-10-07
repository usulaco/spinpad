<?php

class Application_Model_QFormLogin extends Application_Model_QformDB {

    public function loginCheck($username = null, $password = null) {

        $user = $this->_db->fetchAll(
                $this->_db->select('*')
                        ->from('users')
                        ->where( " username = '$username' AND password = '".md5($password)."' ")
        );
        return $user;
    }

}

