<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir alumno</title>
</head>
<body>
<h1>AÑADIR ALUMNO</h1>

    <?php
        if(isset($_POST['nombre_alumno'])) {
            require_once 'alumnoDAO.php';
            $alumnoDAO = new AlumnoDAO();
            $alumnoDAO->añadir();
            header('LOCATION: ../view/index.admin.php');
        }
    ?>

<form action="../modelo/añadirAlumno.php" method="POST">
  <label for="nombre_alumno">Nombre:</label><br>
  <input type="text" id="nombre_alumno" name="nombre_alumno" required><br>
  <label for="apellido_paterno">Primer apellido:</label><br>
  <input type="text" id="apellido_paterno" name="apellido_paterno" required><br>
  <label for="apellido_materno">Segundo apellido:</label><br>
  <input type="text" id="apellido_materno" name="apellido_materno" required><br>
  <label for="grupo_alumno">Grupo:</label><br>
  <input type="text" id="grupo_alumno" name="grupo_alumno" required><br>
  <label for="email_alumno">Email:</label><br>
  <input type="text" id="email_alumno" name="email_alumno" required><br>
  <label for="pass_alumno">Contraseña:</label><br>
  <input type="text" id="pass_alumno" name="pass_alumno" required><br>
  <input type="submit" value="Submit">
</form> 



</body>
</html>