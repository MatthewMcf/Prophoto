<header>

    <?php
    if (isset($_SESSION["email"])) {
    ?>
    
    <!-- Logged In -->
    <div id="menuBar" class="loggedIn">
        <div><a href="index.php?action=homepage"><img src="./public/images/ProPhotoLogo.png" alt="Pro Photo Logo" id="siteLogo"></a></div>
        <nav>
            <div id=navUserInfo>
                <a href="index.php?action=privateProfView&currUserLimit=5"><img src="<?= $profileURL ?>" alt="profile picture" class="profilePicIcon">
                <a href="index.php?action=privateProfView&currUserLimit=5"><?= $user['username'] ?></a>
            </div>
            <a href="#"> Credits</a>
            <a href="index.php?action=logoutAction"><button class="btnSecondary" id="logout">Logout</button></a>
        </nav>
    </div>

    <?php } else {        
    ?>

    <!-- Logged Out -->
    <div id="menuBar">
        <div><a href="index.php?action=homepage"><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="siteLogo"></a></div>
        <nav>
            <button class="btnPrimary" id="login" <?php if(isset($_COOKIE["email"])){
                echo "name='autoconnect' value={$_COOKIE['email']}";
                } ?>>Log In</button>
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
    <?php if(isset($_REQUEST["register"]) AND $_REQUEST["register"] === "false"): ?>
        <script>
            let registerFalse = document.createElement("span"); 
            registerFalse.id = "registerFalse";
            document.querySelector("#menuBar nav").appendChild(registerFalse);
        </script>
    <?php endif; ?>
    <?php if(isset($_REQUEST["login"]) AND $_REQUEST["login"] === "false"): ?>
        <script>
            let loginFalse = document.createElement("span"); 
            loginFalse.id = "loginFalse";
            document.querySelector("#menuBar nav").appendChild(loginFalse);
        </script>
    <?php endif; ?>
    <?php if(isset($_COOKIE["email"])): ?>
        <script>
            let autoconnectionTrue = document.createElement("span"); 
            autoconnectionTrue.id = "autoconnectionTrue";
            document.querySelector("#menuBar nav").appendChild(autoconnectionTrue);
        </script>
    <?php endif; ?>
    <?php } ?>
</header>

