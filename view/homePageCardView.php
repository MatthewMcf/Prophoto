<div class="cardContainer">
    <div class="cardContent photoCard" style="background-image: url(<?=$card["path"]?>)" image-id=<?=$card["id"]?>>
        <button class="price"><?=$card["price"] ? $card["price"] : "2"?> Credits</button>
        <div class="likeContainer">
        <div onclick="changeValueBookmark(this.id,this.className);event.stopPropagation();" class=<?= ($card["bookmarkByCurr"])? "likeSelected": "likeUnselected"?> id=<?= $card["id"]?> >
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>
    </div>
    <div class="cardInfo">
    <a href=<?=(!empty($_SESSION["id"]) && $_SESSION["id"]==$card["userID"])? "index.php?action=privateProfView": "index.php?action=publicProfView&requested_id=".$card["userID"]?> >
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic" style="background-image: url(<?=$card["profilePicture"]?>)" ></div>
                <h4><?=$card["username"]?></h4>
            </div>
        </a>
        <?php if (empty($_SESSION["id"])) { ?>
            <div class="purchase">
            <button class="btnPrimary loginButton" image-id=<?=$card["id"]?>>purchase</button> 
            </div>
        <?php } else if ($card["userID"] == $_SESSION["id"] || array_search($card["id"], array_column($purchasedImages, 'id_picture')) !== FALSE) {
        } else { ?>
            <div class="purchase">
            <button class="btnPrimary purchaseButton" image-id=<?=$card["id"]?>>purchase</button> 
            </div>
        <?php } ?>
        
    </div>

</div>
