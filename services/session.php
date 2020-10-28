<?php
        require_once '../modelo/administrador.php';
        session_start();
        //if($_SESSION) {
        if(!isset($_SESSION['user'])) {
            header('Location:../view/index.admin.php');
        }
        $user = $_SESSION['user'];
        echo "<div class='logout'>";
        echo "<h1>Bienvenido ".$user->getEmail_admin()."</h1>";
       
        echo "<a href='../services/logout.proc.php'>Logout</a>";
        echo "</div>";
?>