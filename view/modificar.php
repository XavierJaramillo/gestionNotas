<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <script src="../js/code.js"></script>
    <title>Modificar alumno</title>
</head>
<body>
    <?php
    require_once '../services/session.php';
    include '../modelo/notaDAO.php';
    $nDAO = new NotaDao();
    $pdo = $nDAO->getPDO();
    $pdo->beginTransaction();
    $id = $_GET['id_alumno_modificar'];

    $query = "SELECT * FROM tbl_alumno WHERE id_alumno = $id";
    $sentencia = $pdo->prepare($query);
    $sentencia->execute();
    $persona = $sentencia->fetch(PDO::FETCH_ASSOC);
    $pdo->commit();
    $notas = $nDAO->notas();
    ?>
    <h1>Modificar alumno</h1>
    <div>
        <form action="../view/index.admin.php" method="GET" onsubmit="return validacionNotas()">
        <input type="text" id="id_alumno_modificar" name="id_alumno_modificar" style="display:none" value="<?php echo $persona['id_alumno'];?>">
        
        <label for="nombre_alumno">Nombre:</label><br>
        <input type="text" id="nombre_alumno" name="nombre_alumno" value="<?php echo $persona['nombre_alumno'];?>" disabled><br>
        
        <label for="apellido_paterno">Apellido paterno:</label><br>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona['apellido_paterno'];?>" disabled><br>

        <label for="apellido_materno">Apellido materno:</label><br>
        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $persona['apellido_materno'];?>" disabled><br>

        <label for="grupo_alumno">Grupo:</label><br>
        <input type="text" id="grupo_alumno" name="grupo_alumno" value="<?php echo $persona['grupo_alumno'];?>" disabled><br>

        <label for="email_alumno">Email:</label><br>
        <input type="text" id="email_alumno" name="email_alumno" value="<?php echo $persona['email_alumno'];?>" disabled><br>

        <label for="pass_alumno">Contraseña:</label><br>
        <input type="text" id="pass_alumno" name="pass_alumno" value="<?php echo $persona['pass_alumno'];?>" disabled><br>
        
        <?php
            $i=0;
            $sumaNotas = 0;
            foreach ($notas as $nota) {
                $sumaNotas += $nota['nota_alumno'];
                echo "<label>".$nota['nombre_asignatura']."</label><br>";
                echo "<input type='text' name='nota".$i."' id='nota".$i."' value='".$nota['nota_alumno']."' required><br>";
                $i++;
            }
            $avg = $sumaNotas/$i;
            echo "<label for='nota_media'>Nota media:</label><br>";
            echo "<input type='text' name='notaMedia' id='notaMedia' value='".round($avg)."' disabled><br>";
        ?>
        <p id="msg"></p>
        <input type="submit" value="Insertar">
        </form> 
    </div>
    
</body>
</html>