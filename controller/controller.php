<?php
require_once("./model/UserManager.php");

function homepage (){
    require("./view/homepage.php");
}

function registerView (){
    require("./view/register.php");
}

function registerAction ($params){
    $userManager = new UserManager();
    $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    header("Location:index.php?action=loginView");
}

function loginView (){
    require("./view/login.php");
}

function loginAction ($params){
    $userManager = new UserManager();
    $loginResult = $userManager->loginAction($params["email"], $params["pwd"]);
}