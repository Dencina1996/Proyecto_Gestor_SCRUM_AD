<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenid@ - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/UserPanel_CSS/Styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/Cursors.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="icon" type="image/png" href="CSS/Logo.png">
    <script type="text/javascript" src="JS/Scripts.js"></script>
  </head>
  <body onload="allowedOperations(), hidePreviousProjects()">
    <header>
      <?php
        session_start();
        echo "<div class='Logo'>Gestor Scrum</div>";
        echo "<nav>";
          echo "<ul id='Menu'>";
            echo "<li><a><i class='fas fa-user-circle'></i> ".$_SESSION['InputUser']."</a>";
            echo "<ul>";
              echo "<li><a href='Logout.php'>Cerrar Sesión</a></li>";
            echo "</ul>";
            echo "</li>";
          echo "</ul>";
        echo "</nav>";
      ?>
    </header>

    <!-- GET USER'S PROFILE TYPE (HIDDEN) -->

    <?php
      $Connection = new mysqli("localhost", "scrum", "P@ssw0rd", "BD_Scrum");
      $Connection->set_charset("utf8");
      $Query = "SELECT Perfil_Usuario FROM Usuarios WHERE Nombre_Usuario = '".$_SESSION['InputUser']."'";
      $Result = $Connection->query($Query);
      $UP;
      while ($Row = $Result->fetch_assoc()) {
        $UP = $Row["Perfil_Usuario"];
        echo "<Profile hidden id='".$UP."'></Profile>";
      }
    ?>
    Projects View
    <?php
      $DUMP = $_POST['PDI'];
      echo $DUMP;
    ?>
  </body>
</html>
