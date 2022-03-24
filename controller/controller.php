<?php
require_once("./model/UserManager.php");

function homepage()
{
    require("./view/homepage.php");
}

function insertUser($params)
{
    $userManager = new UserManager();
    $userManager->insertUser($params['google_token'], $params['email'], $params['profile_url']);

    require_once("./connection.php");

    header('Location:index.php?action=homepage');
}
