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
  <body>
    <header>
      <?php
        $ProjectID = $_POST['PDI'];
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
      $BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');
      $BBDD->exec('SET NAMES utf8');
      $Query = $BBDD->prepare("SELECT P.* FROM Proyectos P WHERE P.ID_Proyecto = :InputProject;");
      $Query->bindValue(":InputProject",$ProjectID);
      echo '<div class="GlobalContainer">';
      echo '<h5 class="GlobalContainerName">Proyecto</h5>';
      $Query->execute();
      $Res =$Query ->rowCount();
      if ($Res!=0) {
        while ($Row = $Query->fetch(PDO::FETCH_NUM)) {
          echo "<a><div class='LocalContainer'>";
          echo "<h1 class='ProjectTitle'>$Row[1]</h1>";
          echo "<br>";
          echo "<p class='ProjectDesc'><b>$Row[4]</b></p>";
          echo "<br>";
          echo "<p class='ProjectInfo'><b>Fecha de Inicio:</b> ".date('d-m-Y', strtotime($Row[2]))."</p>";
          echo "<p class='ProjectInfo'><b>Fecha de Finalización (Prevista):</b> ".date('d-m-Y', strtotime($Row[3]))."</p>";
          echo "<p class='ProjectInfo'><b>Product Owner:</b> $Row[5]</p>";
          echo "<p class='ProjectInfo'><b>Scrum Master:</b> $Row[6]</p>";

          echo "</div><a>";
        }
    }
      echo "</div>";
    ?>
  </body>
</html>
