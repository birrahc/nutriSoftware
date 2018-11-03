/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pergunta(){
    
    if(document.cadastrarPaciente.nome.value==""){
		alert("Por favor preencha o campo Nome");
		document.cadastrarPaciente.nome.focus();
		return false;
                if (confirm('Tem certeza que deseja cadastrar ou alterar os dados?')){
                document.cadastrarPaciente.focus() 
                } 
	}
   
}

