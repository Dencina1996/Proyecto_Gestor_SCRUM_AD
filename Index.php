<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenid@ - Scrum AD</title>
	<link rel="stylesheet" type="text/css" href="CSS/Index_CSS/Styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
	<form action="Access.php" method="POST">
		<div id="ContainerDiv">
			<img src="CSS/Index_CSS/Images/Logo.png">
			<br><br>
			<div class="input-container">
				<i class="fa fa-user icon"></i>
				<input class="input-field" type="text" name="InputUser" placeholder="Usuario">
			</div>
			<div class="input-container">
				<i class="fa fa-key icon"></i>
				<input class="input-field" type="text" name="InputPassword" placeholder="Contraseña">
			</div>
			<button type="submit" id="Entrar">Entrar</button>
			<p>No tienes cuenta? <a id="RegistroLabel" href="Register.php">Regístrate</a></p>
		</div>
	</form>
</body>
</html>