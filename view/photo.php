<?php ob_start(); ?>
<div class="imageContainer">
    <img src="./public/images/default_profile_picture.png" alt="picture">
</div>

<div class="imageInfo">
    <div class="leftContainer">
        <div class="photographerInfo">
            <div id="profilePicure">
                <img class="icon" src="./public/images/default_profile_picture.png" alt="profile picture">
            </div>
            <div id="photographerName">
                <a href="#">Camila</a> 
            </div>
        </div>
        <div id="desciptorContainer">
            <div id="imageTitle">Title: Profile Picture</div>
            <div id="imageDescription">Description: This is a default profile picture</div>
        </div>
    </div>

    <div class="rightContainer">
        <div id="purchaseContainer">
            <div id="imagePrice">$5</div>
            <a href="#">Purchase</a>
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

