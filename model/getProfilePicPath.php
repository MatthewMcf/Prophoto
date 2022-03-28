<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
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
?>
