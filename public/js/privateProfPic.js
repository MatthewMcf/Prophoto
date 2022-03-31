// GENERAL JAVASCRIPT WEBSITE
// Trigger Modal to edit Profile Picture
let profilePic = document.getElementById("profilePic");
profilePic.addEventListener("click", function () {
    setModalContent();
});

// Trigger Modal to edit Profile Info
let profileInfo = document.getElementById("editProfileInfo");
profileInfo.addEventListener("click", function () {
    setModalProfileInfo();
});

// Trigger Modal to edit Picture
let editPic = document.querySelectorAll(".editPic");
for (let i = 0; i < editPic.length; i++) {
    editPic[i].addEventListener("click", function (e) {
        e.stopPropagation();
        setModalEditPic(e);
    });
}

// Trigger accordion effect on Photos
let arrowDowns = document.querySelectorAll(".sectionHeader");
console.log(arrowDowns);
for (let i = 0; i < arrowDowns.length; i++) {
    arrowDowns[i].addEventListener("click", function () {
        this.lastElementChild.classList.toggle("rotate");

        let sectionPhotos = this.nextElementSibling;
        if (sectionPhotos.style.maxHeight) {
            sectionPhotos.style.maxHeight = null;
        } else {
            sectionPhotos.style.maxHeight = sectionPhotos.scrollHeight + "px";
        }
    });
}

// Trigger Modal to upload a photo
let addPicture = document.querySelector("#addPicture");
addPicture.addEventListener("click", function () {
    setModalUploadPic();
});

// Show more cards of user's images
let showMoreCurrent = document.querySelector("#showMoreCurrent");
showMoreCurrent.addEventListener("click", () => {
    let yourPhotos = document.querySelector("#yourPhotosSection");
    for (let i = 0; i < 3; i++) {
        let currCard = createCard();
        showMoreCurrent.parentNode.insertBefore(currCard, showMoreCurrent);
    }
});
