<!DOCTYPE html>
<?php 
    //require_once './controle.php';
?>
<html lang="pt-br">
    <?php
    require('./_app/config.inc.php');
        $paciente= new Paciente1();
        $pacientedao = new PacienteDao1();
        $Anminese = new Anminese2();
        $AnmineseDao = new AnmineseDao2();
        
    if(isset($_GET['idpac'])&& $_GET['idpac']>=1):
        $paciente->setIdPessoa($_GET['idpac']);
        $pacientedao->dadosPacientes($paciente, 3);
        
    else:
        header("location: cadastrarPaciente.php");
    endif;
        
        $DescPagina="Cadastro Anminese";
        $botaoAcao="Cadastrar";
        
        if(isset($_GET['cod_anminese'])):
            isset($_GET['cod_anminese']);
            if($_GET['cod_anminese']>=1):
               $Anminese->setId_Anminese($_GET['cod_anminese']);
               $AnmineseDao->ListaAnminese($Anminese,0); 
               $DescPagina="Editar Dados Anminese";
               $botaoAcao="Editar";
            endif;
        endif;
    
    
        
    ?>
    <head>
        <meta charset="UTF-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title><?php echo $DescPagina ?></title>
    </head>
    <body>
         
        <div class="divPagina">
            <div class="tdtitulo">
                <h2><?php echo $DescPagina ?></h2>
            </div> 
                    
                <div class="formCadAn">
                    <form name="cadastrarAnminese" action="dadosAnminese.php" method="POST">
                        <table border="0">
                            <tr>
                                <td colspan="2" id="pacAn">
                                    <h3><?php echo $pacientedao->getPaciente()?></h3> 
                                    <input type="hidden" name="id_paciente" value="<?php echo $pacientedao->getCodPaciente()?>"/>
                                           
                                </td>
                            </tr>
                            
                            <tr>
                            
                                <td>
                                    <input type="hidden" name="id_anminese" value=<?php echo $AnmineseDao->getId_Anminese() ?>/>
                                    <b>Objetivo:</b><br><input type="text" name="objetivo" value="<?php echo $AnmineseDao->getObjetivo() ?>"/>
                                </td>
                                <td><b>Sinais E Sintomas:</b><br><input type="text" name="sinais_sintomas" value="<?php echo $AnmineseDao->getSinais_sintomas() ?>"/></td>
                            </tr>
                           
                            <tr>
                                <td><b>Diagnóstico Médico:</b><br><input type="text" name="diag_medico" value="<?php echo $AnmineseDao->getDiag_medico() ?>"/></td>
                                <td><b>Habitos Intestinais:</b><br><input type="text" name="hab_intestinais" value="<?php echo $AnmineseDao->getHabito_intestinal() ?>"/></td>
                            </tr>
                            <tr>
                                <td><b>Exames:</b><br><input type="text" name="exames" value="<?php echo $AnmineseDao->getExames() ?>"/></td>
                                <td><b>Tabagismo:</b><br><input type="text" name="tabagismo" value="<?php echo $AnmineseDao->getTabagismo() ?>"/></td>
                            </tr>
                            
                             <tr>
                                 <td><b>Medicamentos:</b><br><input type="text" name="medicamentos" value="<?php echo $AnmineseDao->getMedicamentos() ?>"/></td>
                                 <td><b>Etilismo:</b><br><input type="text" name="etilismo" value="<?php echo $AnmineseDao->getEtilismo() ?>"/></td> 
                            </tr>
                            <tr>
                                <td><b>Suplementos:</b><br><input type="text" name="suplementos" value="<?php echo $AnmineseDao->getSuplementos() ?>"/></td> 
                                <td><b>Atividade Física:</b><br><input type="text" name="atividade_fisica" value="<?php echo $AnmineseDao->getAtividades_fisicas() ?>"/></td>
                            </tr>
                            
                             <tr>
                                 <td><b>Histórico Familiar:</b><br><input type="text" name="historico_familiar" value="<?php echo $AnmineseDao->getHist_familiar() ?>"/></td>
                                
                                <td></td>
                            </tr>
                        </table>
                        
                        <div class="divBotaoCad">
                        <button type="submit" onclick="cadastrarPaciente" id="botoes"><img src="imagens/simboloCadastrar.png" width="20" height="20"/> <?php echo $botaoAcao ?></button>
                        </div> 
                    
                      </form>
                    <div class="divBotaoCanc">
                        <a href="dadosPacientes.php?idpac=<?php echo $paciente->getIdPessoa()?>"><button  id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button></a>
                    </div>
                     <?php
                    if($Anminese->getId_Anminese()):
                    echo"<div class='divBotaoEx'>";
                        echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                            ."<input type='hidden' name='ex_idan' value='{$Anminese->getId_Anminese()}'/>"
                            ."<input type='hidden' name='tipoexc' value='2'/>"
                            . "<input type='hidden' name='pac' value='{$paciente->getIdPessoa()}'/>"
                            . "<button type='submit' onclick='excluirPaciente' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                            ."</form>";
                    echo"</div>";
                    endif;
                    ?>
                </div>
             </div>           
        
        <div class="divimg"></div>
    </body>
</html>
