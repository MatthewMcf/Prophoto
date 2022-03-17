<header>

    <?php $logged_in = TRUE;
    
    if ($logged_in) {
    ?>
    
    <!-- Logged In -->
    <div id="menu-bar" class="logged-in">
    <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="site-logo"></div>
    <h1>Pro Photo</h1>
    <nav>
        <li>My Profile</li>
        <li>Log Out</li>
    </nav>
    </div>



    <?php } else {        
    ?>

    <!-- Logged Out -->
    <div id="menu-bar">
    <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="site-logo"></div>
    <h1>Pro Photo</h1>
    <nav>
        <li>Register</li>
        <li>Log In</li>
    </nav>
    </div>



    <?php } ?>
</header>

