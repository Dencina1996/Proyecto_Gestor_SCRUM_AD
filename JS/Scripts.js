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
 
/*function changeColor(element) {
=======

function changeColor(element) {
>>>>>>> 5a75ff4b8c77bfbe2e519d44c702cadd9d0b09a4
	var Icons = document.getElementById("ContainerDiv").querySelectorAll("i");
	var i;
	for (i = 0; i < Icons.length; i++) {
		Icons[i].style.backgroundColor = 'white';
	}
	element.previousElementSibling.style.background = 'red';
}*/

// FUNCTION FOR SHOWING PROJECT ATTRIBUTES

function getProjectInfo(id) {
	var ID = id;
	//document.getElementById("ProjectInfo").innerHTML;

	// CREATION OF FORM
		//alert(ID);

		var IDForm = document.createElement("form");
		
		IDForm.setAttribute("action", "ProjectView.php");
		IDForm.setAttribute("id", "FormID");
		IDForm.setAttribute("method", "POST");

		// P FOR PEACE

			var PID = document.createElement("input");
			PID.setAttribute("type", "text")
			PID.setAttribute("hidden", true);
			PID.setAttribute("name", "PDI");
			PID.setAttribute('value', ID);
			
			document.getElementsByClassName("PDI").innerHTML == ID;	

		IDForm.appendChild(PID);
		document.body.appendChild(IDForm);
		
		document.getElementById("FormID").submit();		
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
			var NewProjectBack = document.createElement("button");
		// CONFIGURATION
			// DIV
				NewProjectDiv.setAttribute("id", "NewProjectDiv");
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
				NewProjectName.setAttribute("autocomplete", "off");
			// PROJECT INITIAL DATE INPUT
				NewProjectInitDate.setAttribute("type", "text");
				NewProjectInitDate.setAttribute("class", "Input");
				NewProjectInitDate.setAttribute("name", "PInitD");
				NewProjectInitDate.setAttribute("placeholder", "Fecha de Inicio (Año/Mes/Día)");
				NewProjectInitDate.setAttribute("onmouseover", "(this.type='date')");
				NewProjectInitDate.setAttribute("onmouseout", "(this.type='text')");
				NewProjectInitDate.setAttribute("maxlength", "0");
				NewProjectInitDate.setAttribute("autocomplete", "off");
			// PROJECT FINAL DATE INPUT
				NewProjectFinalDate.setAttribute("type", "text");
				NewProjectFinalDate.setAttribute("class", "Input");
				NewProjectFinalDate.setAttribute("name", "PFinalD");
				NewProjectFinalDate.setAttribute("placeholder", "Fecha de Fin (Año/Mes/Día)");
				NewProjectFinalDate.setAttribute("onmouseover", "(this.type='date')");
				NewProjectFinalDate.setAttribute("onmouseout", "(this.type='text')");
				NewProjectFinalDate.setAttribute("maxlength", "0");
				NewProjectFinalDate.setAttribute("autocomplete", "off");
			// PROJECT PRODUCT OWNER INPUT
				NewProjectPO.setAttribute("type", "text");
				NewProjectPO.setAttribute("class", "Input");
				NewProjectPO.setAttribute("name", "PPO");
				NewProjectPO.setAttribute("placeholder", "Product Owner");
				NewProjectPO.setAttribute("maxlength", "100");
				NewProjectPO.setAttribute("autocomplete", "off");
			// PROJECT SCRUM MASTER INPUT
				NewProjectSM.setAttribute("type", "text");
				NewProjectSM.setAttribute("class", "Input");
				NewProjectSM.setAttribute("name", "PSM");
				NewProjectSM.setAttribute("placeholder", "Scrum Master");
				NewProjectSM.setAttribute("maxlength", "100");
				NewProjectSM.setAttribute("autocomplete", "off");
			// PROJECT DESCRIPTION INPUT
				NewProjectDescription.setAttribute("type", "textarea");
				NewProjectDescription.setAttribute("class", "Input");
				NewProjectDescription.setAttribute("name", "PDescription");
				NewProjectDescription.setAttribute("placeholder", "Description");
				NewProjectDescription.setAttribute("maxlength", "256");
				NewProjectDescription.setAttribute("autocomplete", "off");
				NewProjectDescription.style.width = "75%";
			// PROJECT ADD BUTTON
				NewProjectAdd.setAttribute("id", "NewProjectAddButton");
				NewProjectAdd.innerHTML = "Crear Proyecto";
			// BACK TO USER PANEL
				NewProjectBack.setAttribute("id", "NewProjectBack");
				NewProjectBack.setAttribute("onclick", "backFromNewP()");
				NewProjectBack.innerHTML = "Volver Atrás";
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
			NewProjectForm.appendChild(NewProjectBR);
			NewProjectForm.appendChild(NewProjectBack);

			NewProjectDiv.appendChild(NewProjectForm);
			document.body.lastElementChild.appendChild(NewProjectDiv);
	}

function validateNewProject() {
	var Inputs = document.getElementsByClassName("Input");
	var CounterEmpty = 0;
	for (var i = 0; i < Inputs.length; i++) {
		Inputs[i].style.border = 'solid 3px black';
		Inputs[i].style.boxShadow = null;
		if (Inputs[i].value == "") {
			Inputs[i].style.border = 'solid 3px red';
			Inputs[i].style.boxShadow = '0px 0px 10px 5px #888888';
			CounterEmpty ++;
		}
	}

	if (CounterEmpty > 0) {
		return false;
	} else {
		return true;
	}
}

function backFromNewP() {
	document.getElementById("NewProjectDiv").remove();
	document.getElementsByClassName("NewProjectButton")[0].remove();
	createProjectButton();
}

function CheckInput() {
	setInterval(CheckInputX(),100);
}

function CheckInputX() {
	var I1 = document.getElementsByClassName("input-field")[0];
	var I2 = document.getElementsByClassName("input-field")[1];

	if (I1.value == null || I1.value == "") {
		I1.previousElementSibling.style.backgroundColor = 'red';
	} else {
		I1.previousElementSibling.style.backgroundColor = 'green';
	}
	if (I2.value == null || I2.value == "") {
		I2.previousElementSibling.style.backgroundColor = 'red';
	} else {
		I2.previousElementSibling.style.backgroundColor = 'green';
	}	
}

function CheckSprintStatus(sprint) {
	var Sprints = document.getElementsByName("Status");
	if (Sprints == "Acabado") {
		alert("nabo");
	}
}