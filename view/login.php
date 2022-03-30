<?php $link = "<link rel='stylesheet' href='./public/css/loginView.css'>" ?>
<section>
    <div id="heading">
        <!--<div id="logoWrapper">
             logo here 
            <img src="" alt="">
        </div>-->
        <h1>PhotoPro</h1>
        <p>slogan here</p>
    </div>
    <div id="googleWrapperLogin">
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
    <form action="index.php" method="post" class="loginForm">
        <input type="hidden" name="action" value="loginAction">
        <ul>
            
            <li class="or">
                <p>or</p>
            </li>
            <li>
                <input type="text" name="emailLogin" id="emailLogin" placeholder=" Email">
            </li>
            <li>
                <input type="password" name="pwdLogin" id="pwdLogin" placeholder=" Password">
            </li>
            <?php if(isset($_REQUEST["login"]) AND $_REQUEST["login"] == "false"){ ?>
            <li class="loginFalse">
                <p>"Your email and password do not match our data";</p>
            </li>
            <?php } ?>
            <li>
                <input type="submit" value="Log in" name="login" class="login">
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
        <form action="index.php" method="post" class="registrationForm">
            <input type="hidden" name="action" value="homepage">
            <input type="submit" value="Register Now" name="register" id="registerLogin">
        </form>
    </div>
</section>