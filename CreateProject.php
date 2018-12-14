<?php
  // POST VARS
    $PName = $_POST['PName'];
    $PInitD = $_POST['PInitD'];
    $PFinalD = $_POST['PFinalD'];
    $PPO = $_POST['PPO'];
    $PSM = $_POST['PSM'];
    $PDescription = $_POST['PDescription'];

  $Connection = new mysqli("localhost", "scrum", "P@ssw0rd", "BD_Scrum");
  $Connection->set_charset("utf8");
  if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", Connection_connect_error());
    exit();
  }
  $Query = "INSERT INTO Proyectos VALUES (null,'".$PName."','".$PInitD."','".$PFinalD."','".$PDescription."','".$PPO."','".$PSM."')";

  if ($Connection->query($Query) === TRUE) {
    header("location: UserPanel.php");
} else {
    echo "Error: " . $Query . "<br>" . $Connection->error;
}
  
  $Connection->close();
?>