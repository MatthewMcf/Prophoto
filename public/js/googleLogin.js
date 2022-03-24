function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	console.log("ID: " + profile.getId()); // Do not send to your backend! Use an ID token instead.
	console.log("Name: " + profile.getName());
	console.log("Image URL: " + profile.getImageUrl());
	console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.
	var id_token = googleUser.getAuthResponse().id_token;

	console.log(id_token);
	var formData = new FormData();

	formData.append("google_token", id_token);
	formData.append("email", profile.getEmail());
	formData.append("action", "googleUser");
	formData.append("profile_url", profile.getImageUrl());
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	request.send(formData);

	// var xhr = new XMLHttpRequest();
	// xhr.open("POST", "http://localhost/proPhoto/homepage.php");
	// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// xhr.onload = function () {
	// 	console.log("Signed in as: " + xhr.responseText);
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
