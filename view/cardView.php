<div class="cardContainer">
    <div class="cardContent" style="background-image: url(<?=$card["path"]?>)" image-id=<?=$card["id"]?>>
        <button class="price"><?=$card["price"] ? $card["price"] : "2"?> Credits</button>
        <div>
            <button class="editPic btnHollowSecondary" image-id=<?=$card["id"]?>><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
    </div>
</div>