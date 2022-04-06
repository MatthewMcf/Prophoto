function registerView() {
    function validateInput(input) {
        switch (input.id) {
            case "email":
                let regex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                return regex.test(input.value);
            case "pwd":
                return input.value.length > 8;
            case "pwdRe":
                let pwd = document.querySelector("#pwd").value;
                return input.value === pwd;
            case "username":
                return input.value.length > 2;
            default:
                return;
        }
    }

    function checkInput(input) {
        if (!input.value) {
            input.className = "required";
        } else if (!validateInput(input)) {
            input.className = "invalid";
        } else {
            input.className = "valid";
        }
    }

    let inputs = document.querySelectorAll(
        ".registrationForm input[type=text], .registrationForm input[type=password]"
    );
    // The first input need to get blurred, because when the modal is created, closed and reopened, this input gets focused & blurred, triggering the unintended blur event
    inputs[0].blur();
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("blur", function (e) {
            // When the user clicks Log in inside register modal, the blur event is nullified, otherwise it prevents the click event on the log in button.
            if (e.relatedTarget == "http://localhost/proPhoto/#") {
                return;
            }
            checkInput(e.target);
        });
    }

    let registrationForm = document.querySelector(".registrationForm");
    registrationForm.addEventListener("submit", function (e) {
        e.preventDefault();
        for (let i = 0; i < inputs.length; i++) {
            checkInput(inputs[i]);
        }
        !document.querySelector(".required") &&
        !document.querySelector(".invalid")
            ? e.target.submit()
            : null;
    });

    // We click the login button inside register modal and get directed to login modal
    let loginButtonInsideRegisterModal =
        document.querySelector("#loginRegister");
    loginButtonInsideRegisterModal.addEventListener("click", function () {
        let registerModal = document.querySelector(
            "#modal[data-state='register']"
        );
        registerModal.close();
        let loginModal = document.querySelector("#modal[data-state='login']");
        loginModal.showModal();
    });
}

function loginView() {
    // We click the register button inside login modal and get directed to register modal
    let registerButtonInsideLoginModal =
        document.querySelector("#registerLogin");
    registerButtonInsideLoginModal.parentNode.addEventListener(
        "submit",
        function (e) {
            e.preventDefault();
        }
    );
    registerButtonInsideLoginModal.addEventListener("click", function () {
        let loginModal = document.querySelector("#modal[data-state='login']");
        loginModal.close();
        let registerModal = document.querySelector(
            "#modal[data-state='register']"
        );
        registerModal.showModal();
    });
}

function displayGoogleButton() {
    let googleWrapper = document.querySelector("#googleWrapperRegister");
    googleWrapper.innerHTML =
        "<div class='g-signin2' data-onsuccess='onSignIn'></div>";
    let script = document.createElement("script");
    script.src = "https://apis.google.com/js/platform.js";
    script.async = true;
    script.defer = true;
    googleWrapper.appendChild(script);
}

if (document.querySelector("#register")) {
    let eltModal;
    let xhr = new XMLHttpRequest();
    let url = document.querySelector("#registerFalse")
        ? "index.php?action=registerView&register=false"
        : "index.php?action=registerView";

    xhr.open("GET", url);

    xhr.addEventListener("load", function () {
        if (xhr.status == 200) {
            let modal = new Modal(xhr.responseText, true);
            eltModal = document.querySelector("#modal:not([data-state])");
            eltModal.setAttribute("data-state", "register");
            eltModal.setAttribute("data-type", "access");
            eltModal.close();
            if (document.querySelector("#registerFalse")) {
                eltModal.showModal();
            }
            registerView();
            document
                .querySelector("#register")
                .addEventListener("click", function (e) {
                    e.preventDefault();
                    eltModal.showModal();
                });
            displayGoogleButton();
        }
    });
    xhr.send(null);
}
if (document.querySelector("#login")) {
    let eltModal;
    let xhr = new XMLHttpRequest();
    let url = document.querySelector("#loginFalse")
        ? "index.php?action=loginView&login=false"
        : "index.php?action=loginView";

    xhr.open("GET", url);

    xhr.addEventListener("load", function () {
        if (xhr.status == 200) {
            let modal = new Modal(xhr.responseText, true, true);
            eltModal = document.querySelector("#modal:not([data-state])");
            eltModal.setAttribute("data-state", "login");
            eltModal.setAttribute("data-type", "access");
            eltModal.close();
            if (
                document.querySelector("#registerTrue") ||
                document.querySelector("#loginFalse")
            ) {
                eltModal.showModal();
            }
            loginView();
            document
                .querySelector("#login")
                .addEventListener("click", function (e) {
                    if (e.target.name === "autoconnect") {
                        let email = e.target.value;
                        location.href =
                            "index.php?emailLogin=" +
                            email +
                            "&pwdLogin=null&autoconnection=null&action=loginAction";
                        return;
                    }
                    e.preventDefault();
                    eltModal.showModal();
                });
            displayGoogleButton();
        }
    });
    xhr.send(null);
}

let creditP = document.querySelector(".creditPurchase");

if (creditP) {
    creditP.addEventListener("click", (e) => {
        setModalContentPurchaseCreditsView();
    });
}

function changeValueBookmark(id_name, class_name) {
    var xhr = new XMLHttpRequest();
    // Open the connection
    if (class_name == "likeUnselected") {
        xhr.open("GET", `index.php?action=addBookmark&picture_id=${id_name}`);
    } else {
        xhr.open(
            "GET",
            `index.php?action=deleteBookmark&picture_id=${id_name}`
        );
    }
    xhr.addEventListener("load", () => {
        // We manage here an asynchronous request
        if (xhr.status === 200) {
            // if the file is loaded without error
            let content = xhr.responseText;
            let likeDiv = document.getElementById(id_name);
            if (class_name == "likeSelected") {
                likeDiv.className = "likeUnselected";
            } else {
                likeDiv.className = "likeSelected";
            }
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
