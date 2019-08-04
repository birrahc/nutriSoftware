function validAnminse(){
	if(document.cadastrarAnminese.objetivo.value==""){
		alert("Por favor preencha o campo Objetivo");
		document.cadastrarAnminese.objetivo.focus();
		return false;
	}
	
	if(document.cadastrarAnminese.sinais_sintomas.value==""){
		alert("Por favor preencha o campo Sinais e Sintomas");
		document.cadastrarAnminese.sinais_sintomas.focus();
		return false;
	}
	if(document.cadastrarAnminese.diag_medico.value==""){
		alert("Por favor preencha o campo Diagnóstico Médico");
		document.cadastrarAnminese.diag_medico.focus();
		return false;
	}
	if(document.cadastrarAnminese.hab_intestinais.value==""){
		alert("Por favor preencha o campo Habitos Intestinais");
		document.cadastrarAnminese.hab_intestinais.focus();
		return false;
	}
	if(document.cadastrarAnminese.exames.value==""){
		alert("Por favor preencha o campo Exames");
		document.cadastrarAnminese.exames.focus();
		return false;
	}
	if(document.cadastrarAnminese.tabagismo.value==""){
		alert("Por favor preencha o campo Tabagismo");
		document.cadastrarAnminese.tabagismo.focus();
		return false;
	}
	if(document.cadastrarAnminese.medicamentos.value==""){
		alert("Por favor preencha o campo Medicamentos");
		document.cadastrarAnminese.medicamentos.focus();
		return false;
	}
	
	
	if(document.cadastrarAnminese.suplementos.value==""){
		alert("Por favor preencha o campo Suplementos");
		document.cadastrarAnminese.suplementos.focus();
		return false;
	}
        
	if(document.cadastrarAnminese.atividade_fisica.value==""){
		alert("Por favor preencha o campo Atividades Fisicas");
		document.cadastrarAnminese.atividade_fisica.focus();
		return false;
	}
        
        if(document.cadastrarAnminese.historico_familiar.value==""){
		alert("Por favor preencha o campo Histórico Familiar");
		document.cadastrarAnminese.historico_familiar.focus();
		return false;
	}
        
        if(document.cadastrarAnminese. etilismo.value==""){
		alert("Por favor preencha o campo Etilismo");
		document.cadastrarAnminese. etilismo.focus();
		return false;
	}
        
       
        
	
}

