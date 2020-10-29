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
            echo "<td><a class='aREF' href='../view/modificar.php?id_alumno_modificar=$id&'>Modificar</a></th>";
            echo "<td><a class='aREF' href='../view/index.admin.php?id_alumno_eliminar=$id'>Eliminar</a></th>";
            echo "<td>{$alumno['nombre_alumno']}</th>";
            echo "<td>{$alumno['apellido_paterno']}</th>";
            echo "<td>{$alumno['apellido_materno']}</th>";
            echo "<td>{$alumno['grupo_alumno']}</th>";
            echo "<td>{$alumno['email_alumno']}</th>";
            echo "</tr>";
        }
    
    }
    
    public function filtro(){
        $query = "SELECT * FROM tbl_alumno WHERE nombre_alumno = '{$_POST['nombre_alumno']}' OR apellido_paterno = '{$_POST['apellido_paterno']}'";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($lista_alumno as $alumno) {
            $id=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td style='border:1px solid black'><a href='../view/modificar.php?id_alumno_modificar=$id&'>Modificar</a></th>";
            echo "<td style='border:1px solid black'><a href='../view/index.admin.php?id_alumno_eliminar=$id'>Eliminar</a></th>";
            echo "<td style='border:1px solid black'>{$alumno['nombre_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_paterno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['apellido_materno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['grupo_alumno']}</th>";
            echo "<td style='border:1px solid black'>{$alumno['email_alumno']}</th>";
            echo "</tr>";
        }
    }

    public function añadir(){
        try {
            $this->pdo->beginTransaction();
            // RECOGEMOS LOS DATOS DEL NUEVO ALUMNO
            $nombre=$_POST['nombre_alumno'];
            $apellidop=$_POST['apellido_paterno'];
            $apellidom=$_POST['apellido_materno'];
            $grupo=$_POST['grupo_alumno'];
            $email=$_POST['email_alumno'];
            $pass=md5($_POST['pass_alumno']);
        
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

            $id_alumno = $this->pdo->lastInsertId();
            $query = "INSERT INTO `tbl_notas` (`nombre_asignatura`, `id_alumno`, `nota_alumno`) VALUES ('Mates', ?, 0)";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id_alumno);
            $sentencia->execute();

            $query = "INSERT INTO `tbl_notas` (`nombre_asignatura`, `id_alumno`, `nota_alumno`) VALUES ('Fisica', ?, 0)";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id_alumno);
            $sentencia->execute();

            $query = "INSERT INTO `tbl_notas` (`nombre_asignatura`, `id_alumno`, `nota_alumno`) VALUES ('Programacion', ?, 0)";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id_alumno);
            $sentencia->execute();

            $this->pdo->commit();
            header('Location: ../view/index.admin.php');
            
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo $e;
        }
    }

    public function eliminar() {
        try {
        $this->pdo->beginTransaction();
        // RECOGEMOS EL ID DEL ALUMNO
        $id=$_GET['id_alumno_eliminar'];

        // MIRAMOS SI EN LA TABLA NOTAS HAY ALGUNA NOTA CON LA ID DEL ALUMNO
        $query = "SELECT * FROM tbl_notas WHERE `id_alumno` = ?";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $lista_notas=$sentencia->rowCount(PDO::FETCH_ASSOC);

        // SI NO HAY NINGUNA NOTA SOLO ELIMINAMOS EL ALUMNO, DE LO CONTRARIO ELIMINAMOS ALUMNO Y NOTAS
        if($lista_notas<0) {    
            $query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();    
        } else {
            $query="DELETE FROM `tbl_notas` WHERE `id_alumno` = ?";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();
        
            $query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();  
        }
        
        $this->pdo->commit();
        header('Location: ../view/index.admin.php');
        
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo $e;
        }
    }

    public function modificar() {
        try {
            $this->pdo->beginTransaction();
            $id=$_GET['id_alumno_modificar'];
            $nota0=$_GET['nota0'];
            $nota1=$_GET['nota1'];
            $nota2=$_GET['nota2'];
            

            $query="UPDATE `tbl_notas` SET `nota_alumno`=? WHERE `id_alumno`=? AND `nombre_asignatura` LIKE 'Mates'";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$nota0);
            $sentencia->bindParam(2,$id);
            $sentencia->execute();

            $query="UPDATE `tbl_notas` SET `nota_alumno`=? WHERE `id_alumno`=? AND `nombre_asignatura` LIKE 'Fisica'";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$nota1);
            $sentencia->bindParam(2,$id);
            $sentencia->execute();

            $query="UPDATE `tbl_notas` SET `nota_alumno`=? WHERE `id_alumno`=? AND `nombre_asignatura` LIKE 'Programacion'";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$nota2);
            $sentencia->bindParam(2,$id);
            $sentencia->execute();

            $this->pdo->commit();
            header('Location: ../view/index.admin.php');
            
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo $e;
        }
    }
    

}