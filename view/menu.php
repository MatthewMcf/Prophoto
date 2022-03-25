<header>

    <?php
    if (isset($_SESSION["email"])) {
    ?>
    
    <!-- Logged In -->
    <div id="menuBar" class="loggedIn">
        <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="siteLogo"></div>
        <nav>
            <button class="btnPrimary">My Profile</button>
            <button class="btnSecondary">Logout</button>
        </nav>
    </div>



    <?php } else {        
    ?>

    <!-- Logged Out -->
    <div id="menuBar">
        <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="siteLogo"></div>
        <nav>
        <a href="index.php?action=loginView"><button class="btnPrimary">Log In</button><a>
            <a href="index.php?action=registerView"><button class="btnSecondary">Register</button></a>
        </nav>
    </div>



    <?php } ?>
</header>

