<?php
require_once("./model/UserManager.php");
require_once("./model/PictureManager.php");


function homepage()
{
    require("./view/homepage.php");
}

function photo($params)
{
    $pictureManager = new PictureManager();
    $photo = $pictureManager->getImage($params["photo-id"]);

    require("./view/ModalPhotoView.php");
}

function registerView()
{
    require("./view/register.php");
}

function registerAction($params)
{
    $userManager = new UserManager();
    $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    header("Location:index.php?action=homepage&register=true");
}

function insertUser($params)
{
    $userManager = new UserManager();
    $userManager->insertUser($params['google_token'], $params['email'], $params['profile_url']);

    // require_once("./connection.php");

    echo "index.php";
}
function loginView()
{
    require("./view/login.php");
}

function loginAction($params)
{
    $userManager = new UserManager();
    $loginResult = $userManager->loginAction($params["emailLogin"], $params["pwdLogin"]);
    if ($loginResult) {
        header('Location:index.php?action=homepage');
    } else {
        header('Location:index.php?action=homepage&login=false');
    }
}

function logoutAction()
{
    session_destroy();
    header('Location:index.php?action=homepage');
}

function publicProfView($params)
{
    $userManager = new UserManager();
    $requestedUser = $userManager->getUserInfo($params['requested_id']);
    $requestedUserProfileURL = $userManager->getProfilePicturePath($params['requested_id']);
    require("./view/publicProfileView.php");
}

function privateProfView($params)
{
    if (isset($_SESSION["id"])) {
        // echo($_SESSION["id"]);
        // set the link variable to get the correct css files for the view private profile
        $link = '<link rel="stylesheet" href="./public/css/modalProfilePicture.css"><link rel="stylesheet" href="./public/css/privateProfView.css">';
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($_SESSION["id"]);
        $profileURL = $userManager->getProfilePicturePath($_SESSION["id"]);

        //Get images for current user
        $pictureManager = new PictureManager();

        // echo $params['currUserLimit'];

        //Array of picture IDs for current user

        if (isset($params['currUserLimit'])) {
            $currUserImages = $pictureManager->getImagesFromId($_SESSION["id"], $params['currUserLimit']);
        } else {
            $currUserImages = $pictureManager->getImagesFromId($_SESSION["id"]);
        }

        $currUserCardInfos = [];
        foreach ($currUserImages as $image) {
            array_push($currUserCardInfos, $pictureManager->getSmallImage($image["id"]));
        }

        require("./view/privateProfView.php");
    } else {
        require("./view/homepage.php");
    }
}

function setProfilePicture($params)
{
    $userManager = new UserManager();
    $userManager->setProfilePicture($_FILES["fileAjax"]);
}

function uploadImage($params)
{
    $pictureManager = new PictureManager();
    $pictureManager->setImage($_FILES["fileAjax"]);
}

function removeImage($params)
{
    $pictureManager = new PictureManager();
    $pictureManager->deleteImage($params["fileAjax1"], $params["fileAjax2"], $params["fileAjax3"], $params["user_id"], $params["photo_id"]);
}
function photoEdit($params)
{
    $pictureManager = new PictureManager();
    $photo = $pictureManager->getImage($params["photo-id"]);

    require("./view/ModalPhotoEdit.php");
}

function submitPhotoEdit($params)
{
    $pictureManager = new PictureManager();
    $photo = $pictureManager->setImageInfo($params);

    privateProfView($params);
}
