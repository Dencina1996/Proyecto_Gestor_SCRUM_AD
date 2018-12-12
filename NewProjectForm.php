<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear Proyecto - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/UserPanel_CSS/Styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/Index_CSS/Styles.css">
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
    <form action="Access.php" onsubmit="return validarLogin();" method="POST">
    <div id="ContainerDiv">
      <img id="ProjectLogo" src="CSS/Logo.png">
      <br><br>
      <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" name="InputUser" placeholder="Usuario" autofocus onclick="changeColor(this)">
      </div>
      <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" name="InputPassword" placeholder="Contraseña" onclick="changeColor(this)">
      </div>
      <button id="Entrar">Entrar</button>
    </div>
  </form>
  </body>
</html>