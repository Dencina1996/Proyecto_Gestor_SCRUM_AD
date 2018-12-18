<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Restablecer Contraseña - Gestor Scrum ADN</title>
     <link rel="stylesheet" type="text/css" href="CSS/Password_CSS/Styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="icon" type="image/png" href="CSS/Logo.png">
  <script type="text/javascript" src="JS/Scripts.js"></script>
  </head>
  <body>
<?php
include 'PHPFunctions.php';
$User;
if(!empty($_GET)){
  $USER =  $_GET['User'];
  //echo $USER;
  if(!empty($_POST)){
    //echo "Tu nueva contraseña es :".$_POST['password'];
    $Password = $_POST['Password'];
    $PDO=Connect();
    $QUERY = $PDO->prepare("UPDATE Usuarios SET Password_Usuario = SHA2('$Password',512) WHERE ID_Usuario = $USER");
    $QUERY->execute();
    $Checked=$QUERY->rowcount();
    //echo $Checked;
    if($Checked != 0){
      echo "<p>Contraseña Restablecida con exito</p>";
    }
    echo "<script type='text/javascript'> setTimeout(function(){ window.location.href ='index.php';},10000); </script>";
  }
}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div id="ContainerDiv">
         <img id="ProjectLogo" src="CSS/Logo.png">
      <br><br>
      <div class="input-container">
        <i class="fas fa-key icon"></i>
        <br><br>
        <input type="password" class="input-field" name="Password" placeholder="Contraseña Nueva" required>
      </div>
        <div class="input-container">
        <i class="fas fa-key icon"></i>
        <br><br>
        <input type="password" class="input-field" name="Password" placeholder="Repetir Nueva Contraseña" required>
      </div>
        <button id="Entrar" type="submit" name="button">Actualizar Contraseña</button>
    </div>
    </form>

  </body>
</html>
