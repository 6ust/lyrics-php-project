// activate-validacao-js

var doc = document;

doc.getElementById('activate-validacao-js').innerText = "[Validação Javascript Ativada]";

function validateForm() {
	var name_length = doc.forms['myForm'].campo_nome.value.length;

	if (name_length < 4 || name_length > 64) {
		alert("O campo 'Nome' deve ter entre 5 e 64 caracteres.");
		return false;
	}

	var age = doc.forms['myForm'].campo_idade.value;

	if (isNaN(age) || age < 4 || age > 120) {
		alert("O campo 'Idade' deve ser preenchido correntamente");
		return false;
	}

	var email = doc.forms['myForm'].campo_email.value;

	if (email.length < 4 || email.length > 128 || email.indexOf('@') == -1 || email.indexOf('.') == -1) {
		alert("O campo 'Email' deve ser preenchido correntamente");
		return false;
	}

	var sex = doc.forms['myForm'].campo_sexo;
	sexValue = false;

	for (i=0;i<sex.length;i++) {
		if(sex[i].checked == true) {
			sexValue = sex[i].value;
			break;
		}
		if(sexValue == false) {
			alert("O campo 'Sexo' deve ser preenchido");
			return false;
		}
	}

	var option_course = doc.forms['myForm'].campo_curso.selectIndex;

	if (option_course == 0) {
		alert("O campo 'Curso' deve ser preenchido");
		return false;
	} 

	var conhecimentos = doc.forms['myForm'].elements['campo_conhecimentos[]'];
	var conhecimentosMarcados = 0;

	for (i = 0; i < conhecimentos.length; i++) {
		if (conhecimentos[i].checked == true) {
			conhecimentosMarcados++;
		}
	}
	if(conhecimentosMarcados != 2) {
		alert("É necessario marcar 2 conhecimentos.");
		return false;
	}

	doc.forms['myForm'].submit();
}