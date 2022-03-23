let photoCardsAll = document.querySelectorAll(".photoCard");

for (let i = 0; i < photoCardsAll.length; i++) {
    photoCardsAll[i].addEventListener("click", setModalContentPhotoView);
}
