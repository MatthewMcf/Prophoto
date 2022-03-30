class Modal {
	constructor(content, visible = false) {
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
}

// Example for testing
function setModalContent() {
<<<<<<< HEAD
    // Set up the request
    var xhr = new XMLHttpRequest();

    // Open the connection
    // Replace with path to your php
    xhr.open("GET", "./view/modalProfilePicture.php");

    xhr.addEventListener("load", () => {
        // We manage here an asynchronous request
        if (xhr.status === 200) {
            // if the file is loaded without error
            let content = xhr.responseText;
            let modal = new Modal(content);
            document
                .getElementById("modalProfilePic")
                .setAttribute(
                    "src",
                    document
                        .getElementById("currProfilePic")
                        .getAttribute("src")
                );
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
=======
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./view/modalProfilePicture.php");

	xhr.addEventListener("load", () => {
		// We manage here an asynchronous request
		if (xhr.status === 200) {
			// if the file is loaded without error
			let content = xhr.responseText;
			let modal = new Modal(content);
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
>>>>>>> 13c62f6a3a4d3bfc00d1e048f63cdee63b065bbf
}

// Edit Profile Information
function setModalProfileInfo() {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./view/modalProfileEdit.php");

	xhr.addEventListener("load", () => {
		// We manage here an asynchronous request
		if (xhr.status === 200) {
			// if the file is loaded without error
			let content = xhr.responseText;
			let modal = new Modal(content);
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

// Edit Picture Info
function setModalEditPic() {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./view/modalPhotoEdit.php");

	xhr.addEventListener("load", () => {
		// We manage here an asynchronous request
		if (xhr.status === 200) {
			// if the file is loaded without error
			let content = xhr.responseText;
			let modal = new Modal(content);
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

function setModalContentPhotoView(e) {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	xhr.open(
		"GET",
		`view/modalPhotoView.php?path=${e.target.getAttribute("path")}`
	);

	xhr.addEventListener("load", () => {
		// We manage here an asynchronous request
		if (xhr.status === 200) {
			// if the file is loaded without error
			let content = xhr.responseText;
			let modal = new Modal(content);

			let pb = document.querySelector(".purchaseButton");
			pb.addEventListener("click", () => {
				//setModalContentPurchaseView();
			});
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

// Uploading Profile Picture function
var loadFile = function (event) {
<<<<<<< HEAD
    var image = document.getElementById("modalProfilePic");
    var uploadedImage = event.target.files[0];
    let updateButton = document.querySelector(".updateButton");
    let newUpdateButton = updateButton.cloneNode(true);
    image.src = URL.createObjectURL(uploadedImage);
    newUpdateButton.addEventListener("click", function (evt1) {
        evt1.preventDefault();
        let message = document.getElementById("message");
        message.innerHTML = "Uploading...";

        var file = event.target.files[0]; //document.getElementById("output").src;
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

function setModalUploadPic() {
    // Set up the request
    var xhr = new XMLHttpRequest();

    // Open the connection
    // Replace with path to your php
    xhr.open("GET", "./view/modalPictureUpload.php");

    xhr.addEventListener("load", () => {
        // We manage here an asynchronous request
        if (xhr.status === 200) {
            // if the file is loaded without error
            let content = xhr.responseText;
            let modal = new Modal(content);
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

// Uploading an image
var loadUploadedImage = function (event) {
    var image = document.getElementById("modalUploadedImage");
    var uploadedImage = event.target.files[0];
    let updateButton = document.querySelector(".updateButton");
    let newUpdateButton = updateButton.cloneNode(true);
    image.src = URL.createObjectURL(uploadedImage);
    newUpdateButton.addEventListener("click", function (evt1) {
        evt1.preventDefault();
        let message = document.getElementById("message");
        message.innerHTML = "Uploading...";

        var file = event.target.files[0]; //document.getElementById("output").src;
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
=======
	var image = document.getElementById("output");
	var uploadedImage = event.target.files[0];
	let updateButton = document.querySelector(".updateButton");
	image.src = URL.createObjectURL(uploadedImage);
	updateButton.addEventListener("click", function (evt1) {
		evt1.preventDefault();
		let message = document.getElementById("message");
		message.innerHTML = "Uploading...";

		var file = event.target.files[0]; //document.getElementById("output").src;
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
		xhr.open("POST", "./model/setProfilePicture.php", true);
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
>>>>>>> 13c62f6a3a4d3bfc00d1e048f63cdee63b065bbf
};
