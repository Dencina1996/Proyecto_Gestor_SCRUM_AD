<?php
include 'PHPFunctions.php';
$usuario;
if(!empty($_GET)){
  $usuario =  $_GET['user'];
  echo $usuario;
  if(!empty($_POST)){
    echo "Tu nueva contraseña es :".$_POST['password'];
    $password = $_POST['password'];
    $pdo=conectar();
    $query = $pdo->prepare("UPDATE Usuarios SET Password_Usuario = SHA2('$password',512) WHERE ID_Usuario = $usuario");
    $query->execute();
    $Correcto=$query->rowcount();
    echo $Correcto;
    if($Correcto != 0){
      echo "<p>Contraseña Restablecida con exito</p>";
    }
    echo "<script type='text/javascript'> setTimeout(function(){ window.location.href ='index.php';},10000); </script>";
  }
}

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Recuperar Contraseña</title>
  </head>

  <body>

    <h2>Restablecer contraseña</h2>
    <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label>Nuevo password</label>
        <input type="password" class="form-control" name="password" placeholder="new password" required></br>
        <label>Repite password</label>
          <input type="password" class="form-control" name="password" placeholder="new password" required></br>
        <button type="submit" name="button">Cambiar</button>
    </form>
  </body>
</html>
