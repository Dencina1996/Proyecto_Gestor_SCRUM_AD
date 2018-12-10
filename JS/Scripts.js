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

function deleteError() {
	ErrorList = document.getElementsByClassName("ErrorDiv");
	for (var i = 0; i < ErrorList.length; i++) {
    	ErrorList[i].remove();
	}
}

function validarLogin() {
	var User = document.getElementsByName("InputUser")[0].value;
	var Password = document.getElementsByName("InputPassword")[0].value;
	var Counter = 0;

	deleteError();

	if (User.length <= 0) {
		createError("Campo de Usuario vacío");
		Counter--;
	} else {
		Counter++;
	}

	if (Password.length <= 0) {
		createError("Campo de Contraseña vacío");
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

function changeColor(element) {
	var Icons = document.getElementById("ContainerDiv").querySelectorAll("i");
	var i;
	for (i = 0; i < Icons.length; i++) {
		Icons[i].style.backgroundColor = 'white';
	}
	element.previousElementSibling.style.background = 'red';
}