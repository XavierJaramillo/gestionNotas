<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <title>Login</title>
</head>

<body>

<div class="form">
    <h1>Login</h1>
  <form action="../controller/loginController.php" method="POST" onsubmit="return validacionForm()">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email..">

    <label for="psswd">Contraseña</label>
    <input type="password" id="psswd" name="psswd" placeholder="Your password..">
  
    <input type="submit" value="Submit">
  </form>
  <div id="message"></div>
</div>

</body>

</html>