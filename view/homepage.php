<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
?>
<?php ob_start(); ?>
<div>MAIN PAGE</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>