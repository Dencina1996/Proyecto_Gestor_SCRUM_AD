<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenid@ - Scrum AD</title>
    <link rel="stylesheet" type="text/css" href="CSS/UserPanel_CSS/Styles.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>

      <?php
      session_start();
      echo "<header>
              <div class='logo'>
                Gestor Scrum
                <span class='logo'>
                  <i class='fas fa-stroopwafel'></i>
                </span>
              </div>
              <nav>
                <ul id='menu'>
                  <li><a><i class='fas fa-user-circle'></i> ".$_SESSION['InputUser']."</a>
                    <ul>
                      <li><a href='Logout.php'>logout</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </header>";
      ?>
  </body>
</html>
