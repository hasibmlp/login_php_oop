<?php

class SignupContr extends Signup {
    private $uid;
    private $pass;
    private $passRe;
    private $email;
    public function __construct($uid, $pass, $passRe, $email){
        $this->uid = $uid;
        $this->pass = $pass;
        $this->passRe = $passRe;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == true) {
            header('Location: ../index.php?error=empty');
            die();
        }
        if ($this->invalidUid() == true) {
            header('Location: ../index.php?error=invaliduid');
            die();
        }
        if ($this->inavalidEmail() == true) {
            header('Location: ../index.php?error=invalidEmail');
            die();
        }
        if ($this->passMatch() == true) {
            header('Location: ../index.php?error=passMatch');
            die();
        }
        if ($this->userUidTaken() == true) {
            header('Location: ../index.php?error=userUidTaken');
            die();
        }

        $this->setUser($this->uid, $this->pass, $this->email);


    }

    private function emptyInput () {
        $result;
        if (empty($this->uid) || empty($this->pass) ||  empty($this->passRe) || empty($this->email)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    private function invalidUid () {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    private function inavalidEmail () {
        $result;
        if (!filter_var($this->email)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    private function passMatch () {
        $result;
        if ($this->pass !== $this->passRe) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    private function userUidTaken () {
        $result;
        if ($this->checkUser($this->uid, $this->email) ) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    
    
    
}
