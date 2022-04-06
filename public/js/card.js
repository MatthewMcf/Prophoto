let cards = document.querySelectorAll(".cardContent");

for (let i = 0; i < cards.length; i++) {
    cards[i].addEventListener("click", (e) => {
        setModalContentPhotoView(e);
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

let prices = document.querySelectorAll(".price");
for (let i = 0; i < prices.length; i++) {
    prices[i].addEventListener("click", (e) => {
        e.stopImmediatePropagation();
        e.currentTarget.parentElement.click();
    });
}
