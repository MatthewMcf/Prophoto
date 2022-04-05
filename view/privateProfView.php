<?php //session_start();
?>
<?php ob_start(); ?>
<section>
    <div id="profileHeader">
        <div id="profilePic">
            <label class="-label" for="file">
                <span>Click here to update</span>
                <span>your picture</span>
            </label>
            <?php $src = $profileURL ?>
            <img src=<?php echo ($src  . '?=' . rand()) ?> alt="profilePic" id="currProfilePic" />
        </div>
        <div id="profileInfo">
            <div>
                <p class="labelWidth"><strong>Name: </strong></p>
                <p class="inputWidth"><?= $user['display_name']; ?></p>
            </div>

            <div>
                <p class="labelWidth"><strong>Username: </strong></p>
                <p class="inputWidth"><?= $user['username']; ?></p>
            </div>

            <div>
                <p class="labelWidth"><strong>About Me: </strong></p>
                <p class="inputWidth">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas earum in commodi magni facilis! Soluta, perferendis ipsam possimus maiores fuga similique ducimus obcaecati laboriosam? Veniam consequatur harum repudiandae laboriosam deserunt. Fifteen More!!</p>
            </div>

            <div>
                <p class="labelWidth"><strong>Contact: </strong></p>
                <p class="inputWidth"><?= $user['email']; ?></p>
            </div>
            <div id="socialMedia">
                <p class="labelWidth"><strong>Socials: </strong></p>
                <p class="inputWidth"><a href="http://mywebsite.com" target="_blank"><i class="fa-solid fa-link"></i></a>
                    <a href="http://facebook.com" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                    <a href="http://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="http://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </p>
            </div>
            <button id="editProfileInfo" class="btnHollowSecondary">Edit your details</button>
        </div>
    </div>
    <div>
        <div class="yourPhotos uploaded">
            <div class="sectionHeader">
                <h2>Your Uploaded Images</h2>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="sectionPhotos" id="yourPhotosSection">
                <div class="cardContainer">
                    <div id="addPicture">
                        <div>
                            <i class="fa-solid fa-plus"></i>
                            <p>Upload a Photo</p>
                        </div>
                    </div>
                </div>
                <?php foreach ($currUserCardInfos as $card) {
                    require('cardView.php');
                }
                ?>
                <!-- <div class="cardContainer">
                    <div class="cardContent">
                        <button class="price">2 Credits</button>
                        <div>
                            <button class="editPic btnHollowSecondary">Edit</button>
                        </div>
                    </div>
                </div> -->
                <a href="index.php?action=privateProfView&currUserLimit=<?php echo (isset($_REQUEST["currUserLimit"]) ? intval($_REQUEST["currUserLimit"]) + 10 : 5) ?>"><button id="showMoreCurrent">Show More Cards</button></a>
            </div>
        </div>
        <div class="yourPhotos liked">
            <div class="sectionHeader">
                <h2>Your Saved Images</h2>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="sectionPhotos">
            <?php foreach ($bookmarkCardInfos as $card) {
                require('homePageCardView.php');
            }
            ?>
            <a href="index.php?action=privateProfView&currBookmarkLimit=<?php echo (isset($_REQUEST["currBookmarkLimit"]) ? intval($_REQUEST["currBookmarkLimit"]) + 10 : 5) ?>"><button id="showMoreCurrent">Show More Cards</button></a>
            </div>
        </div>
        <div class="yourPhotos purchased">
            <div class="sectionHeader">
                <h2>Your Purchased Images</h2>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="sectionPhotos">
            <?php foreach ($purchasedCardInfos as $card) {
                require('homePageCardView.php');
            }
            ?>
            <a href="index.php?action=privateProfView&currPurchasedLimit=<?php echo (isset($_REQUEST["currPurchasedLimit"]) ? intval($_REQUEST["currPurchasedLimit"]) + 10 : 5) ?>"><button id="showMoreCurrent">Show More Cards</button></a>

            </div>
        </div>
    </div>
</section>
<?php
$modalScript = "<script src='public/js/Modal.js' defer></script>";
echo $modalScript;
?>
<script type="text/javascript" src="./public/js/privateProfPic.js"></script>
<script type="text/javascript" src="./public/js/modalPhotoEdit.js"></script>
<script type="text/javascript" src="./public/js/card.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
