<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenid@ - Scrum AD</title>
	<link rel="stylesheet" type="text/css" href="CSS/Index_CSS/Styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="icon" type="image/png" href="CSS/Logo.png">
	<script type="text/javascript" src="JS/Scripts.js"></script>
</head>
<body>
	<form action="Access.php" onsubmit="return validarLogin();" method="POST">
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
			<a href="RecuperarContrasena.php">Recuperar Contraseña</a>
		</div>
	</form>
</body>
</html>
