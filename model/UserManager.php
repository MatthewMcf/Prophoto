<?php

require_once('Manager.php');
class UserManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser($google_token, $email, $profile_url)
    {
        // $google_id = $_POST['google_id'];
        // $email = $_POST['email'];
        $extract = explode("@", $email);
        $userName = $extract[0];

        $insertion = $this->_connection->prepare('INSERT INTO users (id, google_token, email, username, password, display_name, profile_url) VALUES(null,?,?, ?, NULL, NULL, ?)');
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
