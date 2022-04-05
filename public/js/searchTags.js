let input = document.querySelector("#inputSearch");
input.addEventListener("keyup", function (e) {
	let form = e.target.parentNode;
	let list = document.querySelector("#results").children;
	let url = "SearchManager.php?";
	let typedText = document.querySelector("#inputSearch").value;
	url += "search=" + encodeURIComponent(typedText);
	let xhr = new XMLHttpRequest();
	xhr.open(
		"GET",
		"http://localhost/proPhoto/model/SearchManager.php?search=" +
			encodeURIComponent(typedText)
	);
	xhr.addEventListener("load", function () {
		if (xhr.status == 200) {
			console.log(xhr.responseText);
			let string = xhr.responseText;
			let array = string.split("|");
			// console.log(array);
			let results = document.querySelector("#results");
			// console.log(e.target.parentNode);
			while (results.firstChild) {
				results.removeChild(results.firstChild);
			}
			if (array.length > 10) {
				for (var i = 0; i < 10; i++) {
					let newDiv = document.createElement("div");
					results.appendChild(newDiv);
					newDiv.innerHTML += array[i];
				}
				let options = results.children;
				for (var i = 0; i < options.length; i++) {
					options[i].addEventListener("click", function (e) {
						form.querySelector("#search").value =
							e.target.textContent;
						while (results.firstChild) {
							results.removeChild(results.firstChild);
						}
					});
				}
			} else {
				for (var i = 0; i < array.length; i++) {
					let newDiv = document.createElement("div");
					results.appendChild(newDiv);
					newDiv.innerHTML += array[i];
				}
				let options = results.children;
				for (var i = 0; i < options.length; i++) {
					options[i].addEventListener("click", function (e) {
						form.querySelector("#search").value =
							e.target.textContent;
						while (results.firstChild) {
							results.removeChild(results.firstChild);
						}
					});
				}
			}
		}
	});
	xhr.send(null);
	if (typedText == "") {
		xhr.abort();
		while (results.firstChild) {
			results.removeChild(results.firstChild);
		}
	}
});

// earouherailvubeqrilvuberqlviqerb

// var searchElement = document.getElementById("inputSearch"),
// 	results = document.getElementById("results"),
// 	selectedResult = -1, // allow to know which result is selected : -1 means "no selection"
// 	previousRequest, // We store our previous request in this variable
// 	previousValue = searchElement.value; // We do the same with the previous value

// function getResults(keywords) {
// 	// Execute a request and get back the results

// 	var xhr = new XMLHttpRequest();
// 	xhr.open(
// 		"GET",
// 		"http://localhost/proPhoto/model/SearchManager.php?search=" +
// 			encodeURIComponent(keywords)
// 	);

// 	xhr.addEventListener("readystatechange", function () {
// 		if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
// 			displayResults(xhr.responseText);
// 		}
// 	});

// 	xhr.send(null);
// 	return xhr;
// }

// function displayResults(response) {
// 	// Display the results of a request

// 	results.style.display = response.length ? "block" : "none"; // We hide the container if we don't have results

// 	if (response.length) {
// 		// We do modify the results only if we have ones

// 		response = response.split("|");
// 		var responseLen = response.length;

// 		results.innerHTML = ""; // We clear the results

// 		for (var i = 0, div; i < responseLen; i++) {
// 			div = results.appendChild(document.createElement("div"));
// 			div.innerHTML = response[i];
// 			div.addEventListener("click", function (e) {
// 				chooseResult(e.target);
// 			});
// 		}
// 	}
// }

// function chooseResult(result) {
// 	// We choose one of the results of the request and we manage all what is related to

// 	searchElement.value = previousValue = result.innerHTML; // We change the content of the search field and we store as previous value
// 	results.style.display = "none"; // we hide the results
// 	result.className = ""; // we suppress the focus effect
// 	selectedResult = -1; // we put again the selection to zero
// 	searchElement.focus(); // if the result has been chosen with a click even if the focus is lost we re-attribute it again
// }
// searchElement.addEventListener("input", function (e) {
// 	var divs = results.getElementsByTagName("div");
// 	if (e.code == "Enter" && selectedResult > -1) {
// 		// if the key pressed is Enter

// 		chooseResult(divs[selectedResult]);
// 	} else if (searchElement.value != previousValue) {
// 		// if the content of the search field has changed

// 		previousValue = searchElement.value;

// 		if (
// 			previousRequest &&
// 			previousRequest.readyState < XMLHttpRequest.DONE
// 		) {
// 			previousRequest.abort(); // if we have still a research running, we stop it
// 		}

// 		previousRequest = getResults(previousValue); // we store the new request

// 		selectedResult = -1; // we reset the selection for every entered characters
// 	}
// });
