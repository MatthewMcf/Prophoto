<?php
require('./controller/controller.php');

try {
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;

    switch ($action) {
        case 'homepage':
            homepage();
            break;
            // if the action is googleUser
        case 'googleUser':
            if (!empty($_POST['google_token']) && !empty($_POST['email']) && !empty($_POST['profile_url'])) {
                insertUser($_POST);
            } else {
                throw new ErrorException('Impossible to add a user please try again');
            }
            break;
        default:
            homepage();
            break;
    }
} catch (Exception $e) {
    require('./view/exceptionView.php');
}
