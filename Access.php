<?php
	session_start();

	$Usuario = $_POST["InputUser"];
	$Contrasenya = $_POST["InputPassword"];

	if (!isset($_SESSION['InputUser'])) {
			$_SESSION['InputUser'] = $Usuario;
		}

	$BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');

	$Query = $BBDD->prepare('SELECT Nombre_Usuario, Password_Usuario FROM Usuarios WHERE Nombre_Usuario=:InputUser AND Password_Usuario=SHA2(:InputPassword,512);');
	$Query -> bindValue(':InputUser',$Usuario);
	$Query -> bindValue(':InputPassword',$Contrasenya);
	$Query -> execute();
	$Result = $Query->rowCount();

	if($Result == 1){
		header("Location: UserPanel.php");
	} else {
		header("Location: Logout.php");
	}
?>
