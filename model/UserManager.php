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

        //First check for existing user
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]); 
        $user = $stmt->fetch();
         
        if ($user) {
            //user with this email already exists in our database
        } else {
            $req = $this->_connection->prepare("INSERT INTO users(email, pwd, username) VALUES(:email, :pwd, :username)");
            $req->execute(array(
                "email" => $email,
                "pwd" => $pwd,
                "username" => $username
            ));
            $userID = $this->_connection->lastInsertId();
            mkdir("./data/".$userID);
            mkdir("./data/".$userID."/small");
            mkdir("./data/".$userID."/medium");
            mkdir("./data/".$userID."/original");
        }


    }

    public function insertUser($google_token, $email, $profile_url) {
        // $google_id = $_POST['google_id'];
        // $email = $_POST['email'];
        $extract = explode("@", $email);
        $userName = $extract[0];

        //First check for existing user
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       

        if ($user) {
            // echo 'found user with email: ' . $email; 
            $_SESSION["email"] = $email;
        } else {
            // echo 'inserting user with email: ' . $email; 
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

    public function loginAction($email, $pwd) {
        $email = addslashes(htmlspecialchars(htmlentities(trim($email))));
        $pwd = addslashes(htmlspecialchars(htmlentities(trim($pwd))));

        $req = $this->_connection->prepare("SELECT id, email, pwd FROM users WHERE email = :email");
        $req->execute(array(
            "email" => $email
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if(password_verify($pwd, $data["pwd"])) {
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $data["id"];
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo($email) {
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            throw new Exception('Invalid user, not in database', 1234);
        }

    }
}
