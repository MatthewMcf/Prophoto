<header>

    <?php
    if (isset($_SESSION["email"])) {
    ?>
    
    <!-- Logged In -->
    <div id="menuBar" class="loggedIn">
        <div><a href="index.php?action=homepage"><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="siteLogo"></a></div>
        <nav>
            <a href="index.php?action=privateProfView"><button class="btnPrimary">My Profile</button></a>
            <a href="index.php?action=logoutAction"><button class="btnSecondary" id="logout">Logout</button></a>
        </nav>
    </div>

    <?php } else {        
    ?>

    <!-- Logged Out -->
    <div id="menuBar">
        <div><a href="index.php?action=homepage"><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="siteLogo"></a></div>
        <nav>
            <button class="btnPrimary" id="login">Log In</button>
            <button class="btnSecondary" id="register">Register</button>
        </nav>
    </div>
    <?php if(isset($_REQUEST["register"]) AND $_REQUEST["register"] === "true"): ?>
        <script>
            let registerTrue = document.createElement("span");
            registerTrue.id = "registerTrue";
            document.querySelector("#menuBar nav").appendChild(registerTrue);
        </script>
    <?php endif; ?>
    <?php if(isset($_REQUEST["login"]) AND $_REQUEST["login"] === "false"): ?>
        <script>
            let loginFalse = document.createElement("span"); 
            loginFalse.id = "loginFalse";
            document.querySelector("#menuBar nav").appendChild(loginFalse);
        </script>
    <?php endif; ?>
    <?php } ?>
</header>

