<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenid@ - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/UserPanel_CSS/Styles.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>
    <header>
      <?php
      session_start();

      echo "<div class='logo'>
              Gestor Scrum
            </div>
            <nav>
              <ul id='menu'>
                <li><a><i class='fas fa-user-circle'></i> ".$_SESSION['InputUser']."</a>
                  <ul>
                    <li><a href='Logout.php'>logout</a></li>
                  </ul>
                </li>
              </ul>
            </nav>";
      ?>
    </header>

    <?php
    $mysqli = new mysqli("localhost", "scrum", "P@ssw0rd", "BD_Scrum");
    if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s\n", mysqli_connect_error());
        exit();
    }
    //$tipoUsuario = "SELECT Perfil_Usuario FROM Usuarios WHERE Nombre_Usuario = ".$_SESSION['InputUser']."";
    $consulta = "SELECT Nombre_Proyecto, Descripcion_Proyecto FROM Proyectos";
    ?>

    <div class="contenedorGlobal">
      <h5 class="nombreContenedorGlobal">Proyectos</h5>
      <?php
      if ($resultado = $mysqli->query($consulta)) {
          while ($fila = $resultado->fetch_row()) {
            echo "
            <a href=''><div class='contenedorLocal'>
              <h1 class='tituloProyecto'>$fila[0]</h1>
              <br>
              <p class='descProyecto'>$fila[1]</p>
            </div><a>
            ";
          }
          $resultado->close();
      }
      $mysqli->close();
       ?>
    </div>
    <footer>
      David y Adrià
    </footer>
  </body>
</html>
