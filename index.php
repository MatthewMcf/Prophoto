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
            print_r ($_POST);
            if (!empty($_POST['google_token']) && !empty($_POST['email']) && !empty($_POST['profile_url'])) {
                insertUser($_POST);
            } else {
                throw new ErrorException('Impossible to add a user please try again');
            }
            break;
        case "loginView" :
            loginView();
            break;
        case "loginAction" :
            loginAction($_REQUEST);
            break;
        default :
            homepage();
            break;
    }
} catch (Exception $e) {
    require('./view/exceptionView.php');
}
