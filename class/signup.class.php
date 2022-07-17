<?php

class Signup extends Dbh {
    
    protected function setUser($uid, $pass, $email) {
        $stmt = $this->connect()->prepare("INSERT INTO users2(userUid, userPass, userEmail) VALUES (?,?,?)");
        
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPass, $email))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare("SELECT * FROM users2 WHERE userUid = ? OR userEmail = ?;");
        
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

            $resultSet;
            if ($stmt->rowCount() === 0 ) {
                $resultSet = false;
            }else {
                $resultSet = true;
            }
            return $resultSet;
    }
}