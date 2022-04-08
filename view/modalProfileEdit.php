    <script src="https://kit.fontawesome.com/86dc656e1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/modalProfileEdit.css">
    <form action="index.php?action=profileEditSubmit" method="post">
        <div id="formFlex">
            <section id="leftSection">
                <h2>Personal Details</h2>
                <p>Your personal details will be published to your profile view. Please only provide information that you want shared.</p>
                <label for="name" class="label">Name </label><br>
                <input type="text" name="name" id="name" maxlength="255" value="<?php echo isset($user["display_name"]) ? $user["display_name"] : "Name";  ?>">
                <br>
                <label for="aboutMe" class="label">About Me </label><br>
                <textarea name="aboutMe" id="aboutMe" cols="30" rows="10"><?php echo isset($user["about_me"]) ? $user["about_me"] : "Max 255 Characters";  ?></textarea>
                <br>
                <label for="website" class="label">Website </label><i class="fa-solid fa-link"></i><br>
                <input type="text" name="website" id="website" maxlength="255" value="<?php echo isset($user["website"]) ? $user["website"] : "website.com";  ?>">
                <br>
                <label for="findMe" class="label">Facebook </label><i class="fa-brands fa-facebook-square"></i><br>
                <input type="text" name="facebook" id="findMe" maxlength="255" value="<?php echo isset($user["facebook"]) ? $user["facebook"] : "facebook.com/";  ?>">
                <br>
                <label for="findMe" class="label">Instagram </label><i class="fa-brands fa-instagram"></i><br>
                <input type="text" name="instagram" id="findMe" maxlength="255" value="<?php echo isset($user["instagram"]) ? $user["instagram"] : "instagram.com/";  ?>">
                <br>
                <label for="findMe" class="label">LinkedIn </label><i class="fa-brands fa-linkedin"></i><br>
                <input type="text" name="linkedin" id="findMe" maxlength="255" value="<?php echo isset($user["linkedin"]) ? $user["linkedin"] : "linkedin.com/";  ?>">
            </section>
            <section id="rightSection">
                <h2>Bank Account</h2>
                <p>Please provide bank account information to receive your payments.</p>
                <label for="bankName" class="label">Account Holder Name </label><br>
                <input type="text" name="bankName" id="bankName" maxlength="255" placeholder="Account Holder Name">
                <br>
                <label for="bankNumber" class="label">Account Number </label><br>
                <input type="text" name="bankNumber" id="bankNumber" maxlength="255" placeholder="Ex: 12345678">
                <br>
                <label for="bankCode" class="label">Routing Number </label><br>
                <input type="text" name="bankCode" id="bankCode" maxlength="9" placeholder="Ex: 123456789">
                <p>*proPhoto has a 30% commission rate upon each sale</p>
            </section>
        </div>
        <br><br>
        <!-- submit button will save and return to privateProfView.php -->
        <button type="submit" class="btnPrimary">Save</button>
    </form>
    <script type="text/javascript" src="../public/js/modalPhotoEdit.js"></script>