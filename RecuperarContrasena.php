<?php
  include 'funcionesPHP.php';
  $confirmacio = null;
  if(!empty($_POST)){
    $email = $_POST['email'];
    $pdo = conectar();
    //echo $email;
    $query=$pdo->prepare("SELECT Nombre_Usuario, Correo_Usuario from Usuarios where Correo_Usuario='$email'");
    $query->execute();
    $numQuery = $query->rowcount();
    echo $email;  
 if($numQuery!=0){
      $datoUser= $query->fetch();
      $cuerpo = "https://www.nilarrus.tk/Proyecto_Gestor_SCRUM_AD/pasword.php?user=".$datoUser['Nombre_Usuario'];
      echo $cuerpo;
      $titulo = "Resetear contraseña";
      mail($datoUser['Correo_Usuario'],$titulo,$cuerpo);
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
