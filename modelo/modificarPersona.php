<?php
require_once 'connection.php';

try {
    $pdo->beginTransaction();
    $id=$_GET['id_alumno'];
    $name=$_GET['nombre_alumno'];
    $apellidop=$_GET['apellido_paterno'];
    $apellidom=$_GET['apellido_materno'];
    $grup=$_GET['grupo_alumno'];
    $email=$_GET['email_alumno'];
    $pass=$_GET['pass_alumno'];
    

    $query="UPDATE `tbl_alumno` SET `nombre_alumno`=?,`apellido_paterno`=?,`apellido_materno`=?,`grupo_alumno`=?,`email_alumno`=?,`pass_alumno`=? WHERE `id_alumno`=?";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindParam(1,$name);
    $sentencia->bindParam(2,$apellidop);
    $sentencia->bindParam(3,$apellidom);
    $sentencia->bindParam(4,$grup);
    $sentencia->bindParam(5,$email);
    $sentencia->bindParam(6,$pass);
    $sentencia->bindParam(7,$id);
    $sentencia->execute();

    $pdo->commit();
    header('Location: ../view/index.admin.php');
    
} catch (Exception $e) {
    $pdo->rollBack();
    echo $e;
}


?>