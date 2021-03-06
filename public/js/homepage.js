let photoCardsAll = document.querySelectorAll(".photoCard");

for (let i = 0; i < photoCardsAll.length; i++) {
	photoCardsAll[i].addEventListener("click", setModalContentPhotoView);
}

let prices = document.querySelectorAll(".price");
for (let i = 0; i < prices.length; i++) {
	prices[i].addEventListener("click", (e) => {
		e.stopImmediatePropagation();
		e.currentTarget.parentElement.click();
	});
}

let pbs = document.querySelectorAll(".purchaseButton");

for (let i = 0; i < pbs.length; i++) {
	pbs[i].addEventListener("click", (e) => {
		setModalContentPurchaseView(e);
	});
}

let lgs = document.querySelectorAll(".loginButton");
for (let i = 0; i < lgs.length; i++) {
	lgs[i].addEventListener("click", (e) => {
		document.querySelector("#login").click();
	});
}

// DROP DOWN JS
function toggleClass(elem, className) {
	if (elem.className.indexOf(className) !== -1) {
		elem.className = elem.className.replace(className, "");
	} else {
		elem.className = elem.className.replace(/\s+/g, " ") + " " + className;
	}

	return elem;
}

function toggleDisplay(elem) {
	const curDisplayStyle = elem.style.display;

	if (curDisplayStyle === "none" || curDisplayStyle === "") {
		elem.style.display = "block";
	} else {
		elem.style.display = "none";
	}
}

function toggleMenuDisplay(e) {
	const dropdown = e.currentTarget.parentNode;
	const menu = dropdown.querySelector(".menu");
	const icon = dropdown.querySelector(".fa-caret-down");

	toggleClass(menu, "hide");
	toggleClass(icon, "rotate-180");
}

function ridDiv() {
	let results = document.querySelector("#results");

	while (results.firstChild) {
		results.removeChild(results.firstChild);
	}
}

function handleOptionSelected(e) {
	toggleClass(e.target.parentNode.parentNode, "hide");

	const id = e.target.id;
	const newValue = e.target.textContent + " ";
	const titleElem = document.querySelector(".dropdown .title");
	const icon = document.querySelector(".dropdown .title .fa-caret-down");

	titleElem.textContent = newValue;
	titleElem.appendChild(icon);

	//trigger custom event
	document
		.querySelector(".dropdown .title")
		.dispatchEvent(new Event("change"));
	//setTimeout is used so transition is properly shown
	setTimeout(() => toggleClass(icon, "rotate-180", 0));
}

function handleTitleChange(e) {
	const result = document.getElementById("result");

	result.innerHTML = "The result is: " + e.target.textContent;
}

//get elements
const dropdownTitle = document.querySelector(".dropdown .title");
const dropdownOptions = document.querySelectorAll(".dropdown .option");

//bind listeners to these elements
dropdownTitle.addEventListener("click", toggleMenuDisplay);

dropdownOptions.forEach((option) =>
	option.addEventListener("click", handleOptionSelected)
);

document
	.querySelector(".dropdown .title")
	.addEventListener("change", handleTitleChange);
