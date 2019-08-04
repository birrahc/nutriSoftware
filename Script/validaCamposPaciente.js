function validacao(){
	if(document.cadastrarPaciente.nome.value==""){
		alert("Por favor preencha o campo Nome");
		document.cadastrarPaciente.nome.focus();
		return false;
	}
        
        if(document.cadastrarPaciente.nome.value.length < 6){
		alert("O campo Nome deve ter no minimo 6 caracteres");
		document.cadastrarPaciente.nome.focus();
		return false;
	}
	
	if (document.cadastrarPaciente.sexo[0].checked == false 
            && document.cadastrarPaciente.sexo[1].checked == false) {
            alert('Marque o campo Sexo');
            return false;
        }
        
	if(document.cadastrarPaciente.nascimento.value==""){
		alert("Favor preencher o campo Nascimento");
		document.cadastrarPaciente.nascimento.focus();
		return false;
	}
	

}



