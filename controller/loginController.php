<?php

require_once "../modelo/alumno.php";
require_once "../modelo/administrador.php";
require_once "../modelo/personaDAO.php";

if(isset($_POST['email'])) {
    $admin = new Administrador($_POST['email'], md5($_POST['psswd']));
    $personaDAO = new personaDAO();
    if($personaDAO->login($admin)) {
        header('Location: ../view/index.admin.php');
    } else {
        header('Location: ../view/login.php');
    }
} else {
    header('Location: ../view/login.php');
}