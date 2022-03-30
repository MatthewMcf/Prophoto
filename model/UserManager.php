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
            $_SESSION["id"] = $user["id"];
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

    public function getProfilePicPath($email) {
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //$_SESSION['id'] = "default";
        
        
        // folder from where its executed
        //$directory = getcwd();
        // or the parent folder from where its executed
        //$directory = dirname(getcwd());
        
        // other solution the parent directory of the file folder
        // $directory = dirname(dirname(__FILE__));

        $dataDir = "./data/";
        $default = "default";
        $fileName = "/profilePicture";
        $result = $dataDir . $default . $fileName . ".jpg";



        if ($user['google_token'] != null) {
            $url = $user['profile_url'];
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $result = $url;
                return $result;
            }
        }
        if (!empty($_SESSION["id"])) {
            $path = $dataDir . $_SESSION["id"] . $fileName;
            //echo $path;
            if (is_readable($path . ".jpg")) {
                //echo ".jpg";
                $result = $path . ".jpg"; 
            } elseif (is_readable(".".$path . ".jpg")) {
                $result = $path . ".jpg";
            }
        }
        return $result;
    }

    public function setProfilePicture($file) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        //echo $_FILES['profilePicture']['type']."<br>";
        //echo $_FILES['profilePicture']['name']."<br>";
        //echo $_FILES['profilePicture']['size']."<br>";
        //echo $_FILES['profilePicture']['tmp_name']."<br>";
        //echo exec('whoami');
        //move_uploaded_file($_POST["file"], "./data/test.png");
        
        //$currentDir = getcwd();
        $dataDir = "./data/";
        //$currentDir = dirname(dirname(__FILE__));
        // Store all errors
        $errors = [];
        
        // Available file extensions
        $fileExtensions = ["jpeg", "jpg", "png", "gif"];
        
        // get user ID if define, otherwise set to default
        if (!empty($_SESSION["id"])) {
            $user = $_SESSION["id"];
        } else {
            $user = "default";
        }

        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bindParam(1, $user, PDO::PARAM_STR);
        $stmt->execute(); 
        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($file ?? null)) {
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            $fileType = $file["type"];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
            //$user_id = $_POST["userID"];
            $uploadPath = $dataDir . $user . "/profilePicture.jpg";
            //$message = "";//$uploadPath;
            if (isset($fileName)) {
                if (!in_array($fileExtension, $fileExtensions)) {
                    $errors[] = "JPEG, JPG, PNG and GIF images are only supported";
                }
                if (empty($errors)) {
                    if (!file_exists($dataDir . $user)) {
                        mkdir($dataDir . $user);
                    }
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                    if ($didUpload) {
                        echo "The image " . basename($fileName) . " has been uploaded.";

                        //update profile pic path in database 
                        $stmt = $this->_connection->prepare("UPDATE users SET profile_url = 'profilePicture.jpg' WHERE id=?");
                        $stmt->bindParam(1, $user, PDO::PARAM_STR);
                        $stmt->execute();                 
                    
                    } else {
                        echo "An error occurred while uploading. Try again.";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo "The following error occured: " . $error . "\n";
                    }
                }
            }
        }
    }
}
