<!DOCTYPE html>
<?php
//require_once './controle.php';

require('./_app/config.inc.php');

$DescPagina="Cadastro de Paciente";
$BotaoAcao="Cadastrar";

$paciente=new PacienteMold();
$pacienteDao = new PacienteMold();
        
if(isset($_GET['paciente'])):
    isset($_GET['paciente']);
    if($_GET['paciente']>=1):
        $paciente->setId_Pessoa($_GET['paciente']);
        $pacienteDao->dadosPacientes($paciente,3); 
               
        $DescPagina="Editar Paciente";
        $BotaoAcao="Editar";
    endif;
endif;
       
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="Script/validaCamposPaciente.js"></script>
        <script type="text/javascript" src="Script/Js.js"></script>
        <link rel="stylesheet" href="css/stylo_large.css">
        <title>Cadastrar Paciente</title>
    </head>
    <body>
        
        <div id="pagina" style="float:none; margin: auto; margin-top: -21px;">
           
	<main>
            
            <section>
		<div class="conteudo">

                    <h2><?php echo $DescPagina ?></h2>

                    <div class="camada-2">

                            <div class="camada-3">
                                
                                <div id="cad-paciente">

                                    <form name="cadastrarPaciente" action="dadosPaciente.php" method="POST" onsubmit="return validacao();">
                                    <input type="hidden" name="id_paciente" value="<?php echo $pacienteDao->getId_Pessoa() ?>"/>  
                                    <div class="input-inteiro">
                                        <h5>Nome:</h5>
                                        <input type="text" name="nome" placeholder="Nome" value="<?php echo $pacienteDao->getNome() ?>">
                                    </div>
                                    <?php
                                    $checked_M="";
                                    $checked_F="";
                                    if($pacienteDao):
                                        if($pacienteDao->getSexo()=='M'):
                                            $checked_M="checked='true'";
                                            $checked_F="";
                                        elseif($pacienteDao->getSexo()=='F'):
                                            $checked_F="checked='true'";
                                            $checked_M="";
                                        endif;
                                    endif;
                                    ?>
                                    <div class="input-inteiro">
                                        <h5>Sexo</h5>
                                        <p style="background-color: white; padding-left: 5px;">
                                            Masculino:
                                            <input type="radio" name="sexo"  value="1" <?php echo $checked_M ?>> |
                                            Feminino:
                                            <input type="radio" name="sexo"  value="2" <?php echo $checked_F ?>>
                                        </p>
                                    </div>

                                    <div class="input-inteiro">
                                        <h5>Nascimento</h5>
                                        <p>
                                            <input type="date" name="nascimento" value="<?php echo $pacienteDao->getData_Nascimento() ?>">
                                        </p>
                                    </div>

                                    <div class="input-inteiro">
                                        <h5>Estatura</h5>
                                        <input type="text" name="altura" placeholder="Altura" value="<?php echo $pacienteDao->getAltura() ?>">
                                    </div>
                                    
                                    <div class="input-inteiro">
                                        <h5>Profissão</h5>
                                        <input type="text" name="profissao" placeholder="Profissão" value="<?php echo $pacienteDao->getProfissao() ?>">
                                    </div>
                                    
                                    
                                    <div class="input-inteiro">
                                        <h5>E-Mail</h5>
                                        <input type="email" name="email" placeholder="E-Mail" value="<?php echo $pacienteDao->getEmail() ?>">
                                    </div>

                                    <div class="input-inteiro">
                                        <h5>Telefone</h5>
                                        <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $pacienteDao->getTelefone() ?>">
                                    </div>
                                    
                                    <?php
                                    $acao_Button = "";   
                                    if($BotaoAcao=='Editar'):
                                      $acao_Button = "Onclick='return ConfirmEdit();'";   
                                    ?>
                                    
                                        <script>
                                            function ConfirmEdit(){
                                                var x = confirm("Deseja realmente confirmar as alterações deste Paciente ?");
                                                if (x)
                                                    return true;
                                                else
                                                    return false;
                                            }
                                        </script>
                                    <?php 
                                    endif;
                                    ?>
                                    <div class="botoes"> <button type="submit" <?php echo $acao_Button ?> ><?php echo $BotaoAcao ?></button></div>
                                </form>
                                <?php
                                    $pag_pac="";
                                    if($pacienteDao->getId_Pessoa()>1):
                                        $pag_pac="?idpac={$pacienteDao->getId_Pessoa()}'";
                                    endif;
                                ?>
                                <div class="botoes"> <a href='PacienteDados.php<?php echo$pag_pac ?>'> <button>Cancelar</button></a></div>
                                
                                <?php
                                if($paciente->getId_Pessoa()):
                                ?>
                                <div class="botoes">
                                    <form name="excluirPaciente" action="excluirdados.php" method="POST">
                                        <input type="hidden" name="ex_idpac" value="<?php echo $pacienteDao->getId_Pessoa() ?>"/>
                                        <input type="hidden" name="tipoexc" value="1"/>
                                        <button Onclick='return ConfirmDelete();' type="submit"> Excluir </button>
                                    </form>
                                </div>

                                    <script>
                                    function ConfirmDelete(){
                                        var x = confirm("Deseja realmente deletar esse Paciente ?");
                                            if (x)
                                                return true;
                                            else
                                                return false;
                                    }
                                    </script>
                                
                                <?php
                                else:
                                    echo"<div class='botoes'> <button disabled='true'>Excluir</button></div>";
                                endif;
                                ?>
                                
                               
                            </div>
			</div>

                    </div>

		</div>
                
               
            </section>
            
	</main>
        </div>
            <div style="clear:both"></div>   
    </body>
</html>
