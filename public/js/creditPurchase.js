window.onload = createYearOptions();

// const form = document.getElementById("form");

// Check to see if needed
// const cardHoldersName = document.getElementById("cardHoldersName");
// const cardNumber = document.getElementById("cardNumber");
// const securityCode = document.getElementById("securityCode");
// const credits = document.getElementById("credits");

// // Expire variables
// const formTest = document.getElementById("formTest");
// const expiryMonth = document.getElementById("expiryMonth");
// const expiryYear = document.getElementById("expiryYear");

// Get date and time for card experation
var today = new Date();
var date =
	today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();

// console.log(date);

form.addEventListener("submit", (e) => {
	e.preventDefault();

	checkInputs();
});

// Selecting the amount of tokens
function selectCreditAmount() {
	const creditCost = 5;
	const select = document.querySelector("select");
	let totalAmount = document.querySelector("#totalAmount");
	let numbOfCredits = document.querySelector("#numbOfCredits");
	let totalCost = document.querySelector("#totalCost");

	select.addEventListener("change", () => {
		numbOfCredits = select.value;
		totalAmount = select.value * creditCost;
		totalCost.textContent = `Total cost of ${numbOfCredits} credits : $${totalAmount}`;

		return totalAmount;
	});
}

selectCreditAmount();

function checkInputs() {
	// trim to remove the whitespaces
	const creditsValue = credits.value;
	const cardHoldersNameValue = cardHoldersName.value.trim();
	const cardNumberValue = cardNumber.value.trim();
	const securityCodeValue = securityCode.value.trim();

	const expiryMonthValue = expiryMonth.value;
	const expiryYearValue = expiryYear.value;

	// Date
	const month = expiryMonth.value;
	const year = expiryYear.value;

	// Create a date object from month and year, on the first
	// of that month. You could check the end of the month
	// but that would be a little more complicated as you'd need
	// to know how many days are in that month.
	const expiryDate = new Date(year + "-" + month + "-01");

	// Credit error condition
	if (creditsValue == 0) {
		setErrorFor(
			credits,
			"Please select how many credits you would like to purchase"
		);
	} else {
		setSuccessFor(credits);
	}

	// Cardholder's name error condition
	if (cardHoldersNameValue === "") {
		setErrorFor(cardHoldersName, "Card holders name cannot be blank");
	} else {
		setSuccessFor(cardHoldersName);
	}

	// Card number error condition
	if (cardNumberValue === "") {
		setErrorFor(cardNumber, "Card holders name cannot be blank");
	} else if (cardNumber.value.length < 15) {
		setErrorFor(cardNumber, "Card number can not be less than 15 numbers");
	} else if (cardNumber.value.length > 16) {
		setErrorFor(cardNumber, "Card number can not be more than 16 numbers");
	} else {
		setSuccessFor(cardNumber);
	}

	// Expire error condition
	if (expiryMonthValue == 0 || expiryYearValue == 0) {
		setErrorFor(expiryYear, "Please enter a valid expiery date");
	} else if (expiryDate < new Date()) {
		setErrorFor(expiryYear, "Expiery date can not be in the past");
	} else {
		setSuccessFor(expiryYear);
	}

	// Security code error condition
	if (securityCodeValue === "") {
		setErrorFor(securityCode, "Security code cannot be blank");
	} else if (securityCode.value.length < 3) {
		setErrorFor(
			securityCode,
			"Security code can not be less than 3 numbers"
		);
	} else if (securityCode.value.length > 3) {
		setErrorFor(
			securityCode,
			"Security code can not be more than 3 numbers"
		);
	} else {
		setSuccessFor(securityCode);
	}
}

function setErrorFor(input, message) {
	const inputContainer = input.parentElement;
	const small = inputContainer.querySelector("small");
	inputContainer.className = "inputContainer error";
	small.innerText = message;
}

// Get year
function createYearOptions() {
	var newDate = new Date();
	var currentYear = newDate.getFullYear();
	var yearOptions = "<option value='0'>Year</option>";

	for (var i = currentYear; i < currentYear + 10; i++) {
		yearOptions += "<option value='" + i + "'>" + i + "</option>";
	}

	document.querySelector("#expiryYear").innerHTML = yearOptions;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = "inputContainer success";
}

// // // // // // // Junk to hold on too // // // // // // //

// Expire test
// const formTest = document.getElementById('formTest');
// const expiryMonth = document.getElementById('expiryMonth');
// const expiryYear = document.getElementById('expiryYear');

// form.addEventListener('submit', ev => {
//   ev.preventDefault();

//   const month = expiryMonth.value;
//   const year = expiryYear.value;

//   // Create a date object from month and year, on the first
//   // of that month. You could check the end of the month
//   // but that would be a little more complicated as you'd need
//   // to know how many days are in that month.
//   const expiryDate = new Date(year + '-' + month + '-01');

//   // You can compare date objects, this says if the expiryDate is
//   // less than todays date, i.e. in the past. You could do <= if
//   // you want to check whether they're the same date aswell.
//   if (expiryDate < new Date()) {
//     // Fails validation, show some error message to user
//     console.log('fail')
//   } else {
//     // Valid expiry
//     console.log('pass')
//   }
// })

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
