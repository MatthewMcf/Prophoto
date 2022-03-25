<?php
$_SESSION['userID'] = NULL;


// folder from where its executed
//$directory = getcwd();
// or the parent folder from where its executed
//$directory = dirname(getcwd());

// other solution the parent directory of the file folder
// $directory = dirname(dirname(__FILE__));
$dataDir = "./data/";
$default = "default";
$fileName = "/profilePicture";
$result = $dataDir . $default . $fileName . ".png";
if (!empty($_SESSION["userID"])) {
    $path = $dataDir . $_SESSION["userID"] . $fileName;
    // echo $path;
    if (is_readable($path . ".png")) {
        $result = $path . ".png";
    } elseif (is_readable($path . ".jpg")) {
        $result = $path . ".jpg";
    } elseif (is_readable($path . ".jpeg")) {
        $result = $path . ".jpeg";
    } elseif (is_readable($path . ".svg")) {
        $result = $path . ".svg";
    }
}
return $result;
