<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenid@ - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/Project_View_CSS/Styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/Cursors.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="icon" type="image/png" href="CSS/Logo.png">
    <link rel="stylesheet" href="CSS/Project_View_CSS/Styles.css">
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
    <!-- GET PROFILE TYPE -->
    <?php
      echo "<Profile hidden id='".$_SESSION['TUser']."'></Profile>";
     ?>

    <!-- GET PROJECT INFO -->

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
          echo "<div class='LocalContainer'>";
          echo "<h1 class='ProjectTitle'>$Row[1]</h1>";
          echo "<br>";
          echo "<p class='ProjectDesc'><b>$Row[4]</b></p>";
          echo "<br>";
          echo "<p class='ProjectInfo'><b>Fecha de Inicio:</b> ".date('d-m-Y', strtotime($Row[2]))."</p>";
          echo "<p class='ProjectInfo'><b>Fecha de Finalización (Prevista):</b> ".date('d-m-Y', strtotime($Row[3]))."</p>";
          echo "<p class='ProjectInfo'><b>Product Owner:</b> $Row[5]</p>";
          echo "<p class='ProjectInfo'><b>Scrum Master:</b> $Row[6]</p>";

          echo "</div>";
        }
    }
      echo "</div>";
    ?>

    <div class="GlobalContainer">
    <h5 class="GlobalContainerName">Sprints/Especificaciones</h5>

    <!-- GET SRINTS -->

    <?php
      $BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');
      $BBDD->exec('SET NAMES utf8');
      $Query = $BBDD->prepare("SELECT * FROM Sprints WHERE ID_Proyecto = :InputProject;");
      $Query->bindValue(":InputProject",$ProjectID);
      $Query->execute();
      $Res =$Query ->rowCount();
      echo '<div class="GlobalContainer" style="float: left; width: 40%;">';
      if ($Res!=0) {
        while ($Row = $Query->fetch(PDO::FETCH_NUM)) {
          if($Row[5]=='Acabado'){
            echo "<div class='accordion' style='background-color:grey;'>";
          }elseif ($Row[5]=='En curso') {
            echo "<div class='accordion' style='background-color:green;'>";
          }elseif ($Row[5]=='Por empezar') {
            echo "<div class='accordion' style='background-color:black;'>";
          }

          echo "<div class='SpecsTitle'>Sprint $Row[0]</div><div class='removeSpring'><button hidden type='button' name='button'>-</button></div></div>";
          echo "<div class='panel'>";
          echo "</br>";
          echo "<p class='SpecsInfo'><b>Fecha de Inicio:</b> ".date('d-m-Y', strtotime($Row[2]))."</p>";
          echo "<p class='SpecsInfo'><b>Fecha de Finalización:</b> ".date('d-m-Y', strtotime($Row[3]))."</p>";
          echo "<p class='SpecsInfo'><b>Nº Horas asignadas:</b> $Row[4]</p>";
          echo "<p name='Status' class='SpecsInfo'><b>Estado:</b> $Row[5]</p>";
          echo "</div>";
        }
        echo "</div>";
      }
    ?>

    <?php
      $BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');
      $BBDD->exec('SET NAMES utf8');
      $Query = $BBDD->prepare("SELECT * FROM Especificaciones WHERE ID_Proyecto = :InputProject;");
      $Query->bindValue(":InputProject",$ProjectID);
      $Query->execute();
      $Res =$Query ->rowCount();
      echo '<div class="GlobalContainer" style="float: right; width: 40%;">';
      if ($Res!=0) {
        while ($Row = $Query->fetch(PDO::FETCH_NUM)) {
          echo "<a><div class='SpecsContainer' style='right: 300px'>";
          echo "<div class='SpecsTitle'>$Row[1]</div>";
          echo "<br>";
          echo "</div><a>";
        }
        echo "</div>";
      }
    ?>

</div>
    </div>
    <script src="JS/acordion.js"  type="text/javascript"></script>
  </body>
</html>
