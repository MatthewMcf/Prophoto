<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/modalPhotoEdit.css">
    <title>Document</title>
</head>

<body>
    <section>
        <form action="modalPhotoEdit.php" method="post">
            <fieldset>
                <legend> Photo Edit </legend>

                <p id="asterisk"><strong>All fields marked with * are required</strong></p>
                <br>
                <label for="title">*Title: </label><br>
                <input type="text" name="title" id="title" maxlength="255">
                <br><br>
                <label for="description">Description: </label><br>
                <textarea name="description" id="description" cols="30" rows="5" maxlength="255"></textarea>
                <br><br>
                <label for="price">*Price: </label><br>
                <input type="number" name="price" id="price" min=5.00 step="0.01" value=5.00> USD
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
                <button type="submit" id="save">Save</button>
            </fieldset>
        </form>
    </section>
    <script type="text/javascript" src="../public/js/modalPhotoEdit.js"></script>
</body>

</html>