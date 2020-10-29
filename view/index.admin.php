<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<?php
require_once '../services/session.php';
?>
    <table id='table' class="opciones">
        <tr>
            <form action='index.admin.php' method='POST'>
                <th colspan='2'><a href='../view/añadirAlumno.php'>Añadir alumno</a></th>
                <th>Filtrar por → <input type='text' id='nombre_alumno' name='nombre_alumno' placeholder='Tu nombre...'></th>
                <th>Filtrar por → <input type='text' id='apellido_paterno' name='apellido_paterno' placeholder='Tu apellido...'></th>
                <th colspan='2'>Aplicar filtro → <input type='submit' name='filtrar'></th>
                <th><a href='../view/avg.php'>Más información.</a></th>
            </form>
        </tr>
    </table>

    <?php
    require_once '../modelo/alumnoDAO.php';

    echo "<table id='table'>";
    echo "<tr>";
    echo "<form action='index.admin.php' method='POST'>";
    echo "<th colspan='2'><p>Opciones</p></th>";
    echo "<th><p>Nombre<p></th>";
    echo "<th><p>Primer apellido</p></th>";
    echo "<th><p>Segundo apellido</p></th>";
    echo "<th><p>Grupo</p></th>";
    echo "<th><p>Email</p></th>";
    echo "</tr>";
    
    if(isset($_GET['id_alumno_eliminar'])){
        $alumnoDAO = new AlumnoDAO;
        echo $alumnoDAO->eliminar();
    }

    if(isset($_GET['id_alumno_modificar'])) {
        $alumnoDAO = new AlumnoDAO;
        echo $alumnoDAO->modificar();
    }

    if(empty($_POST['filtrar'])) {
        $alumnoDAO = new AlumnoDAO;
        echo $alumnoDAO->read();
    } else if(empty($_POST['nombre_alumno']) && empty($_POST['apellido_paterno'])) {
        $alumnoDAO = new AlumnoDAO;
        echo $alumnoDAO->read();
    } else if(isset($_POST['nombre_alumno']) && empty($_POST['apellido_paterno'])) {
        $alumnoDAO = new AlumnoDAO;
        $alumnoDAO->filtro();
    } else if(empty($_POST['nombre_alumno']) && isset($_POST['apellido_paterno'])) {
        $alumnoDAO = new AlumnoDAO;
        $alumnoDAO->filtro();
    } else if(isset($_POST['nombre_alumno']) && isset($_POST['apellido_paterno'])) {
        $alumnoDAO = new AlumnoDAO;
        $alumnoDAO->filtro2();
    }

    echo "</table>";

    ?>
    
</body>
</html>