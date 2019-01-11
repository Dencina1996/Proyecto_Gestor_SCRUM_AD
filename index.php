<?php
	session_start();
	$error = Null;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$Usuario = $_POST["InputUser"];
	$Contrasenya = $_POST["InputPassword"];

	if (!isset($_SESSION['InputUser'])) {
			$_SESSION['InputUser'] = $Usuario;
		}
	$BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');

	$Query = $BBDD->prepare('SELECT Nombre_Usuario, Password_Usuario FROM Usuarios WHERE Nombre_Usuario=:InputUser;');
	$Query -> bindValue(':InputUser',$Usuario);
	$Query -> execute();
	$Result = $Query->rowCount();

	if($Result == 1){
		$BBDD = new PDO('mysql:host=127.0.0.1;dbname=BD_Scrum','scrum','P@ssw0rd');

		$Query = $BBDD->prepare('SELECT Nombre_Usuario, Password_Usuario FROM Usuarios WHERE Nombre_Usuario=:InputUser AND Password_Usuario=SHA2(:InputPassword,512);');
		$Query -> bindValue(':InputUser',$Usuario);
		$Query -> bindValue(':InputPassword',$Contrasenya);
		$Query -> execute();
		$Result = $Query->rowCount();

		if($Result == 1){
			header("Location: UserPanel.php");
		} else {
			$error = "Contraseña incorrecta";
		}
	} else {
		$error = "Usuario incorrecto";
	}

}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenid@ - Scrum AD</title>
	<link rel="stylesheet" type="text/css" href="CSS/Index_CSS/Styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="CSS/Cursors.css">
	<script type="text/javascript" src="JS/Scripts.js"></script>
</head>
<body>
	<form action="" method="POST">
		<div id="ContainerDiv">
			<img id="ProjectLogo" src="CSS/Logo.png">
			<br><br>
			<div class="input-container">
				<i class="fa fa-user icon"></i>
				<input class="input-field" type="text" name="InputUser" placeholder="Usuario" autofocus onclick="changeColor(this)">
			</div>
			<div class="input-container">
				<i class="fa fa-key icon"></i>
				<input class="input-field" type="password" name="InputPassword" placeholder="Contraseña" onclick="changeColor(this)">
			</div>
			<button id="Entrar">Entrar</button>
			<a href="PasswordRecovery.php" style="text-decoration: none; font-weight: bold; text-align: center; align-content: center;">¿Olvidaste la contraseña?</a>
		</div>
	</form>

	<?php
	if($error!=Null){
		echo "<script type='text/javascript'>createError('".$error."')</script>";
	}
	?>
</body>
</html>
