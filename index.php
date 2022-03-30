<?php
require('./controller/controller.php');

try {
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;

    switch ($action) {
        case 'homepage':
            homepage();
            break;
        case 'photo':
            photo();
            break;
        case "registerView" :
            registerView();
            break;
        case "registerAction" :
            registerAction($_REQUEST);
            break;
        case 'googleUser':
            if (!empty($_POST['google_token']) && !empty($_POST['email']) && !empty($_POST['profile_url'])) {
                insertUser($_POST);
            } else {
                throw new ErrorException('Impossible to add a user please try again');
            }
            break;
        case "loginView" :
            loginView($_REQUEST);
            break;
        case "loginAction" :
            loginAction($_REQUEST);
            break;
        case "privateProfView":
            privateProfView($_REQUEST);
            break;
        case "logoutAction":
            logoutAction($_REQUEST);
            break;
        default :
            homepage();
            break;
    }
} catch (Exception $e) {
    require('./view/exceptionView.php');
}
