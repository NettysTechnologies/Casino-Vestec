function formSubmit() {
    var data = new FormData();
    data.append("email", document.getElementById("email").value);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "database/saveEmail.php");

    xhr.onload = function () {
        document.getElementById("form").reset();
        if (this.response == "true") {
            window.location.href = "diky.html"
        } else {
            alert("Email se již nachází v databázi");
        }
    };
    xhr.send(data);

    return false;
}