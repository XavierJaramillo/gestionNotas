<?php
        require_once '../modelo/administrador.php';
        session_start();
        //if($_SESSION) {
        if(!isset($_SESSION['user'])) {
            header('Location:../view/index.admin.php');
        }
        $user = $_SESSION['user'];
        echo "<h1>Bienvenido ".$user->getEmail_admin()."</h1>";
?>