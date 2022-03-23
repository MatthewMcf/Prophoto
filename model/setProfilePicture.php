<?php
//echo $_FILES['profilePicture']['type']."<br>";
//echo $_FILES['profilePicture']['name']."<br>";
//echo $_FILES['profilePicture']['size']."<br>";
//echo $_FILES['profilePicture']['tmp_name']."<br>";
//echo exec('whoami');
//move_uploaded_file($_POST["file"], "./data/test.png");

$currentDir = getcwd();
$dataDir = "/data/";

// Store all errors
$errors = [];

// Available file extensions
$fileExtensions = ["jpeg", "jpg", "png", "gif"];

// get user ID if define, otherwise set to default
if (!empty($_SESSION["userID"])) {
    $user = $_SESSION["userID"];
} else {
    $user = "default";
}

if (!empty($_FILES["fileAjax"] ?? null)) {
    $fileName = $_FILES["fileAjax"]["name"];
    $fileTmpName = $_FILES["fileAjax"]["tmp_name"];
    $fileType = $_FILES["fileAjax"]["type"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $user_id = $_POST["userID"];
    $uploadPath =
        $currentDir . $dataDir . $user . "/profilePicture" . $fileExtension;
    //$message = "";//$uploadPath;
    if (isset($fileName)) {
        if (!in_array($fileExtension, $fileExtensions)) {
            $errors[] = "JPEG, JPG, PNG and GIF images are only supported";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
                echo "The image " . basename($fileName) . " has been uploaded.";
            } else {
                echo "An error occurred while uploading. Try again.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "The following error occured: " . "\n";
            }
        }
    }
}
//echo $message . $user_id;
?>
