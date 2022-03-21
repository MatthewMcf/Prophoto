<?php ob_start(); ?>
<div>MAIN PAGE</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>