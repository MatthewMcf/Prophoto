<?php
require_once("./model/UserManager.php");

function homepage (){
    require("./view/homepage.php");
}

function registration (){
    require("./view/registration.php");
}

function registerUser ($params){
    $userManager = new UserManager();
    $userManager->registerUser($params["email"], $params["pwd"], $params["username"]);
    header("Location:index.php?action=login");
}
