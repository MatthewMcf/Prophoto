<?php
require_once("./model/UserManager.php");

function homepage()
{
    require("./view/homepage.php");
}

function photo(){
    require("./view/photo.php");
}

function registerView(){
    require("./view/register.php");
}

function registerAction ($params){
    $userManager = new UserManager();
    $resigerResult = $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    if($resigerResult){
        header("Location:index.php?action=homepage&register=true");
    } else {
        header("Location:index.php?action=homepage&register=false");
    }
}

function insertUser($params) {
    $userManager = new UserManager();
    $userManager->insertUser($params['google_token'], $params['email'], $params['profile_url']);
    
    // require_once("./connection.php");
    
    echo "http://localhost/sites/proPhoto/index.php";
}
function loginView (){
    require("./view/login.php");
}

function loginAction ($params){
    $userManager = new UserManager();
    $loginResult = $userManager->loginAction($params["emailLogin"], $params["pwdLogin"], $params["autoconnection"]);
    if ($loginResult) {
        header('Location:index.php?action=homepage');
    } else {
        header('Location:index.php?action=homepage&login=false');
    }
}

function logoutAction() {
    session_destroy();
    header('Location:index.php?action=homepage');
}

function privateProfView($params) {
    if (isset($_SESSION["email"])) {
        // set the link variable to get the correct css files for the view private profile
        $link = '<link rel="stylesheet" href="./public/css/modalProfilePicture.css"><link rel="stylesheet" href="./public/css/privateProfView.css">
';
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($_SESSION["email"]);
        require("./view/privateProfView.php");     
    } else {
        require("./view/homepage.php");
    }
}
