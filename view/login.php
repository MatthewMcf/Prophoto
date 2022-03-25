<link rel="stylesheet" href="./public/css/loginView.css">
<?php ob_start(); ?>
<section>
    <div id="heading">
        <div id="logoWrapper">
            <!-- logo here -->
            <img src="" alt="">
        </div>
        <h1>PhotoPro</h1>
        <p>slogan here</p>
    </div>
    <form action="index.php" method="post" id="loginForm">
        <input type="hidden" name="action" value="loginAction">
        <ul>
            <li>
                <!-- Continue with Google button here -->
            </li>
            <li id="or">
                <p>or</p>
            </li>
            <li>
                <input type="text" name="email" id="email" placeholder=" Email">
            </li>
            <li>
                <input type="password" name="pwd" id="pwd" placeholder=" Password">
            </li>
            <li id="loginFalse">
                <?php if(isset($_REQUEST["login"]) AND $_REQUEST["login"] == "false") echo "Your email and password do not match our data"; ?>
            </li>
            <li>
                <input type="submit" value="Log in" name="login" id="login">
            </li>
            <li>
                <label for="autoconnection">
                    <input type="checkbox" name="autoconnection" id="autoconnection" value="autoconnection">Remember me for 30 days
                </label>
            </li>
        </ul>
    </form>
    <div id="switch">
        <p>Don't have an account?</p>
        <form action="index.php" method="post" id="registrationForm">
            <input type="hidden" name="action" value="registerView">
            <input type="submit" value="Register now" name="register" id="register">
        </form>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>