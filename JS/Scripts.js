// FUNCTION FOR CREATING ERROR

function createError(error) {
	// VARIABLES
		var ErrorDiv = document.createElement("div");
		var ErrorImage = document.createElement("img");
		var ErrorBR = document.createElement("br");
		var ErrorText = document.createTextNode(error);
	// CONFIGURATION
		ErrorDiv.className = "ErrorDiv";
		ErrorImage.src = "CSS/ErrorIcon.png";
	// APPEND
		ErrorDiv.appendChild(ErrorImage);
		ErrorDiv.appendChild(ErrorBR);
		ErrorDiv.appendChild(ErrorText);
		document.body.appendChild(ErrorDiv);
		setTimeout(deleteError, 5000);
}

// FUNCTION FOR DELETING ERROR

function deleteError() {
	ErrorList = document.getElementsByClassName("ErrorDiv");
	for (var i = 0; i < ErrorList.length; i++) {
    	ErrorList[i].remove();
	}
}

// FUNCTION CHECK EMPTY FIELDS 

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

// FUNCTION FOR LOGIN FORM
 
function changeColor(element) {
	var Icons = document.getElementById("ContainerDiv").querySelectorAll("i");
	var i;
	for (i = 0; i < Icons.length; i++) {
		Icons[i].style.backgroundColor = 'white';
	}
	element.previousElementSibling.style.background = 'red';
}

// FUNCTION FOR PRIVILEGES

function allowedOperations() {
	var Profile = document.getElementsByTagName("Profile")[0].id;
	
	if (Profile == 'SM') {
		createProjectButton();
	}
}

// BUTTON CREATE PROJECT

function createProjectButton() {
	// VARIABLES
		var GlobalPanel = document.getElementsByClassName("GlobalContainer")[0];
		var NewProjectDiv = document.createElement("div");
		var NewProjectImage = document.createElement("img");
		var NewProjectBR = document.createElement("br");
		var NewProjectText = document.createTextNode("Crear Proyecto");
	// CONFIGURATION
		NewProjectDiv.className = 'NewProjectButton';
		NewProjectImage.src = "CSS/NewProjectIcon.png";
	// APPEND
		NewProjectDiv.appendChild(NewProjectImage);
		NewProjectDiv.appendChild(NewProjectBR);
		NewProjectDiv.appendChild(NewProjectText);
		document.body.lastElementChild.appendChild(NewProjectDiv);
}
