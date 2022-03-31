<form action="index.php?action=submitPhotoEdit&photo-id=<?= $photo["id"] ?>" method="post">
    <h2> Photo Edit </h2>
    <p id="asterisk">All fields marked with * are required</p>
    <label for="title">*Title: </label><br>
    <input type="text" name="title" id="title" maxlength="255" value="<?= $photo["title"] ?>">
    <br><br>
    <label for="description">Description: </label><br>
    <textarea name="description" id="description" cols="30" rows="5" maxlength="255"><?= $photo["description"] ?></textarea>
    <br><br>
    <label for="price">*Price: </label><br>
    <input type="number" name="price" id="price" min=5 step="1" value="<?= $photo["price"] ?>"> Credits
    <br><br>
    <label for="tags">Tags: </label><br>
    <input type="checkbox" name="nature" id="tagNature">
    <label for="tagNature">Nature</label>
    <input type="checkbox" name="city" id="tagCity">
    <label for="tagCity">City</label>
    <input type="checkbox" name="landscape" id="tagLandscape">
    <label for="tagLandscape">Landscape</label>
    <input type="checkbox" name="portrait" id="tagPortrait">
    <label for="tagPortrait">Portrait</label>
    <br><br>
    <!-- submit button will save and return to privateProfView.php -->
    <button type="submit" class="btnPrimary">Save</button>
</form>
<input type="button" id="delete" class="btnSecondary deleteButton" onclick="deleteExistingImage()" value="Delete">

<script type="text/javascript" src="../public/js/modalPhotoEdit.js"></script>