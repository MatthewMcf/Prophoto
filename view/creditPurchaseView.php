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
        <form action="">

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
            
                <h4>Name on card</h4>
                <input
                    type="text"
                    class="input"
                    placeholder="Input example"
                />

                <label>Card number</label>
                <input
                    type="text"
                    class="input"
                    id="cardNumber"
                    placeholder="Card number"
                    size="16"
                />
                <span id="error"></span>

                <button class="btnPrimary" type="submit">Pay now</button>
            </div>
        </form>

        <!--  -->

        <form id="form">
            <label for="firstname" id="firstname-label"> First Name* </label>
            <input type="text" name="firstname" id="firstname" />
            <span role="alert" id="nameError" error-hidden="true">
            <!-- Please enter First Name -->
            </span>

            <label for="lastname" id="lastname-label"> First Name* </label>
            <input type="text" name="lastname" id="lastname" />
            <span role="alert" id="lastnameError" error-hidden="true">
            <!-- Please enter First Name -->
            </span>
            <button id="submit">Submit</button>
        </form>
    </div>

    <script>

        const submit = document.getElementById("submit");

        submit.addEventListener("click", validate);

        function validate(e) {
        e.preventDefault();

        const firstNameField = document.getElementById("firstname");
        const firstNameLabel = document.getElementById("firstname-label");

        const lastNameField = document.getElementById("lastname");
        const lastNameLabel = document.getElementById("lastname-label");
        let valid = true;

        if (!firstNameField.value) {
            const nameError = document.getElementById("nameError");

            nameError.classList.add("visible");
            firstNameField.classList.add("invalid");
            firstNameLabel.classList.add("invalid-label");
            nameError.classList.add("invalid-label");

            nameError.setAttribute("error-hidden", false);
            nameError.setAttribute("error-invalid", true);

            nameError.textContent = "Please enter First Name";
        } else {
            nameError.classList.remove("visible");
            firstNameField.classList.remove("invalid");
            firstNameLabel.classList.remove("invalid-label");

            nameError.setAttribute("error-hidden", true);
            nameError.setAttribute("error-invalid", false);
            return valid;
        }

        if (!lastNameField.value) {
            const nameError = document.getElementById("lastnameError");

            nameError.classList.add("visible");
            lastNameField.classList.add("invalid");
            lastNameLabel.classList.add("invalid-label");
            nameError.classList.add("invalid-label");

            nameError.setAttribute("error-hidden", false);
            nameError.setAttribute("error-invalid", true);

            nameError.textContent = "Please enter First Name";
        } else {
            nameError.classList.remove("visible");
            lastNameField.classList.remove("invalid");
            lasttNameLabel.classList.remove("invalid-label");

            nameError.setAttribute("error-hidden", true);
            nameError.setAttribute("error-invalid", false);
            return valid;
        }
           
    }

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
            });
        }
    
        selectCreditAmount ();
        
	</script>

</body>
</html>






<?php //$content = ob_get_clean(); ?>
<?php //require('template.php'); ?>