var form = document.querySelector("form");
form.addEventListener("submit", function (e) {
	e.preventDefault();
});
var title = document.getElementById("title");
var price = document.getElementById("price");
title.setAttribute("required", true);
price.setAttribute("required", true);

// delete an uploaded image
function deleteExistingImage() {
	var formData = new FormData();

	formData.append("fileAjax", "data/2/original/8.jpg");
	formData.append("action", "removeImage");

	var request = new XMLHttpRequest();

	request.open("POST", "index.php", true);
	request.onload = () => {};
	request.send(formData);
}
