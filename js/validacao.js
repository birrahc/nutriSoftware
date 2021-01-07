
function init() {
    //let sub
    $("#carregando").hide();
    $("#corpo").show();
    
    jQuery(function($){
        $("#nome").addClass("captalize"); 
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#dadosCpf').mask('000.000.000-00', {reverse: true});
        let subval = $("#obs_paciente_edit").val().valueOf().replaceAll('<br/>', "\n");
        $("#obs_paciente_edit").val(subval)
        /*$("#obs_paciente").keypress(function(e){
            if(e.which == 13){
                sub = $("#obs_paciente").val().valueOf().replace(/(?:\r\n|\r|\n)/g, '<br/>');
                alert("teclei enter")
                //$("#obs_paciente").val(sub)
                
            }
        })*/
                //replace(/(?:\r\n|\r|\n)/g, '<br>');
        
            //obs_paciente = obs_paciente.replaceAll(/(?:\r\n|\r|\n)/g, '<br>')
        //$("#nascimento").mask('00/00/0000',{placeholder: "Data de Nascimento"});
       // $("#telefone").mask("(00) 0000-00-00", {placeholder: "Telefone"});
        $("#whatswap").mask("(00) 99999-99-99", {placeholder: "WhatsApp"});
        $("#salario").mask('000.000.000.000.000,00', {reverse: true});
    });
    //=========================++++++=============================
    //====== Validando Formulario de cadastro de Médico ==========
    //============================================================
    $("#cadastraPaciente").validate({
        
        submitHandler: function(){
            var dados = $("#cadastraPaciente").serialize();
             $.ajax({
                type: 'POST',
                url: 'dadosPaciente.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#carregando").show();
                    $("#carregando").fadeOut(4000);
                     
                    if(response >=1){
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Dados Cadastrados com Sucesso!',
                                showConfirmButton: true,
                                timer: 47000
                            }).then((result) => {
                                if (result.value) {
                                    location.href="pacientes.php?idpac="+response
                                }
                            });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro...',
                            text: 'Não Foi Possivel Cadastrar!',
                            footer: '<a href>Why do I have this issue?</a>'
                          }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                    }
                    
                }
               
            });
             
            return false;
        
        },
        rules: {
            nome: { required: true, minlength:9 },
            cpf: {required: false, verificaCPF: false },
            nascimento: { required: true, minlength:10, maxlength:11, verificaIdade: true,},
            email:{ email: true, verificaEmail: false},
            sexo:{required: true, checkedSexo:true}
        },

        messages: {
            nome: { required: "Campo Nome Obrigatório ", minlength:"O Campo Nome deve ter no minimo 9 caractres" },
            nascimento: { required: "Campo Nascimento Obrigatório", minlength:"Digite o campo corretamente", maxlength:"Digite o campo corretamente" },
            email:{ email: "por favor preencha um email válido!"},
            sexo:{required:"Marque o Sexo"}
        },
                    
    });
    
    $("#cadastrarAvaliacao").validate({
        
        submitHandler: function(){
            //let data_aval = $("#data_aval").val();
            
            var dados = $("#cadastrarAvaliacao").serialize();
            var paciente_id =  $("#paciente_id").val().valueOf();
            var avaliacao_id = $("#avaliacao_id").val().valueOf();
            //var data_aval = $("#data_aval").val().replace("/","-");
            var peso = $("#peso").val().valueOf().replace(".",",");
            var c_peito = $("#c_peito").val().valueOf().replace(".",",");
            //alert(data_aval);
            //console.log("resulto"+peso+" C_PEITO"+c_peito);
            if(avaliacao_id){
                Swal.fire({
                    title: 'Deseja realmente Alterar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'dadosAvaliacao.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    
                                    //alert(dados);
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    //alert(response);
                                    if(response >=1){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados Cadastrados com Sucesso!',
                                                showConfirmButton: true,
                                                timer: 47000
                                            }).then((result) => {
                                                if (result.value) {
                                                    location.href="Avaliacoes.php?idpac="+paciente_id
                                                }
                                            });
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro...',
                                            text: 'Pois não foi alterado nenhum dado!',
                                            footer: '<a href>Why do I have this issue?</a>'
                                          }).then((result) => {
                                                if (result.value) {
                                                    location.reload();
                                                }
                                            });
                                    }

                                }

                            });//
                        }
                    });

            }
            else{
                $.ajax({
                   type: 'POST',
                   url: 'dadosAvaliacao.php',
                   async: false,
                   data: dados,
                   success: function(response) {
                       $("#carregando").show();
                       $("#carregando").fadeOut(4000);
                       //alert(response)
                       if(response >=1){
                               Swal.fire({
                                   position: 'top',
                                   icon: 'success',
                                   title: 'Dados Cadastrados com Sucesso!',
                                   showConfirmButton: true,
                                   timer: 47000
                               }).then((result) => {
                                   if (result.value) {
                                       location.href="AvaliacaoDetalhada.php?idpg="+response+"&idpac="+paciente_id
                                       
                                   }
                               });
                       }else{
                           Swal.fire({
                               icon: 'error',
                               title: 'Erro...',
                               text: 'Não Foi Possivel Cadastrar!',
                               footer: '<a href>Why do I have this issue?</a>'
                             }).then((result) => {
                                   if (result.value) {
                                       location.reload();
                                   }
                               });
                       }

                   }

               });
            }  
            return false;
        
        },
        rules: {
            consulta: { required: true},
            data_avalicao: {required: true, formatData: false },
            
        },

        messages: {
            consulta: { required: "Campo Nome Obrigatório "},
            data_avalicao: { required: "Campo Nascimento Obrigatório", minlength:"Digite o campo corretamente", maxlength:"Digite o campo corretamente" },
            
        },
                    
    });
    
    $("#cadastrarBioimpedancia").validate({
        
        submitHandler: function(){
            
            var dados = $("#cadastrarBioimpedancia").serialize();
            var paciente_id = $("#paciente_id").val().valueOf();
            var bio_id = $("#bio_id").val().valueOf();
            //var data_aval = $("#data_aval").val().replace("/","-");
            
            //alert(data_aval);
            //console.log("resulto"+peso+" C_PEITO"+c_peito);
            if(bio_id){
                Swal.fire({
                    title: 'Deseja realmente Alterar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'dadosBioimpedancia.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    
                                    //alert(dados);
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    alert(response);
                                    if(response >=1){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados Alterados com Sucesso!',
                                                showConfirmButton: true,
                                                timer: 47000
                                            }).then((result) => {
                                                if (result.value) {
                                                    location.href="BioImpedancia.php?idpac="+paciente_id
                                                }
                                            });
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro...',
                                            text: 'Pois não foi alterado nenhum dado!',
                                            footer: '<a href>Why do I have this issue?</a>'
                                          }).then((result) => {
                                                if (result.value) {
                                                    location.reload();
                                                }
                                            });
                                    }

                                }

                            });//
                        }
                    });

            }
            else{
                $.ajax({
                   type: 'POST',
                   url: 'dadosBioimpedancia.php',
                   async: false,
                   data: dados,
                   success: function(response) {
                       $("#carregando").show();
                       $("#carregando").fadeOut(4000);
                       alert(response)
                       if(response >=1){
                               Swal.fire({
                                   position: 'top',
                                   icon: 'success',
                                   title: 'Dados Cadastrados com Sucesso!',
                                   showConfirmButton: true,
                                   timer: 47000
                               }).then((result) => {
                                   if (result.value) {
                                       location.href="BioImpedancia.php?idpac="+paciente_id
                                   }
                               });
                       }else{
                           Swal.fire({
                               icon: 'error',
                               title: 'Erro...',
                               text: 'Não Foi Possivel Cadastrar!',
                               footer: '<a href>Why do I have this issue?</a>'
                             }).then((result) => {
                                   if (result.value) {
                                       location.reload();
                                   }
                               });
                       }

                   }

               });
            }  
            return false;
        
        },
        rules: {
            //consulta: { required: true},
            data_bio: {required: true, formatData: false },
            
        },

        messages: {
            consulta: { required: "Campo Nome Obrigatório "},
            data_avalicao: { required: "Campo Nascimento Obrigatório", minlength:"Digite o campo corretamente", maxlength:"Digite o campo corretamente" },
            
        },
                    
    });
     //================== +++++ ======================           
    //======= validando cadastro Observaçao ======
    //=================== +++++ ======================
    $("#cadastrarObs").validate({
        
        submitHandler: function(){
            let sub = $("#obs_paciente").val().valueOf().replace(/(?:\r\n|\r|\n)/g, '<br/>');
                //alert("teclei enter")
            $("#obs_paciente").val(sub)
            let dados = $("#cadastrarObs").serialize();
            let paciente_obs = $("#paciente_obs").val().valueOf();
            
            //$("#obs_paciente").val(sub)
                $.ajax({
                   type: 'POST',
                   url: 'dadosObservacao.php',
                   async: false,
                   data: dados,
                   success: function(response) {
                       $("#carregando").show();
                       $("#carregando").fadeOut(4000);
                       //alert(dados)
                       if(response >=1){
                            location.href="pacientes.php?idpac="+paciente_obs
                       }else{
                           Swal.fire({
                               icon: 'error',
                               title: 'Erro...',
                               text: 'Não Foi Possivel Cadastrar!',
                               footer: '<a href>Why do I have this issue?</a>'
                             }).then((result) => {
                                   if (result.value) {
                                       location.reload();
                                   }
                               });
                       }

                   }

               });
              // 
            return false;
        },
        rules: {
            observacao: { required: false}
        },

        messages: {
            especialidade: { required: "Campo Nome Obrigatório ", minlength:"O campo deve ter no minimo 6 caracteres" }
        }
                    
    });
    
     //================== +++++ ======================           
    //======= Update cadastro Observaçao ======
    //=================== +++++ ======================
    $("#editarObs").validate({
        
        submitHandler: function(){
            let sub = $("#obs_paciente_edit").val().valueOf().replace(/(?:\r\n|\r|\n)/g, '<br/>');
                //alert("teclei enter")
            $("#obs_paciente_edit").val(sub)
            let dados = $("#editarObs").serialize();
            let paciente_obs_edit = $("#paciente_obs_edit").val().valueOf();
            
             Swal.fire({
                    title: 'Deseja realmente Alterar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            
                            $.ajax({
                                type: 'POST',
                                url: 'dadosObservacao.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    //alert(dados)
                                    if(response >=1){
                                         location.href="pacientes.php?idpac="+paciente_obs_edit
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro...',
                                            text: 'Não Foi Possivel Cadastrar!',
                                            footer: '<a href>Why do I have this issue?</a>'
                                          }).then((result) => {
                                                if (result.value) {
                                                    location.reload();
                                                }
                                            })
                                    }

                                }

                            })
                        }
                    })
            
            //$("#obs_paciente").val(sub)
                
              // 
            return false;
        },
        rules: {
            observacao: { required: false}
        },

        messages: {
            especialidade: { required: "Campo Nome Obrigatório ", minlength:"O campo deve ter no minimo 6 caracteres" }
        }
                    
    });
    
    //Deleta Medico
    $("#deleteMed").validate({
        submitHandler: function(){
            var dados = $("#deleteMed").serialize();
            var crm =  $("#crm_med").val().valueOf();
            if(crm){
                Swal.fire({
                    icon: 'error',
                    title: 'Médico com CRM Registrado.',
                    text: 'Não é permitido deletar dados!'
                });
                
            }else{
            
                Swal.fire({
                    title: 'Deseja realmente deletar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'deletaDados.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    if(response >=1){

                                        setTimeout(function(){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados deletados com Sucesso!',
                                                showConfirmButton: false,
                                                timer: 47000
                                            });

                                        },3000);

                                        setTimeout(function(){
                                            location.href="index.php";
                                        },5000);
                                    }else{
                                        setTimeout(function(){
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Não foi possivel delatar dados.'
                                            });

                                        },3000);

                                    }

                                }

                            });
                        }
                    });


                return false;
            
            }
        }
    });
    
    //Deleta Especialidade
    $(".excluirAvaliacao").validate({
        submitHandler: function(){
            var dados = $(".excluirAvaliacao").serialize();
            var paciente =  $("#paciente").val().valueOf();
            
                Swal.fire({
                    title: 'Deseja realmente deletar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'excluirdados.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    //alert(response);
                                    if(response >=1){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados deletados com Sucesso!',
                                                showConfirmButton: true
                                            }).then((result) => {
                                                    (result.value)? location.href="Avaliacoes.php?idpac="+paciente :location.reload;
                                            });
                                    }else{
                                        
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Avaliação não delatada',
                                            text: 'Não é permitido deletar estes dados!'
                                            }).then((result)=>{
                                                (result.value)? location.href="Avaliacoes.php?idpac="+paciente : location.reload;
                                            });

                                    }

                                }

                            });
                        }
                    });


                return false;
        }
    });
    
    //Excluir BioImpedancia
    $(".excluirBio").validate({
        submitHandler: function(){
            var dados = $(".excluirBio").serialize();
            var paciente =  $("#paciente").val().valueOf();
            
                Swal.fire({
                    title: 'Deseja realmente deletar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'excluirdados.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    //alert(response);
                                    if(response >=1){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados deletados com Sucesso!',
                                                showConfirmButton: true
                                            }).then((result) => {
                                                    (result.value)? location.href="BioImpedancia.php?idpac="+paciente :location.reload;
                                            });
                                    }else{
                                        
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Avaliação não delatada',
                                            text: 'Não é permitido deletar estes dados!'
                                            }).then((result)=>{
                                                (result.value)? location.href="BioImpedancia.php?idpac="+paciente : location.reload;
                                            });

                                    }

                                }

                            });
                        }
                    });


                return false;
        }
    });

}

         function enter(){
             
         }   

            jQuery.validator.addMethod("verificaCPF", function (value, element) {
                value = value.replace('.', '');
                value = value.replace('.', '');
                cpf = value.replace('-', '');
                
                while (cpf.length < 11) cpf = "0" + cpf;
                var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                var a = [];
                var b = new Number;
                var c = 11;
                for (i = 0; i < 11; i++) {
                    a[i] = cpf.charAt(i);
                    if (i < 9) b += (a[i] * --c);
                }
                if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
                b = 0;
                c = 11;
                for (y = 0; y < 10; y++) b += (a[y] * c--);
                if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
                if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
                
              
         
               
                var verifica=false;
                
                jQuery.ajax({
                            url: 'checkedDados.php?cpf='+cpf,
                            async: false,
                            success: function(data) {
                               if(data == 0 || data== null || data=='') verifica = true;
                               alert(data)
                           }});
			
                if(!verifica) return false;
                       
                              
                return true;
                
               
            }, "CPF inválido ou já cadastrado!");
            
            jQuery.validator.addMethod("formatData", function(value, element){
                $("#data_aval").mask('00/00/0000',{placeholder: "__/__/____"});
                value = value.split("/");
                if(value[2]< 2010){
                    return false
                    
                    if(value[1] < 1 || value[1] >12 ){
                        return false;
                    }
                    if(value[0]> 31 || value[0] < 28){
                        return false;
                    }
                }
                let dataFormat= value.reverse()
                value = dataFormat.join("-")
                
                if(value){
                    alert("Estou reconhecendo")
                    alert(value)
                }
                return true;
            },"Data não Formatada");
            
            jQuery.validator.addMethod("checkedSexo", function (value, element) {
                //$("#nascimento").mask('00/00/0000',{placeholder: "__/__/____"});
                let masculino = value[0]
                let feminino = value[1]
                if(masculino.checked==false && feminino.checked==false){
                    return false;
                }
                return true;
            },"Marque o campo Sexo");
            
            
            jQuery.validator.addMethod("verificaIdade", function (value, element) {
                //$("#nascimento").mask('00/00/0000',{placeholder: "__/__/____"});
                var data = new Date();
                value = value.split("/");
                nascimento = value;
                var anos = data.getFullYear() - nascimento[2];
                if (nascimento[1] > data.getMonth()) {
                    anos -= 1;
                } else if (nascimento[1] == data.getMonth()) {
                    if (nascimento[0] > data.getDate()) {
                        anos -= 1;
                    }
                }

                if (anos < 20) {
                    return false;
                }
                return true;
            },
                "A idade não pode ser menor que 20 anos ");
            
            jQuery.validator.addMethod("verificaEmail", function (value, element) {
                email= value;
                
                var verificaEmail=false;
                
                jQuery.ajax({
                            url: 'checkedDados.php?email='+email,
                            async: false,
                            success: function(data) {
                               if(data == 0) verificaEmail = true; 
                           }});
			
                if(!verificaEmail) return false;
                       
                          
                return true;
                
            }, "Email já cadastrado!");
            
            jQuery.validator.addMethod("verificaCrm", function (value, element) {
                crm= value;
                
                var verificaCrm=false;
                
                jQuery.ajax({
                            url: 'checkDados.php?crm='+crm,
                            async: false,
                            success: function(data) {
                               if(data == 0) verificaCrm = true; 
                           }});
			
                if(!verificaCrm) return false;
                       
                          
                return true;
                
            }, "crm já cadastrado!");
            
            
jQuery.validator.addMethod("verificaEspecialidade", function (value, element) {
               especialidade = value;
                
                var verificaEsp=false;
                
                jQuery.ajax({
                            url: 'checkDados.php?especialidade='+especialidade,
                            async: false,
                            success: function(data) {
                                //alert(data);
                               if(data == 0) verificaEsp = true; 
                           }});
			
                if(!verificaEsp) return false;
                       
                          
                return true;
                
            }, "Especialidade já cadastrada!");
                
            $(document).ready(init);