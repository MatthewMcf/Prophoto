<?php
require_once('Manager.php');

session_start();

if ((isset($_REQUEST['userName']) and (isset($_REQUEST['email'])))) {

    $userName = (empty($_REQUEST['userName'])) ? $_SESSION['userName'] : $_REQUEST['userName'];
    $pwd = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
    $req = $this->_connection->prepare('SELECT id,userName, email FROM users WHERE userName = :userName');
    $req->execute(array(
        'userName' => $userName,
    ));
    $user = $req->fetch();

    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    if (($user and isset($_SESSION['id']))) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['email'] = $user['email'];

        include("disconnect.php");
        // havent made this sign out page yet, just a button that destroys the session
    } else {
        // return homepage?
    }
} else {
    // return to log in?
}
