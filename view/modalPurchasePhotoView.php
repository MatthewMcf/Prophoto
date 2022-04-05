<h2>Photo Purchase</h2>
<form action="index.php?action=purchasePhotoSubmit" method="post">
<div>You are about to purchase</div>
<br>
<input type="hidden" name="photo-id" value="<?=$photo["id"]?>">
<img src="<?=$photo["path"]?>" alt="">
<div>Title: <?=$photo["title"] ?></div>
<div>Description: <?=$photo["description"] ?></div>
<div>Price: <?=$photo["price"] ?> Credits</div>
<br>
<div>Continue with the purchase and you will receive an email containing the link to download the photo</div>
<button type="submit" class="btnPrimary confirmPurchaseButton">Confirm Puchase</button>
</form>