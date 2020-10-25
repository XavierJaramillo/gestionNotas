<?php
require_once 'connection.php';

try {
    $pdo->beginTransaction();
    // RECOGEMOS EL ID DEL ALUMNO
    $id=$_GET['id_alumno'];

    // MIRAMOS SI EN LA TABLA NOTAS HAY ALGUNA NOTA CON LA ID DEL ALUMNO
    $query = "SELECT * FROM tbl_notas WHERE `id_alumno` = ?";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    $lista_notas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // SI NO HAY NINGUNA NOTA SOLO ELIMINAMOS EL ALUMNO, DE LO CONTRARIO ELIMINAMOS ALUMNO Y NOTAS
    if($lista_notas!="") {    
        $query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();    
    } else {
        $query="DELETE FROM `tbl_notas` WHERE `id_alumno` = ?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
    
        $query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();  
    }
    
    $pdo->commit();
    header('Location: ../view/index.admin.php');
    
} catch (Exception $e) {
    $pdo->rollBack();
    echo $e;
}


?>