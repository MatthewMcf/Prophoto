<link rel="stylesheet" href="./public/css/modalPhotoEdit.css">
<form action="index.php?action=submitPhotoEdit&photo-id=<?= $photo["id"] ?>" method="post">
    <h2> Photo Edit </h2>
    <p id="asterisk">All fields marked with * are required</p>
    <label for="title">*Title: </label><br>
    <input type="text" name="title" id="title" maxlength="255" value="<?= $photo["title"] ?>">
    <br>
    <label for="description">Description: </label><br>
    <textarea name="description" id="description" cols="30" rows="5" maxlength="255"><?= $photo["description"] ?></textarea>
    <br><br>
    <label for="price">*Price (Credits): </label><br>
    <input type="number" name="price" id="price" min=5 step="1" value="<?= $photo["price"] ?>">
    <br><br>
    <label for="tags">Photo tags (separated by commas): </label><br>
    <input type="text" name="tags" id="tagsList" value="<?= $photo["tags"] ?>">
    <br><br>
    <!-- submit button will save and return to privateProfView.php -->
    <button type="submit" class="btnPrimary">Save</button>
</form>
<!-- <button" id="delete" class="btnSecondary deleteButton" onclick="deleteExistingImage(<?//= $photo['id'] ?>, <?//= $photo['userID'] ?> )"><i class="fa-solid fa-trash-can"></i></button> -->

<script type="text/javascript" src="./public/js/modalPhotoEdit.js"></script>