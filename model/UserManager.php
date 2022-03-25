<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once('Manager.php');
class UserManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    } 

    public function registerAction($email, $pwd, $username) {
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

    public function loginAction($email, $pwd) {
        $email = addslashes(htmlspecialchars(htmlentities(trim($email))));
        $pwd = addslashes(htmlspecialchars(htmlentities(trim($pwd))));

        $req = $this->_connection->prepare("SELECT email, pwd FROM users WHERE email = :email");
        $req->execute(array(
            "email" => $email
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if(password_verify($pwd, $data["pwd"])) {
            $_SESSION["email"] = $email;
            header('Location: index.php?action=homepage');
        } else {
            header('Location: index.php?action=loginView&login=false');
        }
    }
}