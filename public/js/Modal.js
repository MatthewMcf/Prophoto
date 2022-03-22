class Modal {
	constructor(content) {
		let modal = document.createElement("dialog");
		modal.id = "modal";

		let modalInner = document.createElement("div");
		modalInner.id = "modalInner";
		let closeButton = document.createElement("span");
		closeButton.classList.add("close");
		closeButton.textContent = "x";

		modalInner.innerHTML = content;
		modalInner.insertBefore(closeButton, modalInner.firstChild);
		closeButton.addEventListener("click", (e) => {
			modal.close();
			modal.parentNode.removeChild(modal);
		});

		modal.addEventListener("click", function (e) {
			// Check if the modal is clicked, not an element inside the modal:
			if (e.target === e.currentTarget) {
				modal.close();
				modal.parentNode.removeChild(modal);
			}
		});

		modal.appendChild(modalInner);
		document.body.appendChild(modal);

		modal.showModal();
	}
}

// Example for testing
function setModalContent() {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./modalProfilePicture.php");

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

function setModalProfileInfo() {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./profileEdit.php");

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

function setModalEditPic() {
	// Set up the request
	var xhr = new XMLHttpRequest();

	// Open the connection
	// Replace with path to your php
	xhr.open("GET", "./photoEdit.php");

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
