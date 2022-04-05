class Modal {
	constructModal(content, visible = false) {
		let modal = document.createElement("dialog");
		modal.id = "modal";
		modal.classList.add("modal");

		let modalInner = document.createElement("div");
		modalInner.id = "modalInner";
		let closeButton = document.createElement("span");
		closeButton.classList.add("closeModal");
		// closeButton.textContent = "×";
		closeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';

		modalInner.innerHTML = content;
		modalInner.insertBefore(closeButton, modalInner.firstChild);
		closeButton.addEventListener("click", (e) => {
			modal.close();
			if (!visible) {
				modal.parentNode.removeChild(modal);
			}
		});

		modal.addEventListener("click", function (e) {
			// Check if the modal is clicked, not an element inside the modal:
			if (e.target === e.currentTarget) {
				modal.close();
				if (!visible) {
					modal.parentNode.removeChild(modal);
				}
			}
		});

		modal.appendChild(modalInner);
		document.body.appendChild(modal);

		modal.showModal();
	}

	// Example for testing
	setModalContent(url, more = function () {}) {
		// Set up the request
		let xhr = new XMLHttpRequest();

		// Open the connection
		// Replace with path to your php
		xhr.open("GET", url);

		xhr.addEventListener("load", () => {
			// We manage here an asynchronous request
			if (xhr.status === 200) {
				// if the file is loaded without error
				let content = xhr.responseText;
				this.constructModal(content);
				more();
			} else if (
				xhr.readyState === XMLHttpRequest.DONE &&
				xhr.status != 200
			) {
				// in case of error
				alert(
					"There is an error !\n\nCode :" +
						xhr.status +
						"\nText : " +
						xhr.statusText
				);
			}
		});
		xhr.send(null);
	}

	setModalProfilePicture() {
		let url = "./view/modalProfilePicture.php";
		let more = function () {
			document
				.getElementById("modalProfilePic")
				.setAttribute(
					"src",
					document
						.getElementById("currProfilePic")
						.getAttribute("src")
				);
		};
		this.setModalContent(url, more);
	}

	setModalProfileInfo() {
		let url = "./view/modalProfileEdit.php";
		this.setModalContent(url);
	}

	setModalEditPic(e) {
		let url = `index.php?action=photoEdit&photo-id=${e.target.getAttribute(
			"image-id"
		)}`;
		this.setModalContent(url);
	}

	setModalContentPurchaseView(e) {
		let url = `index.php?action=purchase&photo-id=${e.target.getAttribute(
			"image-id"
		)}`;
		this.setModalContent(url);
	}

	setModalContentPurchaseCreditsView() {
		let url = `index.php?action=purchaseCredits`;
		this.setModalContent(url);
	}

	setModalContentPhotoView(e) {
		let url = `index.php?action=photo&photo-id=${e.target.getAttribute(
			"image-id"
		)}`;
		let more = function () {
			let pb = document.querySelector(".purchaseButtonModal");

			if (pb) {
				pb.setAttribute("image-id", e.target.getAttribute("image-id"));
				pb.addEventListener("click", (e) => {
					//needs to direct to index to check if user has enough credits
					setModalContentPurchaseView(e);
				});
			}

			let lg = document.querySelector(".loginButtonModal");
			if (lg) {
				lg.addEventListener("click", (e) => {
					//needs to direct to index to check if user has enough credits
					document.querySelector("#login").click();
				});
			}
		};
		this.setModalContent(url, more);
	}

	setModalUploadPic() {
		let url = "./view/modalPictureUpload.php";
		this.setModalContent(url);
	}
}

// Uploading Profile Picture function
var loadFile = function (e) {
	var image = document.getElementById("modalProfilePic");
	var uploadedImage = e.target.files[0];
	let updateButton = document.querySelector(".updateButton");
	let newUpdateButton = updateButton.cloneNode(true);
	image.src = URL.createObjectURL(uploadedImage);
	newUpdateButton.addEventListener("click", function (evt1) {
		evt1.preventDefault();
		let message = document.getElementById("message");
		message.innerHTML = "Uploading...";

		var file = e.target.files[0]; //document.getElementById("output").src;
		var formData = new FormData();

		// Check the file type
		//if (!file.type.match('image.png')) {
		//    message.innerHTML = 'The file selected is not an image.';
		//    return;
		//}

		// Add the file to the AJAX request
		formData.append("fileAjax", file, file.name);

		// Set up the request
		var xhr = new XMLHttpRequest();

		// Open the connection
		// xhr.open("POST", "./model/setProfilePicture.php", true);
		xhr.open("POST", "./index.php?action=setProfilePicture", true);

		//xhr.setRequestHeader("Content-Type", "multipart/form-data");
		// Set up a handler for when the task for the request is complete
		xhr.onload = function () {
			if (xhr.status == 200) {
				let image = document.getElementById("currProfilePic");
				image.src = URL.createObjectURL(file);
				message.innerHTML = xhr.responseText;
			} else {
				message.innerHTML = "Upload error. Try again.";
			}
			//var message_req = xhr.responseText;
			//alert(message_req);
		};

		// Send the data.
		xhr.send(formData);
	});
	updateButton.parentNode.insertBefore(newUpdateButton, updateButton);
	updateButton.parentNode.removeChild(updateButton);
};

// Uploading an image
var loadUploadedImage = function (e) {
	var image = document.getElementById("modalUploadedImage");
	var uploadedImage = e.target.files[0];
	let updateButton = document.querySelector(".updateButton");
	let newUpdateButton = updateButton.cloneNode(true);
	image.src = URL.createObjectURL(uploadedImage);
	newUpdateButton.addEventListener("click", function (evt1) {
		evt1.preventDefault();
		let message = document.getElementById("message");
		message.innerHTML = "Uploading...";

		var file = e.target.files[0]; //document.getElementById("output").src;
		var formData = new FormData();

		// Check the file type
		//if (!file.type.match('image.png')) {
		//    message.innerHTML = 'The file selected is not an image.';
		//    return;
		//}

		// Add the file to the AJAX request
		formData.append("fileAjax", file, file.name);

		// Set up the request
		var xhr = new XMLHttpRequest();

		// Open the connection
		// xhr.open("POST", "./model/setProfilePicture.php", true);
		xhr.open("POST", "./index.php?action=uploadImage", true);

		//xhr.setRequestHeader("Content-Type", "multipart/form-data");
		// Set up a handler for when the task for the request is complete
		xhr.onload = function () {
			if (xhr.status == 200) {
				// let image = document.getElementById("currProfilePic");
				// image.src = URL.createObjectURL(file);
				message.innerHTML = xhr.responseText;
			} else {
				message.innerHTML = "Upload error. Try again.";
			}
			//var message_req = xhr.responseText;
			//alert(message_req);
		};
		// Send the data.
		xhr.send(formData);
	});

	updateButton.parentNode.insertBefore(newUpdateButton, updateButton);
	updateButton.parentNode.removeChild(updateButton);
};
