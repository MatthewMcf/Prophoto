<?php
    $link = "<link rel='stylesheet' href='./public/css/registerAndLogin.css'>";
    echo $link;
?>
<!-- <link rel='stylesheet' href='./public/css/registerAndLogin.css'> -->
<div class="sectionWrapper">
    <section class="sectionLeft" id="registerSectionLeft">
    </section>
    <section class="sectionRight" id="registerSectionRight">
        <div class="heading">
            <h2>Register</h2>
        </div>
        <form action="index.php" method="post" class="registrationForm">
            <input type="hidden" name="action" value="registerAction">
            <ul>
                <li>
                    <label for="email">Email*</label>
                    <input type="text" name="email" id="email" placeholder=" Email">
                    <span></span>
                </li>
                <?php if(isset($_REQUEST["register"]) AND $_REQUEST["register"] == "false"){ ?>
                <li class="registerFalse">
                    <p>This email address is already taken</p>
                </li>
                <?php } ?>
                <li>
                    <label for="pwd">Password*</label>
                    <input type="password" name="pwd" id="pwd" placeholder=" Password">
                    <span></span>
                </li>
                <li>
                    <label for="pwdRe">Confirm Password*</label>
                    <input type="password" name="pwdRe" id="pwdRe" placeholder=" Confirm Password">
                    <span></span>
                </li>
                <li>
                    <label for="username">Username*</label>
                    <input type="text" name="username" id="username" placeholder=" Username">
                    <span></span>
                </li>
                <li>
                    <input type="submit" value="Register" name="register" id="inputRegister" class="btnPrimary">
                </li>
            </ul>
        </form>
        <p class="agree">By creating an account, you are agreeing to our Terms of Service and Privacy Policy</p>
        <div class="line">
            <hr class="longline"><span>or</span><hr class="longline">
        </div>
        <div id="googleWrapperRegister">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </div>
        <div class="switch">
            <p>Already have an account?</p>
            <a href="#" onclick="return false;" id="loginRegister">Log in</a>
        </div>
    </section>
</div>