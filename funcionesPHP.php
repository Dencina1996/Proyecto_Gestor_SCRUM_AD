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
function enviarEmail($email, $nombre, $asunto, $cuerpo){
  $cabeceras =' From: nicolekingston1990@gmail.com';
  return mail($email,$asunto,$cuerpo,$cabeceras);

	}
 ?>
