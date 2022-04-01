let cards = document.querySelectorAll(".cardContent");
console.log(cards);

for (let i = 0; i < cards.length; i++) {
    cards[i].addEventListener("click", (e) => {
        setModalContentPhotoView(e);
    });
}
