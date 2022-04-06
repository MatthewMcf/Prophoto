// Selecting the amount of tokens
function selectCreditAmount() {
	const creditCost = 5;
	const select = document.querySelector("#credits");
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
// Get date and time for card experation
// var today = new Date();
// var date =
// 	today.getFullYear() +
// 	"-" +
// 	(today.getMonth() + 1) +
// 	"-" +
// 	today.getDate();

function checkInputs() {
	// Expire variables
	const expiryMonth = document.getElementById("expiryMonth");
	const expiryYear = document.getElementById("expiryYear");
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
		return false;
	} else {
		setSuccessFor(credits);
	}

	// Cardholder's name error condition
	if (cardHoldersNameValue === "") {
		setErrorFor(cardHoldersName, "Card holders name cannot be blank");
		return false;
	} else {
		setSuccessFor(cardHoldersName);
	}

	// Card number error condition
	if (cardNumberValue === "") {
		setErrorFor(cardNumber, "Card holders name cannot be blank");
		return false;
	} else if (cardNumber.value.length < 15) {
		setErrorFor(cardNumber, "Card number can not be less than 15 numbers");
		return false;
	} else if (cardNumber.value.length > 16) {
		setErrorFor(cardNumber, "Card number can not be more than 16 numbers");
		return false;
	} else {
		setSuccessFor(cardNumber);
	}

	// Expire error condition
	if (expiryMonthValue == 0 || expiryYearValue == 0) {
		setErrorFor(expiryYear, "Please enter a valid expiry date");
		return false;
	} else if (expiryDate < new Date()) {
		setErrorFor(expiryYear, "Expiry date can not be in the past");
		return false;
	} else {
		setSuccessFor(expiryYear);
	}

	// Security code error condition
	if (securityCodeValue === "") {
		setErrorFor(securityCode, "Security code cannot be blank");
		return false;
	} else if (securityCode.value.length < 3) {
		setErrorFor(
			securityCode,
			"Security code can not be less than 3 numbers"
		);
		return false;
	} else if (securityCode.value.length > 3) {
		setErrorFor(
			securityCode,
			"Security code can not be more than 3 numbers"
		);
		return false;
	} else {
		setSuccessFor(securityCode);
	}
	return true;
}

function setErrorFor(input, message) {
	const inputContainer = input.parentElement;
	const small = inputContainer.querySelector("small");
	inputContainer.className = "inputContainer error";
	small.textContent = message;
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
