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

function validacionNotas() {
    var nota0 = document.getElementById('nota0').value;
    var nota1 = document.getElementById('nota1').value;
    var nota2 = document.getElementById('nota2').value;
    var msg = document.getElementById('msg');
    if ((nota0 < 0 || nota0 > 10) || (nota1 < 0 || nota1 > 10) || (nota2 < 0 || nota2 > 10)) {
        msg.innerHTML = "El valor de la nota debe estar entre 0 y 10!";
        return false;
    } else {
        return true;
    }
}