var form = document.querySelector("form");
form.addEventListener("submit", function (e) {
	e.preventDefault();
});
var title = document.getElementById("title");
var price = document.getElementById("price");
title.setAttribute("required", true);
price.setAttribute("required", true);
