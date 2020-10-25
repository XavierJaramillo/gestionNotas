<?php
require_once 'alumno.php';

class AlumnoDao{
    private $pdo;

    public function __construct(){
        include 'connection.php';
        $this->pdo=$pdo;
    }

    public function read(){
        $query = "SELECT * FROM tbl_alumno;";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<table style='border: 1px solid black'>";
        echo "<tr>";
        echo "<th colspan='2'><a href='añadir_alumno.php'><i class='material-icons'>add_circle_outline</i></a></th>";
        echo "<th colspan='2'><input type='text' id='nombre' placeholder='Tu nombre...'></th>";
        echo "<th colspan='2'><input type='text' id='apellidop' placeholder='Tu apellido...'></th>";
        echo "<th><button type='button'>Filtrar</button></th>";
        echo "</tr>";
        foreach($lista_alumno as $alumno) {
            $id=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td style='border:1px solid black'><a href='modificar.php?id_alumno=$id&'>Modificar</a></th>";
            echo "<td style='border:1px solid black'><a href='eliminar.php?id_alumno=$id&'>Eliminar</a></th>";
            echo "<td style='border:1px solid black'>{$alumno['nombre_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_paterno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_materno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['grupo_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['email_alumno']}</th>";
            echo "</tr>";
        }
        echo "</table>";
        
    }
}