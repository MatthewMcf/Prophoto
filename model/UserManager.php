<?php

require_once('Manager.php');
class UserManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    } 

    public function registerUser($email, $pwd, $username) {
        $email = addslashes(htmlspecialchars(htmlentities(trim($email))));
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $username = addslashes(htmlspecialchars(htmlentities(trim($username))));

        $req = $this->_connection->prepare("INSERT INTO users(email, pwd, username) VALUES(:email, :pwd, :username)");
        $req->execute(array(
            "email" => $email,
            "pwd" => $pwd,
            "username" => $username
        ));
    }
}