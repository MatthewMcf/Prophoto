<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/photoEdit.css">
    <title>Document</title>
</head>

<body>
    <section>
        <form action="phototable" method="post">
            <fieldset>
                <legend> Photo Edit </legend>

                <p id="asterisk"><strong>All fields marked with * are required</strong></p>
                <br>
                <label for="title" class="labelWidth">*Title: </label>
                <input type="text" name="title" id="title" maxlength="255">
                <br><br>
                <label for="description" class="labelWidth">Description: </label>
                <textarea name="description" id="description" cols="30" rows="5" maxlength="255"></textarea>
                <br><br>
                <label for="price" class="labelWidth">*Price: </label>
                <input type="number" name="price" id="price" min=5.00 step="0.01" value=5.00> USD
                <br><br>
                <label for="tags" class="labelWidth">Tags: </label>
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
                <!-- cancel button will return to privateProfView -->
                <button>Cancel</button>
            </fieldset>
        </form>
    </section>
    <script type="text/javascript" src="../public/js/photoEdit.js"></script>
</body>

</html>