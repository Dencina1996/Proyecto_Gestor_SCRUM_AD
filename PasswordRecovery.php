<?php
  include 'PHPFunctions.php';
  $Checked = null;
  if (!empty($_POST)) {
    $Mail = $_POST['Mail'];
    $Query=$PDO->prepare("SELECT ID_Usuario, Correo_Usuario from Usuarios where Correo_Usuario='$Mail'");
    $Query->execute();
    $Query_Count = $Query->rowcount();
    echo $Mail;
    if($Query_Count!=0){
      $UserData= $Query->fetch();
      $Body = " No responder a este correo.\n
      Link de Recuperación: \n
      https://www.nilarrus.tk/Proyecto_Gestor_SCRUM_AD/pasword.php?user=".$UserData['ID_Usuario'];
      echo $Body;
      $Title = "Resetear contraseña";
      $Headers = "From: NoReply@GestorScrum.com";
      mail($UserData['Correo_Usuario'], $Title, $Body, $Headers);
      $Checked = "Correu enviat";
    } else {
      echo "No existe un usuario con este correo";
    }
  }
 ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>¿Contraseña olvidada? - Gestor Scrum AND</title>
  </head>
  <body>
    <h2>Resetear Contraseña</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="email" class="form-control" name="Mail" placeholder="Mail" required>
        <button type="submit" name="button">Enviar</button>
    </form>
    <?php
      if ($Checked != Null){
        echo $Checked;
      }
    ?>
  </body>
</html>
