<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('ImageCreation.php');
require_once('Manager.php');
class PictureManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

    // return the username and the profile picture path of a user
    // function is was desgned to be used internally to build array to display the card image
    // but you can use it whever you need
    public function getProfilePathAndName($userId)
    {
        $req = $this->_connection->prepare("SELECT id, username, profile_url FROM users WHERE id = :id");
        $req->execute(array(
            "id" => $userId
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (!empty($data["profile_url"]) && !empty($data["username"])) {
            return (array(
                "profilePath" => $data["profile_url"],
                "username" => $data["username"]
            ));
        } else {
            return (array(
                "profilePath" => "./data/default/profilePicture.jpg",
                "username" => "username"
            ));
        }
    }

    // -> see UserManager class to use it in a more appropriate way ;)
    public function getProfilePicturePath()
    {
        $userId = (!empty($_SESSION['id'])) ? $_SESSION["id"] : -1;
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

    // return from the image ID (from the picture table) the medium image path and all the information needed 
    // to display an image in a modal after clicking on it. 
    // it will be the highest resolution displayed.
    // return default image path and default info if it doesn´t match
    public function getImage($imageId)
    {
        $req = $this->_connection->prepare("SELECT user_id, title, description, tags,
           price, bookmark FROM pictures WHERE id = :id");
        $req->execute(array(
            "id" => $imageId
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $userData = $this->getProfilePathAndName($data["user_id"]);

        if (!empty($data["user_id"])) {
            return (array(
                "id" => $imageId,
                "path" => "./data/" . $data["user_id"] . "/medium/" . $imageId . ".jpg",
                "title" => $data["title"],
                "description" => $data["description"],
                "tags" => $data["tags"],
                "price" => $data["price"],
                "bookmark" => $data["bookmark"],
                "username" => $userData["username"],
                "profilePicture" => $userData["profilePath"],
                "userID" => $data["user_id"]
            ));
        } else {
            return (array(
                "id" => -1,
                "path" => "./data/default/image.jpg",
                "title" => "title",
                "description" => "description",
                "tags" => "tags",
                "price" => "price",
                "bookmark" => "bookmark",
                "username" => "username",
                "profilePicture" => "profilePath",
                "userID" => "user"
            ));
        }
    }

    // return from the image ID (from the picture table) the small image path and all the information needed 
    // to display a card image in the home page or a profile user page
    // it will be the smallest resolution displayed.
    // return default image path and default info if it doesn´t match
    public function getSmallImage($imageId)
    {
        $req = $this->_connection->prepare("SELECT user_id, title, description, tags,
           price, bookmark FROM pictures WHERE id = :id");
        $req->execute(array(
            "id" => $imageId
        ));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $isItBookmarked = false;
        if (!empty($_SESSION['id'])) {
            $req = $this->_connection->prepare("SELECT id FROM bookmarks WHERE user_id = :user_id AND  picture_id = :picture_id");
            $req->execute(array(
                "user_id" => $_SESSION['id'],
                "picture_id" => $imageId
            ));
            $res = $req->fetch(PDO::FETCH_ASSOC);
            $isItBookmarked = (!empty($res))? true: false;
        }

        $req->closeCursor();

        $userData = $this->getProfilePathAndName($data["user_id"]);

        if (!empty($data["user_id"])) {
            return (array(
                "id" => $imageId,
                "path" => "./data/" . $data["user_id"] . "/small/" . $imageId . ".jpg",
                "title" => $data["title"],
                "price" => $data["price"],
                "bookmark" => $data["bookmark"],
                "userID" => $data["user_id"],
                "username" => $userData["username"],
                "profilePicture" => $userData["profilePath"],
                "userID" => $data["user_id"],
                "bookmarkByCurr" => $isItBookmarked
            ));
        } else {
            return (array(
                "id" => -1,
                "path" => "./data/default/image.jpg",
                "title" => "title",
                "price" => "price",
                "bookmark" => "bookmark",
                "userID" => "user",
                "username" => "username",
                "profilePicture" => "profilePath",
                "bookmarkByCurr" => false 
            ));
        }
    }

    // return the number of image saved into the pictures table
    public function getNumberImages()
    {
        $req = $this->_connection->query("SELECT id FROM pictures");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return count($data);
    }

    // return the number of image of one user (userId) saved into the pictures table
    public function getNumberImagesFromId($userId)
    {
        $req = $this->_connection->prepare("SELECT id FROM pictures WHERE user_id = :user_id");
        $req->execute(array(
            "user_id" => $userId
        ));
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return count($data);
    }

    // return a array of 2 items
    // [imageInfo] -> a random small image path and all the information needed 
    // to display it in a card image format in the home page or a profile user page
    // to prevent repetition and get a new random image, you can give an array of image ID already displayed
    // [imageList] -> this array will be return with the id of the new image 
    // return default if there is no more image to display
    public function getRandomImages($imagesList = [])
    {
        $req = $this->_connection->query("SELECT id FROM pictures");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (count($imagesList) < count($data)) {
            shuffle($data);
            foreach ($data as $dat) {
                $id = $dat["id"];
                if (!in_array($id, $imagesList)) {
                    array_push($imagesList, $id);
                    $val = $this->getSmallImage($id);
                    return (array(
                        "imageInfo" => $val,
                        "imageList" => $imagesList
                    ));
                }
            }
        } else {
            return "default";
        }
    }

    // same as the function above but only from one specific user (userId param)
    // if any other question, please read the doc first ;)
    public function getRandomImagesFromId($userId, $imagesList = [])
    {
        $req = $this->_connection->prepare("SELECT id FROM pictures WHERE user_id = :user_id");
        $req->execute(array(
            "user_id" => $userId
        ));
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (count($imagesList) < count($data)) {
            shuffle($data);
            foreach ($data as $dat) {
                $id = $dat["id"];
                if (!in_array($id, $imagesList)) {
                    array_push($imagesList, $id);
                    $val = $this->getSmallImage($id);
                    return (array($imagesList, $val));
                }
            }
        } else {
            return "default";
        }
    }

    public function getImagesFromId($userId, $limit = null)
    {
        $stmt = $this->_connection->prepare("SELECT id FROM pictures WHERE user_id = ? LIMIT 5");
        if ($limit) {
            $stmt = $this->_connection->prepare("SELECT id FROM pictures WHERE user_id = ? LIMIT ?");
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        }

        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }

    // see BookMarkManager class, this function have been removed from PictureManager class
    // same as the functions above but only liked by one specific user (userId param)
    // if any other question, please read the doc first ;)
    public function getLikedImages($imagesList = [])
    {
    }

    // same as the functions above but only bought by one specific user (userId param)
    // if any other question, please read the doc first ;)
    public function getPurchasedImages($imagesList = [])
    {
    }

    // -> see UserManager class to use it in a more appropriate way ;)
    public function setProfilePicture($file)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
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

        //$stmt = $this->_connection->prepare("SELECT * FROM users WHERE id=?");
        //$stmt->bindParam(1, $user, PDO::PARAM_STR);
        //$stmt->execute(); 
        //$user_info = $stmt->fetch(PDO::FETCH_ASSOC);

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

    // save an uploaded image in three sizes in three folder
    // original size -> original folder with the original format
    // medium size -> medium folder in jpg
    // and last -> small folder in jpg
    public function setImage($file)
    {
        if (!isset($_SESSION)) {
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
            $req = $this->_connection->prepare("INSERT INTO pictures (user_id) VALUES( :user_id)");
            $req->execute(array(
                "user_id" => $user
            ));
            // get the id of the image just inserted
            $pictureId = $this->_connection->lastInsertId();
            // create the paths for save the image
            $originalPath = $dataDir . $user . "/original/" . $pictureId . "." . $fileExtension;
            $mediumPath = $dataDir . $user . "/medium/" . $pictureId . ".jpg";
            $smallPath = $dataDir . $user . "/small/" . $pictureId . ".jpg";

            //$message = "";//$uploadPath;
            if (isset($fileName)) {
                if (!in_array($fileExtension, $fileExtensions)) {
                    $errors[] = "JPEG, JPG, PNG images are only supported";
                }
                if (empty($errors)) {
                    if (!file_exists($dataDir . $user)) {
                        mkdir($dataDir . $user . "/original");
                    }
                    // save the image in the original folder
                    if (!file_exists($dataDir . $user . "/original/")) {
                        mkdir($dataDir . $user . "/original/");
                        mkdir($dataDir . $user . "/medium/");
                        mkdir($dataDir . $user . "/small/");
                    }
                    $didUpload = move_uploaded_file($fileTmpName, $originalPath);
                    //move_uploaded_file($fileTmpName, $mediumPath);
                    //$didUpload = move_uploaded_file($fileTmpName, $smallPath);
                    if ($didUpload) {
                        // resize the image and save it in the appropriate folder
                        $imageObj = new ImageCreation($originalPath);
                        $imageObj->createImage($mediumPath, 600);
                        $imageObj->createImage($smallPath, 300);
                        echo "The image " . basename($fileName) . " has been uploaded.";

                        //update profile pic path in database 
                        //$stmt = $this->_connection->prepare("UPDATE users SET profile_url = 'profilePicture.jpg' WHERE id=?");
                        //$stmt->bindParam(1, $user, PDO::PARAM_STR);
                        //$stmt->execute();

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

    public function setImageInfo($params)
    {
        $stmt = $this->_connection->prepare("UPDATE `pictures` SET `title`=?,`description`=?,`price`=?,`tags`=? WHERE id=?");
        $stmt->bindParam(1, $params["title"], PDO::PARAM_STR);
        $stmt->bindParam(2, $params["description"], PDO::PARAM_STR);
        $stmt->bindParam(3, $params["price"], PDO::PARAM_STR);
        $stmt->bindParam(4, $params["tags"], PDO::PARAM_STR);
        $stmt->bindParam(5, $params["photo-id"], PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();

        $req = $this->_connection->prepare("SELECT tags FROM pictures WHERE id = :photo_id");
        $req->execute(array(
            "photo_id" => $params["photo-id"]
        ));
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $str_arr = explode(",", $data[0]['tags']);
        foreach ($str_arr as $value) {
            $table = $this->_connection->prepare("INSERT IGNORE INTO tags(name) VALUES(?)");
            $tag = trim($value);
            $table->bindParam(1, $tag, PDO::PARAM_STR);
            $table->execute();
        }
        $table->closeCursor();

        $tags = $this->_connection->prepare("SELECT name FROM tags WHERE id>:num");
        $tags->execute(array(
            "num" => 0
        ));
        $tagData = $tags->fetchAll(PDO::FETCH_ASSOC);

        file_put_contents("tags.json", "");
        $myfile = fopen("tags.json", "w") or die("Unable to open file!");
        $tag = json_encode($tagData);
        fwrite($myfile, $tag);
        fclose($myfile);
        $tags->closeCursor();
    }

    public function deleteImage($filepath1, $filepath2, $filepath3, $user_id, $photo_id)
    {
        if (file_exists($filepath1)) {
            unlink($filepath1);
        } else {
        }
        if (file_exists($filepath2)) {
            unlink($filepath2);
        } else {
        }
        if (file_exists($filepath3)) {
            unlink($filepath3);
        } else {
        }


        $sql = $this->_connection->prepare("DELETE FROM pictures WHERE user_id = :user_id AND id = :photo_id");
        $sql->execute(array(
            'user_id' => $user_id,
            'photo_id' => $photo_id
        ));
    }

    //     public function getImageTags()
    //     {
    //     //     $req = $this->_connection->query("SELECT tags FROM pictures WHERE user_id = :user_id AND id = :image_id");
    //     //     // $req->execute(array(
    //     //     //     "user_id" => $userId,
    //     //     //     "image_id" => $image_id
    //     //     // ));

    //     //     $data = $req->fetchAll(PDO::FETCH_ASSOC);
    //     //     $req->closeCursor();


    //     //     $response = $db->query('SELECT tags FROM pictures WHERE user_id = 2 AND id = 31');

    //     //     echo 'picture #31';
    //     //     echo '</br>';
    //     //     while ($data = $response->fetch(PDO::FETCH_ASSOC)) {
    //     //         $str_arr = explode(",", $data['tags']);
    //     //         // echo '<p>' . $data['tags'] . '</p>';
    //     //         // print_r($str_arr);
    //     //         foreach ($str_arr as $value) {
    //     //             echo $value;
    //     //             echo '</br>';
    //     //         }
    //     //     }
    //     // }

    //     // public function prepareDirectories($user_id) {
    //     //     if (!file_exists($dataDir . $user_id))) {
    //     //         mkdir($dataDir . $user_id);
    //     //     }
    //     // }

    // }
}
