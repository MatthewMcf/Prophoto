<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="82482920284-rrsq19aer1knnnvr2fskn5gc99crldj2.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>ProPhoto</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <?php if (!isset($link)) {
        $link = '';
    } ?>
    <?= $link; ?>
</head>

<body>
    <?php require('menu.php'); ?>
    <main>
        <?= $content; ?>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>