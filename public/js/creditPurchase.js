window.onload = createYearOptions();

const form = document.getElementById("form");

// Check to see if needed
const cardHoldersName = document.getElementById("cardHoldersName");
const cardNumber = document.getElementById("cardNumber");
const securityCode = document.getElementById("securityCode");
const credits = document.getElementById("credits");

// Expire variables
const formTest = document.getElementById("formTest");
const expiryMonth = document.getElementById("expiryMonth");
const expiryYear = document.getElementById("expiryYear");

// Get date and time for card experation
var today = new Date();
var date =
	today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();

// console.log(date);
console.log("Test");
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
	const cardHoldersNameValue = cardHoldersName.value.trim();
	const cardNumberValue = cardNumber.value.trim();
	const securityCodeValue = securityCode.value.trim();

	// Date
	const month = expiryMonth.value;
	const year = expiryYear.value;

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
	const inputSuccess = input.parentElement;
	inputSuccess.className = "inputContainer";
}
