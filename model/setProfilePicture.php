<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require_once('ImageCreation.php');
$dataDir = "../data/";
$errors = [];

// Available file extensions
$fileExtensions = ["jpeg", "jpg", "png", "gif"];

// get user ID if define, otherwise set to default
if (!empty($_SESSION["id"])) {
    $user = $_SESSION["id"];
} else {
    $user = "default";
}

if (!empty($_FILES["fileAjax"] ?? null)) {
    $fileName = $_FILES["fileAjax"]["name"];
    $fileTmpName = $_FILES["fileAjax"]["tmp_name"];
    $fileType = $_FILES["fileAjax"]["type"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    //$user_id = $_POST["userID"];
    $profilePath = $dataDir . $user . "/profilePicture.jpg";
    $tempPath =  $dataDir . $user . "/tempPicture." . $fileExtension;
    $tempJpgPath =  $dataDir . $user . "/tempJpgPicture.jpg";
    $thumbnailPath = $dataDir . $user . "/thumbnail.jpg"; 
    //$message = "";//$uploadPath;
    echo $tempPath;
    if (isset($fileName)) {
        if (!in_array($fileExtension, $fileExtensions)) {
            $errors[] = "JPEG, JPG, PNG and GIF images are only supported";
        }
        if (empty($errors)) {
            if (!file_exists($dataDir . $user)) {
                mkdir( $dataDir . $user);
            }
            move_uploaded_file($fileTmpName, $tempPath);
            $objImage = new ImageCreation($tempPath);
            $objImage->createSquare($tempJpgPath);
            $objImage = new ImageCreation($tempJpgPath);
            $objImage->createImage($profilePath, 200);
            $objImage->createImage($thumbnailPath, 80);

            //$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            //if ($didUpload) {
            //    echo "The image " . basename($fileName) . " has been uploaded.";
            //} else {
            //    echo "An error occurred while uploading. Try again.";
            //}
        } else {
            foreach ($errors as $error) {
                echo $error . "The following error occured: " . "\n";
            }
        }
    }
}

//echo $message . $user_id;
?>
