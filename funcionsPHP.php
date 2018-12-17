<?php
function conectar(){
  try {
    $user = 'scrum';
    $pasword = 'P@ssw0rd';
    $pdo = new PDO ("mysql:host=localhost;dbname=BD_Scrum","$user","$pasword");

  } catch (PDOException $e) {
    echo "Failed to get db handler : ".$e->getMessage()."\n";
  }
  return $pdo;
}
 ?>
