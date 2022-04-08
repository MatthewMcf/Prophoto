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
			let string = xhr.responseText;
			let array = string.split("|");
			let results = document.querySelector("#results");
			let back = document.getElementById("results");
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
						form.querySelector("#inputSearch").value =
							e.target.textContent;
						while (results.firstChild) {
							results.removeChild(results.firstChild);
						}
						form.submit();
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
						form.querySelector("#inputSearch").value =
							e.target.textContent;
						while (results.firstChild) {
							results.removeChild(results.firstChild);
						}
						form.submit();
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
