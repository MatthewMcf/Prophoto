function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	// console.log("ID: " + profile.getId()); // Do not send to your backend! Use an ID token instead.
	// console.log("Name: " + profile.getName());
	// console.log("Image URL: " + profile.getImageUrl());
	// console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.
	var id_token = googleUser.getAuthResponse().id_token;

	// console.log(id_token);
	var formData = new FormData();

	formData.append("google_token", id_token);
	formData.append("email", profile.getEmail());
	formData.append("action", "googleUser");
	formData.append("profile_url", profile.getImageUrl());
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	request.onload = () => {
		if (request.status == 200) {
			console.log(request.responseText);
			document.location.replace(request.responseText);
		}
	};
	request.send(formData);

	// var xhr = new XMLHttpRequest();
	// xhr.open("POST", "view/homepage.php");
	// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// xhr.onload = function () {
	//     console.log("Signed in as: " + xhr.responseText);
	// };
	// xhr.send();
	// xhr.send("idtoken=" + id_token);
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		console.log("User signed out.");
	});
}

// function renderButton() {
// 	gapi.auth2.render("g-signin2", {
// 		scope: "profile email",
// 		width: 240,
// 		height: 50,
// 		longtitle: true,
// 		theme: "dark",
// 		onsuccess: onSuccess,
// 		onfailure: onFailure,
// 	});
// }

let logoutBtn = document.querySelector("#logout");
if (logoutBtn) {
	logoutBtn.addEventListener("click", () => {
		if (gapi.auth2.isSignedIn.get()) {
			signOut();
		}
	});
}
// renderButton();
