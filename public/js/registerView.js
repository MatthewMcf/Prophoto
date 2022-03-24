function validateInput(input) {
	switch (input.id) {
		case "email":
			let regex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
			return regex.test(input.value);
		case "pwd":
			return input.value.length > 8;
		case "pwdRe":
			let pwd = document.querySelector("#pwd").value;
			return input.value === pwd;
		case "username":
			return input.value.length > 2;
		default:
			return;
	}
}

function checkInput(input) {
	if (!input.value) {
		input.className = "required";
	} else if (!validateInput(input)) {
		input.className = "invalid";
	} else {
		input.className = "valid";
	}
}

let inputs = document.querySelectorAll(
	"#registrationForm input[type=text], #registrationForm input[type=password]"
);
for (let i = 0; i < inputs.length; i++) {
	inputs[i].addEventListener("blur", function (e) {
		checkInput(e.target);
	});
}

let registrationForm = document.querySelector("#registrationForm");
registrationForm.addEventListener("submit", function (e) {
	e.preventDefault();
	for (let i = 0; i < inputs.length; i++) {
		checkInput(inputs[i]);
	}
	!document.querySelector(".required") && !document.querySelector(".invalid")
		? e.target.submit()
		: null;
});
