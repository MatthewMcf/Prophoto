<?php //ob_start(); ?>
<div class="imageContainer">
    <img src="<?= $photo["path"] ?>" alt="picture">
</div>

<div class="imageInfo">
    <div class="leftContainer">
        <div class="photographerInfo">
            <div id="profilePicure">
            <a href="index.php?action=publicProfView&requested_id=<?=$photo["userID"]?>"><img class="icon" src="<?= $photo["profilePicture"] ?>" alt="profile picture"></a>
            </div>
            <div id="photographerName">
                <a href="index.php?action=publicProfView&requested_id=<?=$photo["userID"]?>"><?=$photo["username"]?></a> 
            </div>
        </div>
        <div id="descriptorContainer">
            <div id="imageTitle">Title: <?= $photo["title"] ?></div>
            <div id="imageDescription">Description:<?php $photo["description"] ?></div>
        </div>
    </div>

    <div class="rightContainer">
        <div id="purchaseContainer">
            <div id="imagePrice"><?= $photo["price"] ?> Credits</div>
            <button class="purchaseButton btnPrimary">Purchase</button>
        </div>
    </div>

</div>

<?php //$content = ob_get_clean(); ?>
<?php //require('template.php'); ?>

