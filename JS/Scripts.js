function validarLogin() {
	var User = document.getElementsByName("InputUser")[0].value;
	var Password = document.getElementsByName("InputPassword")[0].value;
	var Counter = 0;

	if (User.length <= 0) {
		createError("Campo de Usuario vacío");
		Counter--;
	} else {
		Counter++;
	}

	if (Password.length <= 0) {
		setTimeout(createError("Campo de Contraseña vacío");
		Counter--;
	} else {
		Counter++;
	}
	
	if (Counter >= 2) {
		return true
	} else {
		return false;
	}
}

function createError(error) {

	// VARIABLES
		var ErrorDiv = document.createElement("div");
		var ErrorImage = document.createElement("img");
		var ErrorBR = document.createElement("br");
		var ErrorText = document.createTextNode(error);
	// CONFIGURATION
		ErrorDiv.className = "ErrorDiv";
		ErrorImage.src = "CSS/Error.png";
	// APPEND
		ErrorDiv.appendChild(ErrorImage);
		ErrorDiv.appendChild(ErrorBR);
		ErrorDiv.appendChild(ErrorText);
		document.body.appendChild(ErrorDiv);
}