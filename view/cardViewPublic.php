<div class="cardContainer">
    <div class="cardContent" style="background-image: url(<?=$card["path"]?>)" image-id=<?=$card["id"]?>>
        <button class="price"><?=$card["price"] ? $card["price"] : "2"?> Credits</button>
        <div class="likeContainer">
            <div class="likeSelected">
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>
    </div>
    <div class="cardInfo">
        <a href="?action=publicProfView&requested_id=<?=$card["userID"]?>&currUserLimit=5">
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic" style="background-image: url(<?=$requestedUserProfileURL?>)"></div>
                <h4><?=$card["username"]?></h4>
            </div>
        </a>
        <?php if (empty($_SESSION["id"])) { ?>
            <div class="purchase">
            <button class="btnPrimary loginButton" image-id=<?=$card["id"]?>>purchase</button> 
            </div>
        <?php } else if ($card["userID"] == $_SESSION["id"]) {
        } else { ?>
            <div class="purchase">
            <button class="btnPrimary purchaseButton" image-id=<?=$card["id"]?>>purchase</button> 
            </div>
        <?php } ?>
    </div>
</div>