// GENERAL JAVASCRIPT WEBSITE
// Trigger Modal to edit Profile Picture
let profilePic = document.getElementById("profilePic");
profilePic.addEventListener("click", function () {
	setModalContent();
});

// Trigger Modal to edit Profile Info
let profileInfo = document.getElementById("profileInfo");
profileInfo.addEventListener("click", function () {
	setModalProfileInfo();
});

// Trigger Modal to edit Picture
let editPic = document.querySelectorAll(".editPic");
console.log(editPic);
for (let i = 0; i < editPic.length; i++) {
	editPic[i].addEventListener("click", function () {
		setModalEditPic();
	});
}
