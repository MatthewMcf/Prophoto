<?php //ob_start(); ?>
<div class="imageContainer">
    <img src="<?= $photo["path"] ?>" alt="picture">
</div>

<div class="imageInfo">
    <div class="leftContainer">
        <div class="photographerInfo">
            <div id="profilePicure">
            <a href="<?=(!empty($_SESSION["id"]) && $_SESSION["id"]==$photo["userID"])? "index.php?action=privateProfView": "index.php?action=publicProfView&requested_id=".$photo["userID"]?>"><img class="icon" src="<?= $photo["profilePicture"] ?>" alt="profile picture"></a>
            </div>
            <div id="photographerName">
                <a href="<?=(!empty($_SESSION["id"]) && $_SESSION["id"]==$photo["userID"])? "index.php?action=privateProfView": "index.php?action=publicProfView&requested_id=".$photo["userID"]?>"><?=$photo["username"]?></a> 
            </div>
        </div>
        <div id="descriptorContainer">
            <div id="imageTitle">Title: <?= $photo["title"] ?></div>
            <div id="imageDescription">Description: <?= $photo["description"] ?></div>
        </div>
    </div>

    <div class="rightContainer">
        <div id="purchaseContainer">
            <div id="imagePrice"><?= $photo["price"] ?> Credits</div>
            <?php if (empty($_SESSION["id"])) { ?>
                <div class="purchase">
                <button class="btnPrimary loginButtonModal" image-id=<?=$photo["id"]?>>purchase</button> 
                </div>
<?php } else if ($photo["userID"] == $_SESSION["id"] || array_search($photo["id"], array_column($purchasedImages, 'picture_id')) !== FALSE) {
                $originalPath = str_replace("medium","original",$photo["path"]);?>
                <div class="purchase">
                <a href=<?=$originalPath?> download><button class="btnPrimary" id="startDownload">Download</button></a>
                </div>
                <?php } else { ?>
                <div class="purchase">
                <button class="btnPrimary purchaseButtonModal" image-id=<?=$photo["id"]?>>purchase</button> 
                </div>
            <?php } ?>
        </div>
    </div>

</div>

<?php //$content = ob_get_clean(); ?>
<?php //require('template.php'); ?>

