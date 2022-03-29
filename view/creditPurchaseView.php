<?php //ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/creditPurchase.css">
    <script
			src="https://kit.fontawesome.com/68fcd009c8.js"
			crossorigin="anonymous"
		></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Purchase credits</h1>
        <!-- <form id="form" action="/" method="GET">

            <div class="inputContainer">

                <h4>How many credits would you like to buy? Each credit costs $5</h4>
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
                
                <h3 id="totalCost"></h3>
            
                <label for="cardholdersName">Cardholders name</label>
                <input
                    type="text"
                    class="input"
                    name="cardholdersName"
                    id="cardholdersName"
                    placeholder="Cardholders name"
                />
                <div id="errorCardholdersName"></div>

                <label for="cardNumber">Card number</label>
                <input
                    type="number"
                    class="input"
                    name="cardNumber"
                    id="cardNumber"
                    placeholder="Card number"
                    size="16"
                />
                <div id="errorCardNumber"></div> -->
                <!-- <span id="error"></span> -->

                <!-- <button class="btnPrimary" type="submit">Pay now</button> -->

            <!-- </div>
        </form>  -->

    <form id="form" class="form">

        <h4>How many credits would you like to buy? Each credit costs $5</h4>
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
        
        <h3 id="totalCost"></h3>

		<div class="inputContainer">
			<label for="cardHoldersName">Card holders name</label>
			<input type="text" placeholder="Card holders name" id="cardHoldersName" />
			<small>Error message</small>
		</div>
		<div class="inputContainer">
			<label for="cardNumber">Card number</label>
			<input type="number" placeholder="1234 1234 1234 1234" id="cardNumber" />
			<small>Error message</small>
		</div>
		<select name="year" id="year">
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="4"></option>
            <option value="5"></option>
            <option value="6"></option>
            <option value="7"></option>
            <option value="8"></option>
            <option value="9"></option>
            <option value="10"></option>
        </select>           
		<button>Submit</button>
	</form>




    </div>

    <script>

    const form = document.getElementById('form');
    const cardHoldersName = document.getElementById('cardHoldersName');
    const cardNumber = document.getElementById('cardNumber');
   

    // Get date and time for card experation
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    console.log(date);

    form.addEventListener('submit', e => {
        e.preventDefault();
        
        checkInputs();
    });

    function checkInputs() {
        // trim to remove the whitespaces
        // const cardNumberValue = cardNumber.value;
        const cardHoldersNameValue = cardHoldersName.value.trim();
        const cardNumberValue = cardNumber.value.trim();

        // Cardholder's name error condition
        if(cardHoldersNameValue === '') {
            setErrorFor(cardHoldersName, 'Card holders name cannot be blank');
        } else {
            setSuccessFor(cardHoldersName);
        }

        // Card number error condition
        if(cardNumberValue === '') {
            setErrorFor(cardNumber, 'Card holders name cannot be blank');
        } else if (cardNumber.value.length < 15) {
            setErrorFor(cardNumber, 'Card number can not be less than 15 numbers');
        } else if (cardNumber.value.length > 16) {
            setErrorFor(cardNumber, 'Card number can not be more than 16 numbers');
        } else {
            setSuccessFor(cardNumber);
        }   
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = 'form-control error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }
        
    // Selecting the amount of tokens
    function selectCreditAmount () {
        const creditCost = 5;
        const select = document.querySelector("select");
        let totalAmount = document.querySelector("#totalAmount");
        let numbOfCredits = document.querySelector("#numbOfCredits");
        let totalCost = document.querySelector("#totalCost");

        select.addEventListener('change', () => {       
            numbOfCredits = select.value;
            totalAmount = select.value * creditCost;  
            totalCost.textContent = `Total cost of ${numbOfCredits} credits : $${totalAmount}`;

            return totalAmount;
        });
    }

    selectCreditAmount ();
    
    // console.log(totalAmount);


















    // const cardholdersName = document.getElementById('cardholdersName');
    // const cardNumber = document.getElementById('cardNumber');
    // const form = document.getElementById('form');
    // const errorCardholdersName = document.getElementById('errorCardholdersName');
    // const errorCardNumber = document.getElementById('errorCardNumber');

    // form.addEventListener('submit', (e) => {
    //     let cardholdersNameMessages = [];
    //     let cardNumberMessages = [];

    //     // Card holders name
    //     if (cardholdersName.value === '' || cardholdersName.value == null) {
    //         cardholdersNameMessages.push('You must enter the cardholders name');
    //     }

    //     // Card number
    //     if (cardNumber.value === '' || cardNumber.value == null) {
    //         cardNumberMessages.push('You must enter the card number');
    //     } 

    //     if (cardNumber.value.length < 15) {
    //         cardNumberMessages.push('Card number must be at least 15 numbers');
    //     }

    //     if (cardNumber.value.length >= 16) {
    //         cardNumberMessages.push('Card number must have a maximum of 16 numbers');
    //     }

    //     // Submit payment
    //     if (cardNumberMessages.length > 0) {
    //         e.preventDefault();
    //         errorCardholdersName.innerText = cardholdersNameMessages.join(', ');
    //         errorCardNumber.innerText = cardNumberMessages.join(', ');
    //     }
        
    // })


    //     const submit = document.getElementById("submit");

    //     submit.addEventListener("click", validate);

    //     function validate(e) {
    //     e.preventDefault();

    //     const firstNameField = document.getElementById("firstname");
    //     const firstNameLabel = document.getElementById("firstname-label");

    //     const lastNameField = document.getElementById("lastname");
    //     const lastNameLabel = document.getElementById("lastname-label");
    //     let valid = true;

    //     if (!firstNameField.value) {
    //         const nameError = document.getElementById("nameError");

    //         nameError.classList.add("visible");
    //         firstNameField.classList.add("invalid");
    //         firstNameLabel.classList.add("invalid-label");
    //         nameError.classList.add("invalid-label");

    //         nameError.setAttribute("error-hidden", false);
    //         nameError.setAttribute("error-invalid", true);

    //         nameError.textContent = "Please enter First Name";
    //     } else {
    //         nameError.classList.remove("visible");
    //         firstNameField.classList.remove("invalid");
    //         firstNameLabel.classList.remove("invalid-label");

    //         nameError.setAttribute("error-hidden", true);
    //         nameError.setAttribute("error-invalid", false);
    //         return valid;
    //     }

    //     if (!lastNameField.value) {
    //         const nameError = document.getElementById("lastnameError");

    //         nameError.classList.add("visible");
    //         lastNameField.classList.add("invalid");
    //         lastNameLabel.classList.add("invalid-label");
    //         nameError.classList.add("invalid-label");

    //         nameError.setAttribute("error-hidden", false);
    //         nameError.setAttribute("error-invalid", true);

    //         nameError.textContent = "Please enter First Name";
    //     } else {
    //         nameError.classList.remove("visible");
    //         lastNameField.classList.remove("invalid");
    //         lasttNameLabel.classList.remove("invalid-label");

    //         nameError.setAttribute("error-hidden", true);
    //         nameError.setAttribute("error-invalid", false);
    //         return valid;
    //     }
           
    // }

        // Error messages

    //     function errorMessage() {
    //     var error = document.getElementById("error")
    //     if (isNaN(document.getElementById("cardNumber").value))
    //     {
    //         // Changing content and color of content
    //         error.textContent = "Please enter a valid number"
    //         error.style.color = "red"
    //     } else {
    //         error.textContent = ""
    //     }
    // }

        // // Selecting the amount of tokens
        // function selectCreditAmount () {
        //     const creditCost = 5;
        //     const select = document.querySelector("select");
        //     let totalAmount = document.querySelector("#totalAmount");
        //     let numbOfCredits = document.querySelector("#numbOfCredits");
        //     let totalCost = document.querySelector("#totalCost");

        //     select.addEventListener('change', () => {       
        //         numbOfCredits = select.value;
        //         totalAmount = select.value * creditCost;  
        //         totalCost.textContent = `Total cost of ${numbOfCredits} credits : $${totalAmount}`;

        //         return totalAmount;
        //     });
        // }
    
        // selectCreditAmount ();
        
        // console.log(totalAmount);

	</script>

</body>
</html>






<?php //$content = ob_get_clean(); ?>
<?php //require('template.php'); ?>