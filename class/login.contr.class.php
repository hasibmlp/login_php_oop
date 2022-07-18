<?php

class LoginContr extends Login {
    private $uid;
    private $pass;


    public function __construct($uid, $pass){
        $this->uid = $uid;
        $this->pass = $pass;
    }

    public function loginUser() {
        if ($this->emptyInput() == true) {
            header('Location: ../index.php?error=empty');
            die();
        }
        $this->getUser($this->uid, $this->pass);
        }



    

    private function emptyInput () {
        $result;
        if (empty($this->uid) || empty($this->pass)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    
}