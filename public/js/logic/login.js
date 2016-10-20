init();

function init() {
	$("#l-login input").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			login();
		}
	});
}

function login() {
	usuario = $("#login-user").val();
	clave = $("#login-password").val();
	
	if( usuario == null || usuario == "" || clave == null || clave == "" ){
		addClassInput('input-user', 'is-invalid');
		addClassInput('input-pass', 'is-invalid');
	} else {
		$.ajax({
			data : {
				user : usuario,
				pass : clave
			},
			url : 'login/logear',
			async : false,
			type : 'POST'
		}).done(function(data) {
			data = JSON.parse(data);
			if (data.validar == 1) {
				window.location.href = 'index';
			} else {
				addClassInput('input-user', 'is-invalid');
				addClassInput('input-pass', 'is-invalid');
			}
		});
	}	
}

function addClassInput(idInput, clase) {
	$('#' + idInput).addClass(clase);
}


//ANIMATION
var loginButton = document.querySelector('.login-button');
var signupButton = document.querySelector('.signup-button');
var activeElements = [ document.querySelector('.buttons'),
		document.querySelector('.log-link'),
		document.querySelector('.sign-link'),
		document.querySelector('.login-underline'),
		document.querySelector('.signup-underline'),
		document.querySelector('.login-form'),
		document.querySelector('.signup-form') ];

loginButton.onclick = function(e) {
	e.preventDefault();
	for (var i = 0; i < activeElements.length; i++) {
		activeElements[i].classList.remove('signup-button-active');
		activeElements[i].classList.add('login-button-active');
	}
}

signupButton.onclick = function(e) {
	e.preventDefault();
	for (var i = 0; i < activeElements.length; i++) {
		activeElements[i].classList.remove('login-button-active');
		activeElements[i].classList.add('signup-button-active');
	}
}