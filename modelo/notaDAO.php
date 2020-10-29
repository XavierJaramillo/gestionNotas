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

    public function avg(){
        $query = "SELECT AVG(nota_alumno), nombre_asignatura FROM tbl_notas GROUP BY nombre_asignatura";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $lista_notas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<h2>Media por materia</h2>";
        echo "<table id='table'>";
        echo "<tr>";
        echo "<th>Asignatura</th>";
        echo "<th>Nota media</th>";
        echo "</tr>";
        foreach ($lista_notas as $nota) {
            echo "<tr>";
            echo "<td>";
            echo $nota['nombre_asignatura'];
            echo "</td>";
            echo "<td>";
            echo number_format($nota['AVG(nota_alumno)'], 2);
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function avg_mayor() {
        $query = "SELECT AVG(nota_alumno), nombre_asignatura FROM tbl_notas GROUP BY nombre_asignatura ORDER BY AVG(nota_alumno) DESC LIMIT 1";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $lista_notas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<h2>Media más alta</h2>";
        echo "<table id='table'>";
        echo "<tr>";
        echo "<th></th>";
        echo "<th>Asignatura</th>";
        echo "<th>Nota media</th>";
        echo "</tr>";
        foreach ($lista_notas as $nota) {
            echo "<tr>";
            echo "<td>";
            echo "La materia con la nota más alta:";
            echo "</td>";
            echo "<td>";
            echo $nota['nombre_asignatura'];
            echo "</td>";
            echo "<td>";
            echo number_format($nota['AVG(nota_alumno)'], 2);
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function bestStudent() {
        $query = "SELECT qry_nota_max.nombre_asignatura, qry_nota_max.nota_max, MAX(tbl_alumno.nombre_alumno) AS alumno 
        FROM (SELECT tbl_notas.nombre_asignatura, MAX(tbl_notas.nota_alumno) AS nota_max 
        FROM tbl_notas GROUP BY tbl_notas.nombre_asignatura) AS qry_nota_max INNER JOIN tbl_notas ON tbl_notas.nombre_asignatura = qry_nota_max.nombre_asignatura AND tbl_notas.nota_alumno = qry_nota_max.nota_max INNER JOIN tbl_alumno ON tbl_notas.id_alumno = tbl_alumno.id_alumno GROUP BY tbl_notas.nombre_asignatura ORDER BY tbl_alumno.nombre_alumno DESC";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $lista_notas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<h2>Mejores alumnos por materias</h2>";
        echo "<table id='table'>";
        echo "<tr>";
        echo "<th>Asignatura</th>";
        echo "<th>Nota más alta</th>";
        echo "<th>Alumno</th>";
        echo "</tr>";
        foreach ($lista_notas as $nota) {
            echo "<tr>";
            echo "<td>";
            echo $nota['nombre_asignatura'];
            echo "</td>";
            echo "<td>";
            echo $nota['nota_max'];
            echo "</td>";
            echo "<td>";
            echo $nota['alumno'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    }


        
    

}
?>