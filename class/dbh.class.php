<?php

class Dbh {
    protected function connect() {
        try {
            $username = 'hsb';
            $pwd = '123456';
            $dbh = new PDO("mysql:host=localhost;dbname=php_proj",$username, $pwd);
            return $dbh;
        } catch (PDOExeception $e) {
            print "error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}