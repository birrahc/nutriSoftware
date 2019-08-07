function validBio(){
	if(document.cadastrarBioimpedancia.data_bio.value==""){
		alert("Por favor preencha o campo Data");
		document.cadastrarBioimpedancia.data_bio.focus();
		return false;
	}
	
	if(document.cadastrarBioimpedancia.peso_bio.value==""){
		alert("Por favor preencha o campo Peso");
		document.cadastrarBioimpedancia.c_cintura.focus();
		return false;
	}
	if(document.cadastrarBioimpedancia.imc_bio.value==""){
		alert("Por favor preencha o campo IMC");
		document.cadastrarBioimpedancia.imc_bio.focus();
		return false;
	}
	if(document.cadastrarBioimpedancia.perc_gord_corp.value==""){
		alert("Por favor preencha o campo % Gord.Corporal");
		document.cadastrarBioimpedancia.perc_gord_corp.focus();
		return false;
	}
	if(document.cadastrarBioimpedancia.perc_musc_esq==""){
		alert("Por favor preencha o campo % Musc.Esquelético");
		document.cadastrarBioimpedancia.perc_musc_esq.focus();
		return false;
	}
	if(document.cadastrarBioimpedancia.met_basal.value==""){
		alert("Por favor preencha o Campo Met.Basal");
		document.cadastrarBioimpedancia.met_basal.focus();
		return false;
	}
	if(document.cadastrarBioimpedancia.idade_corpoaral.value==""){
		alert("Por favor preencha o campo Idade Corporal");
		document.cadastrarBioimpedancia.idade_corpoaral.focus();
		return false;
	}
	
	
	if(document.cadastrarBioimpedancia.gord_viceral.value==""){
		alert("Por favor preencha o campo Gord.Viceral");
		document.cadastrarBioimpedancia.gord_viceral.focus();
		return false;
	
	}
	

}