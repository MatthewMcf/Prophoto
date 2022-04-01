<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require_once('ImageCreation.php');
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
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
         
        if ($user) {
            //user with this email already exists in our database
            return false;
        } else {
            $req = $this->_connection->prepare("INSERT INTO users(email, pwd, username) VALUES(?, ?, ?)");
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->bindParam(2, $pwd, PDO::PARAM_STR);
            $req->bindParam(3, $username, PDO::PARAM_STR);
            $req->execute();

            $userID = $this->_connection->lastInsertId();
            mkdir("./data/".$userID);
            mkdir("./data/".$userID."/small");
            mkdir("./data/".$userID."/medium");
            mkdir("./data/".$userID."/original");
            return true;
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

    public function loginAction($email, $pwd, $autoconnection) {
        if(isset($_COOKIE["email"])){
            $email = addslashes(htmlspecialchars(htmlentities(trim($email))));

            $req = $this->_connection->prepare("SELECT id, email FROM users WHERE email = :email");
            $req->execute(array(
                "email" => $email
            ));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            $_SESSION["email"] = $email;
            $_SESSION["id"] = $data["id"];
            
            return true;
        } else{
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
                if(isset($_REQUEST["autoconnection"])){
                    setcookie('email', $email, time() + 30*24*3600, false, false, false, true);
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function getUserInfo($id) {
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            throw new Exception('Invalid user, not in database', 1234);
        }
    }

    public function getProfilePicturePath($userId = null) {
        if ($userId == null) {
            $userId = (!empty($_SESSION['id']))? $_SESSION["id"]: -1;
        }
        $req = $this->_connection->prepare("SELECT id, profile_url FROM users WHERE id = :id");
        $req->execute(array(
            "id" => $userId
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (!empty($data["profile_url"])) {
            return $data["profile_url"];
        } else {
            return "./data/default/profilePicture.jpg";
        }
    }
    
    public function setProfilePicture($file) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        //$currentDir = getcwd();
        $dataDir = "./data/";
        //$currentDir = dirname(dirname(__FILE__));
        // Store all errors
        $errors = [];
        // Available file extensions
        $fileExtensions = ["jpeg", "jpg", "png"];
        // get user ID if define, otherwise set to default
        if (!empty($_SESSION["id"])) {
            $user = $_SESSION["id"];
        } else {
            $user = "default";
        }

        if (!empty($file ?? null)) {
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            //$fileType = $file["type"];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            // create file-path to manipulate the image
            $defaultOnePath = $dataDir . "default/tempOne." . $fileExtension;
            $defaultTwoPath = $dataDir . "default/tempTwo.jpg";
            $uploadPath = $dataDir . $user . "/profilePicture.jpg";
            
            if (isset($fileName)) {
                if (!in_array($fileExtension, $fileExtensions)) {
                    $errors[] = "JPEG, JPG and PNG images are only supported (maybe GIF in a future update ..)";
                }
                if (empty($errors)) {
                    if (!file_exists($dataDir . $user)) {
                        mkdir($dataDir . $user);
                    }
                    $didUpload = move_uploaded_file($fileTmpName, $defaultOnePath);
                    // create a square image
                    $objThumbImage = new ImageCreation($defaultOnePath);
                    $objThumbImage->createSquare($defaultTwoPath);
                    // downsize the image
                    $objThumbImage = new ImageCreation($defaultTwoPath);
                    $objThumbImage->createImage($uploadPath, 200);
                    // delete the unused temporary files
                    unlink($defaultTwoPath);
                    unlink($defaultOnePath);       
                    echo "The image " . basename($fileName) . " has been uploaded.";
                    //update profile pic path in database 
                    $stmt = $this->_connection->prepare("UPDATE users SET profile_url = ? WHERE id=?");
                    $stmt->bindParam(1, $uploadPath, PDO::PARAM_STR);
                    $stmt->bindParam(2, $user, PDO::PARAM_STR);
                    $stmt->execute();                 
                    
                } else {
                    foreach ($errors as $error) {
                        echo "The following error occured: " . $error . "\n";
                    }
                }
            }
        }
    }
}
