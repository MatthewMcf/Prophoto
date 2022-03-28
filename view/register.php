
<link rel="stylesheet" href="./public/css/registerView.css">

<?php ob_start(); ?>
<section>
    <div id="heading">
        <div id="logoWrapper">
            <!-- logo here -->
            <img src="" alt="">
        </div>
    </div>
    <div>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
    <form action="index.php" method="post" id="registrationForm">
        <input type="hidden" name="action" value="registerAction">
        <ul>
            <li id="or">
                <p>or</p>
            </li>
            <li>
                <input type="text" name="email" id="email" placeholder=" Email">
                <span></span>
            </li>
            <li>
                <input type="password" name="pwd" id="pwd" placeholder=" Password">
                <span></span>
            </li>
            <li>
                <input type="password" name="pwdRe" id="pwdRe" placeholder=" Confirm Password">
                <span></span>
            </li>
            <li>
                <input type="text" name="username" id="username" placeholder=" Username">
                <span></span>
            </li>
            <li>
                <input type="submit" value="Continue" name="continue" id="continue">
            </li>
        </ul>
    </form>
    <div id="switch">
        <p id="agree">By creating an account, you are agreeing to our Terms of Service and Privacy Policy</p>
        <p>Already have an account?</p>
        <form action="index.php" method="post" id="loginForm">
            <input type="hidden" name="action" value="loginView">
            <input type="submit" value="Log in" name="login" id="login">
        </form>
    </div>
</section>
<script type="text/javascript" src="./public/js/registerView.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>