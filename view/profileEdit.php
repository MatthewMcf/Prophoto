<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/profileEdit.css">
    <script src="https://kit.fontawesome.com/86dc656e1f.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section>
        <form action="phototable" method="post">
            <fieldset>
                <legend> Profile Edit </legend>

                <br>
                <label for="name" class="labelWidth">Name: </label>
                <input type="text" name="name" id="name" maxlength="255">
                <br><br>
                <label for="aboutMe" class="labelWidth">About Me: </label>
                <textarea name="aboutMe" id="aboutMe" cols="30" rows="10" placeholder="Max 255 characters"></textarea>
                <br><br>
                <label for="email" class="labelWidth">E-mail: </label>
                <input type="email" name="email" id="email" maxlength="255">
                <br><br>
                <label for="website" class="labelWidth">Website: </label>
                <input type="text" name="website" id="website" maxlength="255">
                <br><br>
                <label for="findMe" class="labelWidth">Find me on: </label>
                <i class="fa-brands fa-facebook-square"></i> <input type="text" name="facebook" id="findMe" maxlength="255" value="@">
                <br>
                <span class="labelWidth"></span>
                <i class="fa-brands fa-instagram"></i> <input type="text" name="instagram" id="findMe" maxlength="255" value="@">
                <br>
                <span class="labelWidth"></span>
                <i class="fa-brands fa-linkedin"></i> <input type="text" name="linkedin" id="findMe" maxlength="255" value="@">
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