<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/logout.css">
    <title>Document</title>
</head>
<body>

<?php
include_once '../modelo/notaDAO.php';
require_once '../services/session.php';
$notaDAO = new NotaDao();
$notaDAO->avg();
$notaDAO->avg_mayor();
$notaDAO->bestStudent();
?>

</body>
</html>
