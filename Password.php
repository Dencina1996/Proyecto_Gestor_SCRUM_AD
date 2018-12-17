<?php
include 'PHPFunctions.php';
$usuario;
if(!empty($_GET)){
  $USER =  $_GET['user'];
  //echo $USER;
  if(!empty($_POST)){
    //echo "Tu nueva contraseña es :".$_POST['password'];
    $Password = $_POST['password'];
    $PDO=Connect();
    $QUERY = $PDO->prepare("UPDATE Usuarios SET Password_Usuario = SHA2('$Password',512) WHERE ID_Usuario = $USER");
    $QUERY->execute();
    $Checked=$query->rowcount();
    //echo $Checked;
    if($Checked != 0){
      echo "<p>Contraseña Restablecida con exito</p>";
    }
    echo "<script type='text/javascript'> setTimeout(function(){ window.location.href ='index.php';},10000); </script>";
  }
}

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Restablecer Contraseña</title>
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
