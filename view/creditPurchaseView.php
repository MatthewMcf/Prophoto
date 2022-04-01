<!-- <div class="modalSection"> -->
<?php //session_start();
?>
<?php ob_start(); ?>
<!-- Can't have this in body -->
<!-- <body onload="createYearOptions()"> -->
<link rel="stylesheet" href="../public/css/style.css">
<link rel="stylesheet" href="../public/css/creditPurch.css">
<section>
    <h1>Purchase credits</h1>

    <form action="connection.php" method="post" id="form" class="form">
        <div class="inputContainer">
            <label for="credits">Amount of credits</label>
            <p>1 credit costs $5</p>
            <select name="credits" id="credits">
                <option value="0" selected="true" disabled="disabled">Choose an amount</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
            <small>Error message</small>
            <h3 id="totalCost"></h3>
        </div>

        <div class="inputContainer">
            <label for="cardHoldersName">Card holders name</label>
            <input type="text" placeholder="Card holders name" id="cardHoldersName">
            <small>Error message</small>
        </div>

        <div class="inputContainer">
            <label for="cardNumber">Card number</label>
            <input type="number" placeholder="1234 1234 1234 1234" id="cardNumber">
            <small>Error message</small>
        </div>

        <div class="inputContainer">
            <label> Expiry MM/YY: </label>
            <select id="expiryMonth">
                <option selected value="0"> Month </option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <select id="expiryYear">       
            </select>
            <small>Error message</small>
        </div>

        <div class="inputContainer">
            <label for="securityCode">Security code</label>
            <input type="number" placeholder="123" id="securityCode">
            <small>Error message</small>
        </div>

        <button class="btnPrimary">Buy now</button>
    </form>	
</section>
<script type="text/javascript" src="../public/js/creditPurchase.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

