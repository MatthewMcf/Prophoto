<!-- <link rel='stylesheet' href='./public/css/registerAndLogin.css'> -->
<div class="sectionWrapper">
    <section class="sectionLeft" id="loginSectionLeft">
    </section>
    <section class="sectionRight" id="loginSectionRight">
        <div class="heading">
            <h2>Log in</h2>
        </div>
        <form action="index.php" method="post" class="loginForm">
            <input type="hidden" name="action" value="loginAction">
            <ul>
                <li>
                    <label for="emailLogin">Email*</label>
                    <input type="text" name="emailLogin" id="emailLogin" placeholder=" Email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>">
                </li>
                <li>
                    <label for="pwdLogin">Password*</label>
                    <input type="password" name="pwdLogin" id="pwdLogin" placeholder=" Password">
                </li>
                <?php if(isset($_REQUEST["login"]) AND $_REQUEST["login"] == "false"){ ?>
                <li class="loginFalse">
                    <p>Your email and password do not match our data</p>
                </li>
                <?php } ?>
                <li>
                    <input type="submit" value="Log in" name="login" id="inputLogin" class="btnPrimary">
                </li>
                <li>
                    <input type="checkbox" name="autoconnection" id="autoconnection" value="autoconnection" <?php if(isset($_COOKIE['email'])){ echo "checked='true'"; } ?>>Remember me for 30 days
                </li>
            </ul>
        </form>
        <div class="line">
            <hr class="longline"><span>or</span><hr class="longline">
        </div>
        <div id="googleWrapperLogin">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </div>
        <div class="switch">
            <p>Don't have an account?</p>
            <a href="#" onclick="return false;" id="registerLogin">Register Now</a>
        </div>
    </section>
</div>