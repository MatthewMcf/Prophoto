<?php ob_start(); ?>
<div>MAIN PAGE</div>
<script src="./public/js/Modal.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>