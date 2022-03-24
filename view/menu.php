<header>

    <?php $logged_in = TRUE;
    
    if ($logged_in) {
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
            <button class="btnPrimary">Log In</button>
            <button class="btnSecondary">Register</button>
        </nav>
    </div>



    <?php } ?>
</header>

