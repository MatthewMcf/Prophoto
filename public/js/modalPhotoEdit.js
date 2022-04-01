var form = document.querySelector("form");
form.addEventListener("submit", function (e) {
    e.preventDefault();
});
var title = document.getElementById("title");
var price = document.getElementById("price");
title.setAttribute("required", true);
price.setAttribute("required", true);

// delete an uploaded image
function deleteExistingImage(photo_id, user_id) {
    var formData = new FormData();

    // var php_var = "<?php echo $php_var; ?>";
    formData.append(
        "fileAjax1",
        "data/" + user_id + "/medium/" + photo_id + ".jpg"
    );
    formData.append(
        "fileAjax2",
        "data/" + user_id + "/original/" + photo_id + ".jpg"
    );
    formData.append(
        "fileAjax3",
        "data/" + user_id + "/small/" + photo_id + ".jpg"
    );
    formData.append("user_id", user_id);
    formData.append("photo_id", photo_id);

    formData.append("action", "removeImage");

    var request = new XMLHttpRequest();

    request.open("POST", "index.php", true);
    request.onload = () => {};
    request.send(formData);

    setTimeout(window.location.reload.bind(window.location), 500);
}
