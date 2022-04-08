let cards = document.querySelectorAll(".cardContent");
console.log(cards);

for (let i = 0; i < cards.length; i++) {
	cards[i].addEventListener("click", (e) => {
		let modal = new Modal();
		modal.setModalContentPhotoView(e);
	});
}

let pbs = document.querySelectorAll(".purchaseButton");

for (let i = 0; i < pbs.length; i++) {
	pbs[i].addEventListener("click", (e) => {
		let modal = new Modal();
		modal.setModalContentPurchaseView(e);
	});
}

let lgs = document.querySelectorAll(".loginButton");
for (let i = 0; i < lgs.length; i++) {
	lgs[i].addEventListener("click", (e) => {
		console.log("here");
		document.querySelector("#login").click();
	});
}
