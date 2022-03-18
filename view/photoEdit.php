<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="phototable" method="post">
        <fieldset>
            <legend> Edit </legend>

            <p>All fields marked with * are required</p>
            <br>
            <label for="title">*Title: </label>
            <input type="text" name="title" id="title" maxlength="255">
            <br><br>
            <label for="description">Description: </label>
            <textarea name="description" id="description" cols="30" rows="5" maxlength="255"></textarea>
            <br><br>
            <label for="tags">Tags: </label>
            <input type="checkbox" name="nature" id="tagNature">
            <label for="tagNature">Nature</label>
            <input type="checkbox" name="city" id="tagCity">
            <label for="tagCity">City</label>
            <input type="checkbox" name="landscape" id="tagLandscape">
            <label for="tagLandscape">Landscape</label>
            <input type="checkbox" name="portrait" id="tagPortrait">
            <label for="tagPortrait">Portrait</label>
            <br><br>
            <label for="price">*Price: </label>
            $ <input type="number" name="price" id="price" min=5.00 step="0.01" value=5.00>
            <br><br>
            <button type="submit">Save</button>
            <button>Cancel</button>
        </fieldset>
    </form>
</body>

</html>

<!-- title (mandatory) 255 char -->
<!-- description (optional) 255 char -->
<!-- tags (optional) -->
<!-- price (mandatory) -->