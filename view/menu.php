<header>

    <?php $logged_in = TRUE;
    
    if ($logged_in) {
    ?>
    
    <!-- Logged In -->
    <div id="menu-bar" class="logged-in">
    <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="site-logo"></div>
    <h1>Pro Photo</h1>
    <nav>
        <li><a href="#">My Profile</a></li>
        <li><a href="#">Log Out</a></li>
    </nav>
    </div>



    <?php } else {        
    ?>

    <!-- Logged Out -->
    <div id="menu-bar">
    <div><img src="./public/images/ProPhoto.png" alt="Pro Photo Logo" id="site-logo"></div>
    <h1>Pro Photo</h1>
    <nav>
        <li><a href="">Register</a></li>
        <li><a href="">Log In</a></li>
    </nav>
    </div>



    <?php } ?>
</header>

