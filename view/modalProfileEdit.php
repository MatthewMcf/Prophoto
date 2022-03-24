    <script src="https://kit.fontawesome.com/86dc656e1f.js" crossorigin="anonymous"></script>
    <form action="modalProfileEdit.php" method="post">
        <h2> Profile Edit </h2>
        <label for="name" class="labelWidth">Name: </label><br>
        <input type="text" name="name" id="name" maxlength="255">
        <br><br>
        <label for="aboutMe" class="labelWidth">About Me: </label><br>
        <textarea name="aboutMe" id="aboutMe" cols="30" rows="10" placeholder="Max 255 characters"></textarea>
        <br><br>
        <label for="website" class="labelWidth">Website: </label><br>
        <i class="fa-solid fa-link"> <input type="text" name="website" id="website" maxlength="255"></i>
        <br><br>
        <label for="findMe" class="labelWidth">Find me on: </label><br>
        <i class="fa-brands fa-facebook-square"> <input type="text" name="facebook" id="findMe" maxlength="255" value="@"></i>
        <br>
        <span class="labelWidth"></span>
        <i class="fa-brands fa-instagram"> <input type="text" name="instagram" id="findMe" maxlength="255" value="@"></i>
        <br>
        <span class="labelWidth"></span>
        <i class="fa-brands fa-linkedin"> <input type="text" name="linkedin" id="findMe" maxlength="255" value="@"></i>
        <br><br>
        <!-- submit button will save and return to privateProfView.php -->
        <button type="submit" class="btnPrimary">Save</button>
    </form>
    <script type="text/javascript" src="../public/js/modalPhotoEdit.js"></script>