<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>¿Contraseña Olvidada? - Gestor Scrum ADN</title>
    <link rel="stylesheet" type="text/css" href="CSS/Password_CSS/Styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="CSS/Cursors.css">
  <link rel="icon" type="image/png" href="CSS/Logo.png">
  <script type="text/javascript" src="JS/Scripts.js"></script>
  </head>
  <body>
    <?php
  include 'PHPFunctions.php';
  $Checked = null;
  if (!empty($_POST)) {
    $PDO = Connect();
    $Mail = $_POST['Mail'];
    $Query = $PDO->prepare("SELECT ID_Usuario, Correo_Usuario from Usuarios where Correo_Usuario='$Mail'");
    $Query->execute();
    $Query_Count = $Query->rowcount();
    //echo $Mail;
    if($Query_Count!=0){
      $UserData= $Query->fetch();
      $Body = " No responder a este correo.\n
      Link de Recuperación: \n
      https://www.nilarrus.tk/Proyecto_Gestor_SCRUM_AD/Password.php?user=".$UserData['ID_Usuario'];
      //echo $Body;
      $Title = "Resetear Contraseña";
      $Headers = "From: NoReply@GestorScrum.com";
      mail($UserData['Correo_Usuario'], $Title, $Body, $Headers);
    } else {
      echo '<script>createError("Dirección de Correo no válida");</script>';
    }
  }
 ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div id="ContainerDiv">
         <img id="ProjectLogo" src="CSS/Logo.png">
      <br><br>
      <div class="input-container">
        <i class="far fa-envelope icon"></i>
        <br><br>
        <input type="email" class="input-field" name="Mail" placeholder="Introduce tu Correo Electrónico" required autofocus>
      </div>
        <button id="Entrar" type="submit" name="button">Enviar</button>
    </form>
    <?php
      if ($Checked != Null){
        echo $Checked;
      }
    ?>
  </body>
</html>