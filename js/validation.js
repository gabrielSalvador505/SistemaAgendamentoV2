const form = document.getElementById('formRegister');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required')
const emailRegex = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+\.([a-z]+)?$/i;

function setError(index) {
	campos[index].style.border = '2px solid var(--error-color)';
	campos[index].style.boxShadow = '0 0 0px 3px var(--error-color2)';
	spans[index].style.visibility = 'visible';
}  

function removeError(index){
	campos[index].style.border = '';
	campos[index].style.boxShadow = '';
	spans[index].style.visibility = 'hidden';
}

function nameValidate() {
  if (campos[0].value.length < 3) {
		setError(0);
  } else {
    removeError(0);
  }
}

function telValidate() {
	if (campos[1].value.length < 16) {
		setError(1);
	} else {
		removeError(1);
	}
}

function emailValidate() {
	if (!emailRegex.test(campos[2].value)) {
		setError(2);
	} else {
		removeError(2);
	}
}