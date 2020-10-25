<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar alumno</title>
</head>
<body>
    <h1>Modificar alumno</h1>
    <?php
    include_once '../modelo/connection.php';

    $pdo->beginTransaction();
    $id = $_GET['id_alumno'];

    $query = "SELECT * FROM tbl_alumno WHERE id_alumno = $id";
    $sentencia = $pdo->prepare($query);
    $sentencia->execute();
    $persona = $sentencia->fetch(PDO::FETCH_ASSOC);
    $pdo->commit();
    // print_r($persona);
    ?>

    <form action="../modelo/modificarPersona.php" method="GET">
    <input type="text" id="id_alumno" name="id_alumno" style="display:none" value="<?php echo $persona['id_alumno'];?>">
    <label for="nombre_alumno">Nombre:</label><br>
    <input type="text" id="nombre_alumno" name="nombre_alumno" value="<?php echo $persona['nombre_alumno'];?>"><br>
    
    <label for="apellido_paterno">Apellido paterno:</label><br>
    <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona['apellido_paterno'];?>"><br>

    <label for="apellido_materno">Apellido materno:</label><br>
    <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $persona['apellido_materno'];?>"><br>

    <label for="grupo_alumno">Grupo:</label><br>
    <input type="text" id="grupo_alumno" name="grupo_alumno" value="<?php echo $persona['grupo_alumno'];?>"><br>

    <label for="email_alumno">Email:</label><br>
    <input type="text" id="email_alumno" name="email_alumno" value="<?php echo $persona['email_alumno'];?>"><br>

    <label for="pass_alumno">Contraseña:</label><br>
    <input type="text" id="pass_alumno" name="pass_alumno" value="<?php echo $persona['pass_alumno'];?>"><br>
    <input type="submit" value="Insertar">
    </form> 
</body>
</html>