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

function registerAction($params){
    $userManager = new UserManager();
    $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    header("Location:index.php?action=loginView");
}

function insertUser($params) {
    $userManager = new UserManager();
    $userManager->insertUser($params['google_token'], $params['email'], $params['profile_url']);

    require_once("./connection.php");

    header('Location:index.php?action=homepage');
}
