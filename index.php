<?php
require('./controller/controller.php');

try{
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;
    
    switch($action){
        case 'homepage':
            homepage();
            break;
        case "registerView" :
            registerView();
            break;
        case "registerAction" :
            registerAction($_REQUEST);
            break;
        default :
            homepage();
            break;
    }
} catch (Exception $e) {
    require('./view/exceptionView.php');
}