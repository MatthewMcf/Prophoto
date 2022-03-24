<?php ob_start(); ?>
<div>MAIN PAGE</div>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a href="#" onclick="signOut();">Sign out</a>


<!-- <img src="https://lh3.googleusercontent.com/a-/AOh14GjbJt2y7iNsyG6OK-MbnB3p3zrsZ-V3dD6aGXNor1k=s96-c" alt=""> -->
<script src="./public/js/googleLogin.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>