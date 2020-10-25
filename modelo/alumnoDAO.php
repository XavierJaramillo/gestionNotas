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
        
        foreach($lista_alumno as $alumno) {
            $id=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td style='border:1px solid black'><a href='../view/modificar.php?id_alumno=$id&'>Modificar</a></th>";
            echo "<td style='border:1px solid black'><a href='../modelo/eliminarAlumno.php?id_alumno=$id'>Eliminar</a></th>";
            echo "<td style='border:1px solid black'>{$alumno['nombre_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_paterno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_materno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['grupo_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['email_alumno']}</th>";
            echo "</tr>";
        }
    
    }
    
    public function filtro(){
        include_once 'connection.php';
        $query = "SELECT * FROM tbl_alumno WHERE nombre_alumno = '{$_POST['nombre_alumno']}' OR apellido_paterno = '{$_POST['apellido_paterno']}'";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($lista_alumno as $alumno) {
            $id=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td style='border:1px solid black'><a href='../view/modificar.php?id_alumno=$id&'>Modificar</a></th>";
            echo "<td style='border:1px solid black'><a href='../modelo/eliminarAlumno.php?id_alumno=$id'>Eliminar</a></th>";
            echo "<td style='border:1px solid black'>{$alumno['nombre_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_paterno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_materno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['grupo_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['email_alumno']}</th>";
            echo "</tr>";
        }
    }

    public function añadir(){
        include_once 'connection.php';

        try {
            $this->pdo->beginTransaction();
            // RECOGEMOS LOS DATOS DEL NUEVO ALUMNO
            $nombre=$_POST['nombre_alumno'];
            $apellidop=$_POST['apellido_paterno'];
            $apellidom=$_POST['apellido_materno'];
            $grupo=$_POST['grupo_alumno'];
            $email=$_POST['email_alumno'];
            $pass=$_POST['pass_alumno'];
        
            // MIRAMOS SI EN LA TABLA NOTAS HAY ALGUNA NOTA CON LA ID DEL ALUMNO
            $query = "INSERT INTO `tbl_alumno` (`nombre_alumno`, `apellido_paterno`, `apellido_materno`, 
            `grupo_alumno`, `email_alumno`, `pass_alumno`) VALUES (?, ?, ?, ?, ?, ?)";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$nombre);
            $sentencia->bindParam(2,$apellidop);
            $sentencia->bindParam(3,$apellidom);
            $sentencia->bindParam(4,$grupo);
            $sentencia->bindParam(5,$email);
            $sentencia->bindParam(6,$pass);
            $sentencia->execute();
            
            $this->pdo->commit();
            header('Location: ../view/index.admin.php');
            
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo $e;
        }
    }
    

}