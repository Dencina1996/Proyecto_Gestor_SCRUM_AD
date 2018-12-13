<?php
function enviarEmail($email, $nombre, $asunto, $cuerpo){
  $cabeceras =' From: nicolekingston1990@gmail.com';
  return mail($email,$asunto,$cuerpo,$cabeceras);

	}
 ?>
