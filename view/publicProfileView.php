<?php //session_start();
// $_SESSION['userID'] = "5";
?>
<?php ob_start(); ?>
<link rel="stylesheet" href="./public/css/style.css">
<link rel="stylesheet" href="./public/css/privateProfView.css">
<script src="https://kit.fontawesome.com/86dc656e1f.js" crossorigin="anonymous"></script>

<section>
    <div id="profileHeader">
        <div>
            <div id="profilePic">
                <img src="<?=$requestedUserProfileURL?>" alt="profilePic" id="currProfilePic">
            </div>
        </div>
        <div id="profileInfo">
            <div>
                <p class="labelWidth"><strong>Name: </strong></p>
                <p class="inputWidth"><?=$requestedUser['display_name']?></p>
            </div>
            <div>
                <p class="labelWidth"><strong>Username: </strong></p>
                <p class="inputWidth"><?=$requestedUser['username']?></p>
            </div>
            <div>
                <p class="labelWidth"><strong>About Me: </strong></p>
                <p class="inputWidth"><?=$requestedUser['about_me']?></p>
            </div>
            <div>
                <p class="labelWidth"><strong>Contact: </strong></p>
                <p class="inputWidth"><?=$requestedUser['email']?></p>
            </div>
            <div id="socialMedia">
                <p class="labelWidth"><strong>Socials: </strong></p>
                <p class="inputWidth"><a href="https://www.<?php echo isset($requestedUser["website"]) ? $requestedUser["website"] : "website.com";?>" target="_blank"><i class="fa-solid fa-link"></i></a>
                    <a href="https://www.<?php echo isset($requestedUser["facebook"]) ? $requestedUser["facebook"] : "facebook.com";?>" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                    <a href="https://www.<?php echo isset($requestedUser["instagram"]) ? $requestedUser["instagram"] : "instagram.com";?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.<?php echo isset($requestedUser["linkedin"]) ? $requestedUser["linkedin"] : "linkedin.com";?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="yourPhotos">
            <div class="sectionHeader">
                <h2>Photos</h2>
            </div>
            <div id="sectionPhotosPublic">
                <?php foreach($currUserCardInfos as $card){
                    require('homePageCardView.php');
                }
                ?>
                <a href="index.php?action=publicProfView&requested_id=<?=$requestedUser["id"]?>&currUserLimit=<?php echo (isset($_REQUEST["currUserLimit"]) ? intval($_REQUEST["currUserLimit"]) + 10 : 10) ?>"><button id="showMoreCurrent">Show More Cards</button></a>

          </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="./public/js/script.js" defer></script>
<script type="text/javascript" src="./public/js/Modal.js" defer></script>
<!-- <script type="text/javascript" src="./public/js/card.js" defer></script> -->

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
