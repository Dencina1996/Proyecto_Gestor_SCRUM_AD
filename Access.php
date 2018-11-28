<?php

	$Usuari = $_POST["InputUser"];
	$Contrasenya = $_POST["InputPassword"];

	$BBDD = new PDO('mysql:host=127.0.0.1;dbname=MP07','Dencina','P@ssw0rd');

	$Query = $BBDD->prepare('SELECT User, Password FROM Users WHERE User=:InputUser AND Password=SHA2(:InputPassword,512);');
	$Query -> bindValue(':InputUser',$Usuari);
	$Query -> bindValue(':InputPassword',$Contrasenya);
	$Query -> execute();
	$Result = $Query->rowCount();
	
	if($Result == 1){
		echo "<label style='background-color: green; color: white;'>Connectat!</label>";
	} else {
		echo "<label style='background-color: red; color: white;'>Incorrecte!</label>";
	}
?>


