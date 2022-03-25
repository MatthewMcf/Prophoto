<?php

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

    public function insertUser($google_token, $email, $profile_url)
    {
        // $google_id = $_POST['google_id'];
        // $email = $_POST['email'];
        $extract = explode("@", $email);
        $userName = $extract[0];

        $insertion = $this->_connection->prepare('INSERT INTO users (id, google_token, email, username, pwd, display_name, profile_url) VALUES(null,?,?, ?, NULL, NULL, ?)');
        $insertion->bindParam(1, $google_token, PDO::PARAM_STR);
        $insertion->bindParam(2, $email, PDO::PARAM_STR);
        $insertion->bindParam(3, $userName, PDO::PARAM_STR);
        $insertion->bindParam(4, $profile_url, PDO::PARAM_STR);

        $status = $insertion->execute();
        $insertion->closeCursor();
        if (!$status) {
            throw new Exception('impossible to add account into database', 1234);
        }
    }
}
