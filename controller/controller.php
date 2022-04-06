<?php
require_once("./model/UserManager.php");
require_once("./model/PictureManager.php");
require_once("./model/BookmarkManager.php");
require_once("./model/SalesManager.php");


function homepage($params=[])
{
    $pictureObj = new PictureManager();
    $userManager = new UserManager();

    $nbToDisplay = $pictureObj->getNumberImages();
    if (isset($_SESSION["id"])) {
        $user = $userManager->getUserInfo($_SESSION["id"]);
        $profileURL = $userManager->getProfilePicturePath($_SESSION["id"]);
        $salesManager = new SalesManager();
        $purchasedImages = $salesManager->getPurchasedImages(2147483647);
    }
    if ($nbToDisplay > 0) {
        $isThereImage = true;
        if (!empty($params['cardLimit'])) {
            $nbToDisplay = ($params['cardLimit']<$nbToDisplay)? $params['cardLimit']: $nbToDisplay;
        } else {
            $nbToDisplay = (9<$nbToDisplay)? 9: $nbToDisplay;
        }
        $oneCardInfo = $pictureObj->getRandomImages();
        $homePageCardInfos = array($oneCardInfo["imageInfo"]);
        for ($i = 1; $i < $nbToDisplay; $i++) {
            $oneCardInfo = $pictureObj->getRandomImages($oneCardInfo["imageList"]);
            array_push($homePageCardInfos, $oneCardInfo["imageInfo"]);
        }
    } else {
        $isThereImage = false;
    }
    require("./view/homepage.php");
}

function searchpage($params)
{
    $pictureObj = new PictureManager();
    $userManager = new UserManager();
    $searched = $params['search'];
    $image_ids = $pictureObj->getSearchedID($searched);

    if ($image_ids) {
        $nbToDisplay = $pictureObj->getNumberImages();
        if (isset($_SESSION["id"])) {
            $user = $userManager->getUserInfo($_SESSION["id"]);
            $profileURL = $userManager->getProfilePicturePath($_SESSION["id"]);
            $salesManager = new SalesManager();
            $purchasedImages = $salesManager->getPurchasedImages(2147483647);
        }
        if ($nbToDisplay > 0) {
            $isThereImage = true;
            $nbToDisplay = (9 < $nbToDisplay) ? 9 : $nbToDisplay;
            // $oneCardInfo = $pictureObj->getSearchedImages();
            $homePageCardInfos = array();
            for ($i = 0; $i < count($image_ids); $i++) {
                $oneCardInfo = $pictureObj->getSmallImage($image_ids[$i]);
                array_push($homePageCardInfos, $oneCardInfo);
            }
        } else {
            $isThereImage = false;
        }
        require("./view/searchpage.php");
    } else {
        $homePageCardInfos = array();

        require("./view/searchpage.php");
    }
}

function photo($params)
{
    $pictureManager = new PictureManager();
    $photo = $pictureManager->getImage($params["photo-id"]);
    $salesManager = new SalesManager();
    $purchasedImages = $salesManager->getPurchasedImages(2147483647);


    require("./view/modalPhotoView.php");
}

function registerView()
{
    require("./view/register.php");
}

function registerAction($params)
{
    $userManager = new UserManager();
    $resigerResult = $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    if ($resigerResult) {
        header("Location:index.php?action=homepage&register=true");
    } else {
        header("Location:index.php?action=homepage&register=false");
    }
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
    $loginResult = $userManager->loginAction($params["emailLogin"], $params["pwdLogin"], $params["autoconnection"]);
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
    if (isset($_SESSION["id"])) {
        $user = $userManager->getUserInfo($_SESSION["id"]);
        $profileURL = $userManager->getProfilePicturePath($_SESSION["id"]);
        $salesManager = new SalesManager();
        $purchasedImages = $salesManager->getPurchasedImages(2147483647);
    }
    $requestedUser = $userManager->getUserInfo($params['requested_id']);
    $requestedUserProfileURL = $userManager->getProfilePicturePath($params['requested_id']);

    //Get images for this user
    $pictureManager = new PictureManager();
    if (isset($params['currUserLimit'])) {
        $currUserImages = $pictureManager->getImagesFromId($params["requested_id"], $params['currUserLimit']);
    } else {
        $currUserImages = $pictureManager->getImagesFromId($params["requested_id"]);
    }
    $currUserCardInfos = [];
    foreach ($currUserImages as $image) {
        array_push($currUserCardInfos, $pictureManager->getSmallImage($image["id"]));
    }

    require("./view/publicProfileView.php");
}

function privateProfView($params)
{
    if (isset($_SESSION["id"])) {
        // echo($_SESSION["id"]);
        // set the link variable to get the correct css files for the view private profile
        $link = '<link rel="stylesheet" href="./public/css/privateProfView.css">';
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
        $bookmarkManager = new BookmarkManager(); 
        // Array of picture IDs bookmarked by current user
        if (isset($params['currBookmarkLimit'])) {
            $bookmarkImages = $bookmarkManager->getBookmarkImages($params['currBookmarkLimit']);
        } else {
            $bookmarkImages = $bookmarkManager->getBookmarkImages();
        }
        $bookmarkCardInfos = [];
        foreach ($bookmarkImages as $image) {
            array_push($bookmarkCardInfos, $pictureManager->getSmallImage($image["picture_id"]));
        }

        $salesManager = new SalesManager();
        if (isset($params['currPurchasedLimit'])) {
            $purchasedImages = $salesManager->getPurchasedImages($params['currPurchasedLimit']);
        } else {
            $purchasedImages = $salesManager->getPurchasedImages();
        }

        $purchasedCardInfos = [];
        foreach ($purchasedImages as $image) {
            array_push($purchasedCardInfos, $pictureManager->getSmallImage($image["id_picture"]));
        }



        require("./view/privateProfView.php");
    } else {
        homepage();
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

    require("./view/modalPhotoEdit.php");
}

function submitPhotoEdit($params)
{
    $pictureManager = new PictureManager();
    $photo = $pictureManager->setImageInfo($params);

    privateProfView($params);
}

function addBookmark($params){
    $bookmarkMng = new BookmarkManager();
    $bookmarkMng->setBookmarkImage($params["picture_id"]);
}

function deleteBookmark($params){
    $bookmarkMng = new BookmarkManager();
    $bookmarkMng->deleteBookmarkImage($params["picture_id"]);
}
function purchase($params) {
    $userManager = new UserManager();
    $pictureManager = new PictureManager();

    if (!isset($_SESSION["id"])) {
    } else {
        $user = $userManager->getUserInfo($_SESSION["id"]);
        $photo = $pictureManager->getImage($params["photo-id"]);
        $userCredits = $user['balance'];
        $photoCredits = $photo['price'];

        if ($userCredits >= $photoCredits) {
            //direct to photo purchase page
            purchasePhoto($params);
        } else {
            require("./view/creditPurchaseView.php");
        }
    }
}

function purchaseCredits()
{
    require("./view/creditPurchaseView.php");
}

function submitPurchaseCredits($params)
{
    $userManager = new UserManager();
    $userManager->setCredits($_SESSION["id"], $_POST["credits"]);

    homepage();
}

function purchasePhoto($params)
{
    $pictureManager = new PictureManager();

    $photo = $pictureManager->getImage($params["photo-id"]);

    require("./view/modalPurchasePhotoView.php");
    // $userManager->setCredits($_SESSION["id"], $photoCredits * -1);
}

function purchasePhotoSubmit($params)
{
    $userManager = new UserManager();
    $pictureManager = new PictureManager();
    $salesManager = new SalesManager();

    $user = $userManager->getUserInfo($_SESSION["id"]);
    $photo = $pictureManager->getImage($params["photo-id"]);
    $userCredits = $user['balance'];
    $photoCredits = $photo['price'];

    $userManager->setCredits($_SESSION["id"], $photoCredits * -1);
    $userManager->setCredits($photo["userID"], $photoCredits);

    $salesManager->insertSale($user["id"], $photo["userID"], $photo);

    privateProfView($params);
}

function profileEdit($params)
{
    $userManager = new UserManager();
    $user = $userManager->getUserInfo($_SESSION["id"]);

    require("./view/modalProfileEdit.php");
}

function profileEditSubmit($params)
{
    $userManager = new UserManager();
    $userManager->setUserInfo($params);
    privateProfView($params);
}
