<?php

	$Usuario = $_POST["InputUser"];
	$Contrasenya = $_POST["InputPassword"];

	$BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','Dencina','P@ssw0rd');

	$Query = $BBDD->prepare('SELECT Nombre_Usuario, Password_Usuario FROM Usuarios WHERE Nombre_Usuario=:InputUser AND Password_Usuario=SHA2(:InputPassword,512);');
	$Query -> bindValue(':InputUser',$Usuario);
	$Query -> bindValue(':InputPassword',$Contrasenya);
	$Query -> execute();
	$Result = $Query->rowCount();

	if($Result == 1){
		echo "CORRECTO";
	} else {
		echo "MAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAL";
	}
?>
