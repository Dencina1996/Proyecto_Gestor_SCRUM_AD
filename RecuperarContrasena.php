<?php
  include 'funcionesPHP.php';
  $confirmacio = null;
  if(!empty($_POST)){
    $email = $_POST['email'];
    $pdo = conectar();
    //echo $email;
    $query=$pdo->prepare("SELECT Nombre_Usuario from Usuarios where Correo_Usuario='$email'");
    $query->execute();
    $numQuery = $query->rowcount();
    if($numQuery!=0){
      $datoUser= $query->fetch();
      $cuerpo = "https://www.nilarrus.tk/Proyecto_Gestor_SCRUM_AD/pasword.php?=$datoUser[0]";
      echo $cuerpo;
      mail($email,"Resetear contraseña",$cuerpo);
      $confirmacio = "Correu enviat";
    }else{
      echo "No existe un usuario con este correo";
    }
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
    <?php if($confirmacio!=Null){
      echo $confirmacio;
    } ?>
  </body>
</html>
