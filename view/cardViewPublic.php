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
        <a href="">
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic"></div>
                <h4><?=$card["username"]?></h4>
            </div>
        </a>
        <div class="purchase">
            <button class="btnPrimary">Purchase</button>
        </div>
    </div>
</div>