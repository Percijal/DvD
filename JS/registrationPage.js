const info = document.getElementById("info");
const error = document.getElementById("errorDiv");

function validateForm() {
    let email = document.forms["registration"]["e-mail"].value;
    let login = document.forms["registration"]["login"].value;
    let name = document.forms["registration"]["name"].value;
    let surname = document.forms["registration"]["surname"].value;
    let pass = document.forms["registration"]["password"].value;
    let repeatedPass = document.forms["registration"]["passwordRepeated"].value;
    let ifError = true;

    info.innerHTML = "";

    if (!email.includes("@")) {
        info.innerHTML += "<li>Invalid E-mail</li>";
        error.removeAttribute("hidden");
        ifError = false;
    }
    if (login.trim() == "") {
        info.innerHTML += "<li>Invalid login</li>";
        error.removeAttribute("hidden");
        ifError = false;
    }
    if (name.trim() == "") {
        info.innerHTML += "<li>Invalid name</li>";
        error.removeAttribute("hidden");
        ifError = false;
    }
    if (surname.trim() == "") {
        info.innerHTML += "<li>Invalid surname</li>";
        error.removeAttribute("hidden");
        ifError = false;
    }
    if (pass.trim() == "") {
        info.innerHTML += "<li>Invalid password/li>";
        error.removeAttribute("hidden");
        ifError = false;
    }
    if (pass != repeatedPass) {
        info.innerHTML += "<li>Miss matching passwords</li>";
        error.removeAttribute("hidden");
        ifError = false;
    }

    return ifError
    // console.log(pass);
}