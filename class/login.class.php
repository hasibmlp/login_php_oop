<?php

class Login extends Dbh {
    public function getUser($username, $pass) {
        $stmt = $this->connect()->prepare("SELECT userPass FROM users2 WHERE userUid = ? OR userEmail = ?;");

        if(!$stmt->execute(array($username, $username))){
            $stmt = null;
            header('Location:../index.php?error=stfailed');
            exit();

        }

        if($stmt->rowCount == 0 ) {
            $stmt = null;
            header('Location:../index.php?error=userNotFound');
            exit();
        }

        $passHashed = $stmt->fetchAll(PSO::FETCH_ASSOC);
        $checkPass = verify_password($pass, $passHashed[0]['userPass']);

        if($checkPass == false) {
            $stmt = null;
            header('Location:../index.php?error=passNotMatch');
            exit();
        }elseif ($checkPass == true) {

            $stmt = $this->connect()->prepare("SELECT * FROM users2 WHERE userUid = ? userPass = ? userEmail = ?;");

            if (!$stmt->execute($username, $pass, $username)) {
                $stmt = null;
                header('Location:../index.php?error=stmtfailed');
                exit();
            }

            if($stmt->rowCount == 0 ) {
                $stmt = null;
                header('Location:../index.php?error=userNotFound');
                exit();

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION['userId'] = $user[0]['userId'];
                $_SESSION['userEmail'] = $user[0]['userEmail'];
            }


        }
    }
}