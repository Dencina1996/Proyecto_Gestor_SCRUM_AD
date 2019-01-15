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
      $UP;
      while ($Row = $Result->fetch_assoc()) {
        $UP = $Row["Perfil_Usuario"];
        echo "<Profile hidden id='".$UP."'></Profile>";
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

      if ($UP == "SM") {
        $Query = "SELECT * FROM Proyectos";
      } elseif ($UP != "SM") {
        $Query = "SELECT P.* FROM Proyectos P, Grupos G, Usuarios U
        WHERE P.ID_Proyecto = G.ID_Proyecto AND U.ID_Grupo = G.ID_Grupo AND U.Nombre_Usuario = '".$_SESSION['InputUser']."';";
      }
      
      $consSM = "SELECT Nombre_Apellidos FROM Usuarios WHERE Perfil_Usuario = 'SM';";
      $resultSM = mysqli_query($Connection, $consSM);
    
      echo "<script> var ScrumMasters = [];";

      while($SM = mysqli_fetch_assoc($resultSM)) {

        echo "var Sm = '" . $SM['Nombre_Apellidos'] . "';
            ScrumMasters.push(Sm);";
        }
       



      $consPO = "SELECT Nombre_Apellidos FROM Usuarios WHERE Perfil_Usuario = 'PO';";
      $resultPO = mysqli_query($Connection, $consPO);
    
      echo "var ProductOwners = [];";

      while($PO = mysqli_fetch_assoc($resultPO)) {

        echo "var Po = '" . $PO['Nombre_Apellidos'] . "';
            ProductOwners.push(Po);";
        }
       

        echo "</script>";



      echo '<div class="GlobalContainer">';
      echo '<h5 class="GlobalContainerName">Proyectos</h5>';
      if ($Result = $Connection->query($Query)) {
        while ($Row = $Result->fetch_row()) {
          echo "<a onclick='getProjectInfo($Row[0])'><div class='LocalContainer'>";
          echo "<h1 class='ProjectTitle'>$Row[1]</h1>";
          echo "<br>";
          echo "<p class='ProjectDesc'><b>$Row[4]</b></p>";
          echo "<br>";
          echo "</div><a>";
        }
      $Result->close();
      }
      $Connection->close();
      echo "</div>";
    ?>
  </body>
</html>
