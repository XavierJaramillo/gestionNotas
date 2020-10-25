<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../services/session.php';
    require_once '../modelo/alumnoDAO.php';

    echo "<table style='border: 1px solid black'>";
    echo "<tr>";
    echo "<form action='index.admin.php' method='POST'>";
    echo "<th colspan='2'><a href='../modelo/añadirAlumno.php'><i class='material-icons'>add_circle_outline</i></a></th>";
    echo "<th colspan='2'><input type='text' id='nombre_alumno' name='nombre_alumno' placeholder='Tu nombre...'></th>";
    echo "<th colspan='2'><input type='text' id='apellido_paterno' name='apellido_paterno' placeholder='Tu apellido...'></th>";
    echo "<th><input type='submit' name='filtrar'></button></th>";
    echo "</tr>";
    
    if (empty($_POST['filtrar'])){
        $alumnoDAO=new AlumnoDAO;
        echo $alumnoDAO->read();
    } else if (empty($_POST['nombre_alumno']) && empty($_POST['apellido_paterno'])) {
        $alumnoDAO=new AlumnoDAO;
        echo $alumnoDAO->read();
    } else if (isset($_POST['nombre_alumno']) || isset($_POST['apellido_paterno'])){
        $alumnoDAO=new AlumnoDAO;
        $alumnoDAO->filtro();
     }

    echo "</table>";

    ?>
    
</body>
</html>