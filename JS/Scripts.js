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

// FUNCTION FOR SHOWING PROJECT ATTRIBUTES

function showProjectInfo(element) {
	var Tags = element.getElementsByClassName("ProjectInfo");
	for (var i = 0; i <= Tags.length; i++) {
		Tags[i].hidden = false;
	}
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
		var NewProjectDiv = document.createElement("div");
		var NewProjectImage = document.createElement("img");
		var NewProjectBR = document.createElement("br");
		var NewProjectText = document.createTextNode("Crear Nuevo Proyecto");
	// CONFIGURATION
		NewProjectDiv.className = 'NewProjectButton';
		NewProjectDiv.onclick = createProject;
		NewProjectImage.src = "CSS/NewProjectIcon.png";
	// APPEND
		NewProjectDiv.appendChild(NewProjectImage);
		NewProjectDiv.appendChild(NewProjectBR);
		NewProjectDiv.appendChild(NewProjectText);
		document.body.lastElementChild.appendChild(NewProjectDiv);
}

	// REDIRECT TO NEW PROJECT FORM

	function createProject() {
		// HIDE NEW PROJECT BUTTON
			document.getElementsByClassName("NewProjectButton")[0].hidden = 'true';
		// DIV VAR
			var NewProjectDiv = document.createElement("div");
		// BR VAR
			var NewProjectBR = document.createElement("br");
		// INPUT VARIABLES
			var NewProjectForm = document.createElement("form");
			var NewProjectTitle = document.createElement("h5");
			var NewProjectName = document.createElement("input");
			var NewProjectInitDate = document.createElement("input");
			var NewProjectFinalDate = document.createElement("input");
			var NewProjectPO = document.createElement("input");
			var NewProjectSM = document.createElement("input");
			var NewProjectDescription = document.createElement("input");
			var NewProjectAdd = document.createElement("button");
		// CONFIGURATION
			// DIV
				NewProjectDiv.setAttribute("class", "GlobalContainer");
			// PROJECT FORM
				NewProjectForm.setAttribute("action", "CreateProject.php");
				NewProjectForm.setAttribute("onsubmit", "return validateNewProject();");
				NewProjectForm.setAttribute("method", "POST");
			// PROJECT TITLE
				NewProjectTitle.setAttribute("class", "GlobalContainerName");
				NewProjectTitle.innerHTML = "Nuevo Proyecto";
			// PROJECT NAME INPUT
				NewProjectName.setAttribute("type", "text");
				NewProjectName.setAttribute("class", "Input");
				NewProjectName.setAttribute("name", "PName");
				NewProjectName.setAttribute("placeholder", "Nombre del Proyecto");
				NewProjectName.setAttribute("maxlength", "50");
			// PROJECT INITIAL DATE INPUT
				NewProjectInitDate.setAttribute("type", "text");
				NewProjectInitDate.setAttribute("class", "Input");
				NewProjectInitDate.setAttribute("name", "PInitD");
				NewProjectInitDate.setAttribute("placeholder", "Fecha de Inicio (Año/Mes/Día)");
				NewProjectInitDate.setAttribute("onmouseover", "(this.type='date')");
				NewProjectInitDate.setAttribute("onmouseout", "(this.type='text')");
			// PROJECT FINAL DATE INPUT
				NewProjectFinalDate.setAttribute("type", "text");
				NewProjectFinalDate.setAttribute("class", "Input");
				NewProjectFinalDate.setAttribute("name", "PFinalD");
				NewProjectFinalDate.setAttribute("placeholder", "Fecha de Fin (Año/Mes/Día)");
				NewProjectFinalDate.setAttribute("onmouseover", "(this.type='date')");
				NewProjectFinalDate.setAttribute("onmouseout", "(this.type='text')");
			// PROJECT PRODUCT OWNER INPUT
				NewProjectPO.setAttribute("type", "text");
				NewProjectPO.setAttribute("class", "Input");
				NewProjectPO.setAttribute("name", "PPO");
				NewProjectPO.setAttribute("placeholder", "Product Owner");
				NewProjectPO.setAttribute("maxlength", "100");
			// PROJECT SCRUM MASTER INPUT
				NewProjectSM.setAttribute("type", "text");
				NewProjectSM.setAttribute("class", "Input");
				NewProjectSM.setAttribute("name", "PSM");
				NewProjectSM.setAttribute("placeholder", "Scrum Master");	
				NewProjectSM.setAttribute("maxlength", "100");
			// PROJECT DESCRIPTION INPUT
				NewProjectDescription.setAttribute("type", "textarea");
				NewProjectDescription.setAttribute("class", "Input");
				NewProjectDescription.setAttribute("name", "PDescription");
				NewProjectDescription.setAttribute("placeholder", "Description");
				NewProjectDescription.setAttribute("maxlength", "256");
				NewProjectDescription.style.width = "75%";	
			// PROJECT ADD BUTTON
				NewProjectAdd.setAttribute("id", "NewProjectAddButton");
				NewProjectAdd.text = "Crear Proyecto";
		// APPEND
			NewProjectDiv.appendChild(NewProjectTitle);

			NewProjectForm.appendChild(NewProjectName);
			NewProjectForm.appendChild(NewProjectInitDate);
			NewProjectForm.appendChild(NewProjectFinalDate);
			NewProjectForm.appendChild(NewProjectPO);
			NewProjectForm.appendChild(NewProjectSM);
			NewProjectForm.appendChild(NewProjectBR);
			NewProjectForm.appendChild(NewProjectDescription);
			NewProjectForm.appendChild(NewProjectAdd);

			NewProjectDiv.appendChild(NewProjectForm);
			document.body.lastElementChild.appendChild(NewProjectDiv);
	}

function validateNewProject() {
	var Inputs = document.getElementsByClassName("Input");
	var CounterEmpty = 0;
	for (var i = 0; i < Inputs.length; i++) {
		if (Inputs[i].value == "") {
			Inputs[i].style.border = 'solid 3px red';
			CounterEmpty ++;
		}
	}

	if (CounterEmpty > 0) {
		
		return false;
	} else {
		return true;
	}
}