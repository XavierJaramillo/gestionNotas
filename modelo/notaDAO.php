<?php
require_once 'nota.php';
class NotaDao{
    private $pdo;

    public function __construct(){
        include '../modelo/connection.php';
        $this->pdo=$pdo;
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function notas(){
        $id=$_GET['id_alumno_modificar'];
        $query = "SELECT * FROM tbl_notas WHERE id_alumno=?";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>