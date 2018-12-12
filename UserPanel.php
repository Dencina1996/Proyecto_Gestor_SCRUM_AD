<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenid@ - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/UserPanel_CSS/Styles.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script type="text/javascript" src="JS/Scripts.js"></script>
  </head>
  <body onload="allowedOperations()">
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
      while ($Row = $Result->fetch_assoc()) {
        echo "<Profile hidden id='".$Row["Perfil_Usuario"]."'></Profile>";
      }
    ?>

    <!-- GET PROJECTS FROM DATABASE -->

    <?php
      $Connection = new mysqli("localhost", "scrum", "P@ssw0rd", "BD_Scrum");
      $Connection->set_charset("utf8");
      if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s\n", Connection_connect_error());
        exit();
      }
      $Query = "SELECT *  FROM Proyectos";
      echo '<div class="GlobalContainer">';
      echo '<h5 class="GlobalContainerName">Proyectos</h5>';
      if ($Result = $Connection->query($Query)) {
        while ($Row = $Result->fetch_row()) {
          echo "<a><div class='LocalContainer' onclick='showProjectInfo(this)'>";
          echo "<h1 class='ProjectTitle'>$Row[1]</h1>";
          echo "<br>";
          echo "<p class='ProjectDesc'><b>$Row[4]</b></p>";
          echo "<br>";
          echo "<p class='ProjectInfo' hidden>    <b>Fecha de Inicio:</b> ".date('d-m-Y', strtotime($Row[2]))."</p>";
          echo "<p class='ProjectInfo' hidden>    <b>Fecha de Finalización (Prevista):</b> ".date('d-m-Y', strtotime($Row[3]))."</p>";
          echo "<p class='ProjectInfo' hidden>    <b>Product Owner:</b> $Row[5]</p>";
          echo "<p class='ProjectInfo' hidden>    <b>Scrum Master:</b> $Row[6]</p>";
          echo "</div><a>";
        }
      $Result->close();
      }
      $Connection->close();
      echo "</div>";
    ?>
  </body>
</html>