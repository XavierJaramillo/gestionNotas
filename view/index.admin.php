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

    $alumnoDAO = new AlumnoDao();
    echo $alumnoDAO->read();

    ?>
    
</body>
</html>