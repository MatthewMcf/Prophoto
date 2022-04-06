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
let sectionHeader = document.querySelectorAll(".sectionHeader");
let openArrow = false;
for (let i = 0; i < sectionHeader.length; i++) {
	sectionHeader[i].addEventListener("click", function () {
		let sectionPhotos = this.nextElementSibling;
		sectionPhotos.classList.toggle("close");
		this.lastElementChild.classList.toggle("open");
		openArrow = !openArrow;
	});
}

// Trigger Modal to upload a photo
let addPicture = document.querySelector("#addPicture");
addPicture.addEventListener("click", function () {
	setModalUploadPic();
});

// Show more cards of user's images
// let showMoreCurrent = document.querySelector("#showMoreCurrent");
// showMoreCurrent.addEventListener("click", () => {
//     let yourPhotos = document.querySelector("#yourPhotosSection");
//     for (let i = 0; i < 3; i++) {
//         let currCard = createCard();
//         showMoreCurrent.parentNode.insertBefore(currCard, showMoreCurrent);
//     }
// });
