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
  if (MYSQLI_REPORT_ERROR) {
    echo '<script>alert("Formato de Fecha incorrecto.");</script>';
    header("Location: UserPanel.php");
  }
  $Query = "INSERT INTO Proyectos VALUES (null,'".$PName."','".$PInitD."','".$PFinalD."','".$PDescription."','".$PPO."','".$PSM."')";

  if ($Connection->query($Query) === TRUE) {
    header("location: UserPanel.php");
} else {
    echo "Error: " . $Query . "<br>" . $Connection->error;
}
  
  $Connection->close();
?>