<?php
  include 'funcionesPHP.php';
  if(!empty($_POST)){
    $email = $mysqli->real_escape_string($_POST['email']);

  }
 ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Recuperacion de Contraseña</title>
  </head>
  <body>
    <h2>Resetear contraseña </h2>
    <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input id="email" type="email" class="form-control" name="email" placeholder="email" required>
        <button type="submit" name="button">Enviar</button>
    </form>
    <?php echo $_POST['email']; ?>
  </body>
</html>
