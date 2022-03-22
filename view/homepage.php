<?php ob_start(); ?>
<div>MAIN PAGE</div>
<div>
    <img id="test" src="public/images/default_profile_picture.png" alt="profile pic">
</div>
<script src="public/js/Modal.js"></script>
<script src="public/js/script.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>