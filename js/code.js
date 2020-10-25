function validacionForm() {
    var email = document.getElementById('email').value;
    var pass = document.getElementById('psswd').value;
    var msg = document.getElementById('message');

    if (email == "" && pass == "") {
        msg.innerHTML = "Ambos campos vacios!";
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('psswd').style.borderColor = "red";
    } else if (email == "") {
        msg.innerHTML = "Falta el email por rellenar!";
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('psswd').style.borderColor = "#ccc";
    } else if (pass == "") {
        msg.innerHTML = "Falta la contraseña por rellenar!";
        document.getElementById('psswd').style.borderColor = "red";
        document.getElementById('email').style.borderColor = "#ccc";
    } else {
        return true;
    }
    return false;
}