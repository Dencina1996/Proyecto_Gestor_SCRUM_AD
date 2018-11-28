<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Login</h1>

    <?php
      echo "<form action='index.php' method='post'>
      <label>User: <input type='text' name='user'></input></label>
      <br>
      <label>Password: <input type='password' name='pass'></input></label>
      <br>
      <input type='submit' value='Send'/>";

      $conn = mysqli_connect('localhost', 'skadi', 'P@ssw0rd');
      mysqli_select_db($conn, 'Scrum_BD');
      if($_POST != NULL ){
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass256 = mysqli_real_escape_string($conn, hash('sha512', $_POST['pass']));
        $userIn = "SELECT Usuario_Usuarios FROM Usuarios WHERE Usuario_Usuarios = '$user' AND Password_Usuarios = '$pass256';";
        var_dump($userIn);
        $result = mysqli_query($conn, $userIn);
        $numCol = mysqli_num_rows($result);
        if ($numCol == 1){
          echo "<br>
            <h2>Te has logueado correctamente: ".$user."</h2>";
        }else{
          echo "<br>
            <h2>No te has logueado correctamente</h2>";
        }
      }

    ?>
  </body>
</html>
