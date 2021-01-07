function validAvaliacao(){
	if(document.cadastrarAvaliacao.peso.value==""){
		alert("Por favor preencha o campo Peso");
		document.cadastrarAvaliacao.peso.focus();
		return false;
	}
	
	if(document.cadastrarAvaliacao.c_cintura.value==""){
		alert("Por favor preencha o campo C.Cintura");
		document.cadastrarAvaliacao.c_cintura.focus();
		return false;
	}
	if(document.cadastrarAvaliacao.c_abdominal.value==""){
		alert("Por favor preencha o campo C.Abdominal");
		document.cadastrarAvaliacao.c_abdominal.focus();
		return false;
	}
	if(document.cadastrarAvaliacao.c_quadril.value==""){
		alert("Por favor preencha o campo C.Quadril");
		document.cadastrarAvaliacao.c_quadril.focus();
		return false;
	}
	if(document.cadastrarAvaliacao.c_peito.value==""){
		alert("Por favor preencha o campo C.Peito");
		document.cadastrarAvaliacao.c_peito.focus();
		return false;
	}
	if(document.cadastrarAvaliacao.c_braco_d.value==""){
		alert("Por favor preencha o C.Braço D");
		document.cadastrarAvaliacao.c_braco_d.focus();
		return false;
	}
	if(document.cadastrarAvaliacao.c_braco_e.value==""){
		alert("Por favor preencha o campo C.Braço E");
		document.cadastrarAvaliacao.c_braco_e.focus();
		return false;
	}
	
	
	if(document.cadastrarAvaliacao.c_coxa_d.value==""){
		alert("Por favor preencha o campo C.Coxa D");
		document.cadastrarAvaliacao.c_coxa_d.focus();
		return false;
	
	}
	if(document.cadastrarAvaliacaoc_coxa_e.value==""){
		alert("Por favor preencha o campo C.Coxa E");
		document.cadastrarAvaliacao.c_coxa_e.focus();
		return false;
	}
        if(document.cadastrarBioimpedancia.data_bio.value==""){
		alert("Por favor preencha o campo Data");
		document.cadastrarBioimpedancia.data_bio.focus();
		return false;
	}

}