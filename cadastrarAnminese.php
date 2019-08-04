<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>
<html lang="pt-br">
    <?php
    require('./_app/config.inc.php');
        $paciente= new PacienteMold();
        $pacientedao = new PacienteMold();
        $Anminese = new AnmineseMold();
        $AnmineseDao = new AnmineseMold();
        $doencas = new Doencas();
        $Atividades = new AtividadesFisicas();
        $habitos = new HabitosIntestinais();
        
    if(isset($_GET['idpac'])&& $_GET['idpac']>=1):
        $paciente->setId_Pessoa($_GET['idpac']);
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
               $AnmineseDao->ListaAnminese($Anminese,2); 
               $DescPagina="Editar Dados Anminese";
               $botaoAcao="Editar";
            endif;
        endif;
    
    
        
    ?>
    <head>
        <script type="text/javascript" src="Script/validaCamposAnminese.js"></script>
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
                <td colspan="4" id="pacAn">
                    <h3><?php echo $pacientedao->getNome()?></h3> 
                    <input type="hidden" name="id_paciente" value="<?php echo $pacientedao->getId_Pessoa()?>"/>
                </td>
            </tr>
                            
            <tr>
                <td colspan="4">
                    <input type="hidden" name="id_anminese" value=<?php echo $AnmineseDao->getId_Anminese() ?>/>
                    <b>Objetivo:</b><br><input type="text" name="objetivo" value="<?php echo $AnmineseDao->getObjetivo() ?>" id="formCadAn"/>
                </td>
            </tr>
                           
            <tr>
                <td colspan="2"><b>| Diagnóstico Médico:</b></td>
                <td colspan="2"><b>| Sinais E Sintomas:</b></td>
            </tr>
                
            <tr>
                <td colspan="2">| 
                <select name="diag_medico">
                <?php
                if($AnmineseDao->getDiagnostico_medico()):
                    echo"<option value='{$AnmineseDao->getCod_Doenca()}'> {$AnmineseDao->getDiagnostico_medico()} </option> "; 
                endif;
                    $doencas->listaDoencas();
                ?>
                </select>
                </td>
                
                <?php
                if($AnmineseDao->getSinais_sintomas()=='Sim'):
                    echo"<td>| Sim:<input type='radio' name='sinais_sintomas' value='1' checked='true'/></td>";
                    echo"<td>| Não:<input type='radio' name='sinais_sintomas' value='2'/></td>";
                elseif($AnmineseDao->getSinais_sintomas()=='Não'):
                    echo" <td>| Sim:<input type='radio' name='sinais_sintomas' value='1'/></td>";
                    echo" <td>| Não:<input type='radio' name='sinais_sintomas' value='2' checked='true'/></td>";
                else:
                    echo" <td>| Sim:<input type='radio' name='sinais_sintomas' value='1'/></td>";
                    echo" <td>| Não:<input type='radio' name='sinais_sintomas' value='2'/></td>";
                endif;          
                ?>
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_diag_medico" value="<?php echo $AnmineseDao->getObs_Diag_medico() ?>" id="formCadAn"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_sinais_sintomas" value="<?php echo $AnmineseDao->getObs_Sinais_Sintomas() ?>" id="formCadAn"/></td>
            </tr>
            
            <tr>
                <td colspan="4"><hr></td>
            </tr>
                            
            <tr>
                <td colspan="2"><b>| Exames:</b></td>
                <td colspan="2"><b>| Habitos Intestinais:</b></td>
            </tr>
                            
            <tr>
            <?php
            if($AnmineseDao->getExames()=='Sim'):
                echo"<td>| Sim:<input type='radio' name='exames' value='1' checked='true'/></td>";
                echo"<td>| Não:<input type='radio' name='exames' value='2'/></td>";
            elseif($AnmineseDao->getExames()=='Não'):
                echo"<td>| Sim:<input type='radio' name='exames' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='exames' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim:<input type='radio' name='exames' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='exames' value='2'/></td>";
            endif;
            ?>    
                                
                <td colspan="2">| 
                    <select name="hab_intestinais">
                    <?php
                    if($AnmineseDao->getHabito_intestinal()):
                        echo"<option value='{$AnmineseDao->getCod_Habito()}'> {$AnmineseDao->getHabito_intestinal()} </option>";
                    endif;
                        $habitos->listaHabitos();
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_exames" value="<?php echo $AnmineseDao->getObs_exames() ?>" id="formCadAn"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_hab_intestinal" value="<?php echo $AnmineseDao->getObs_Habit_int() ?>" id="formCadAn"/></td>
            </tr>
                            
            <tr>
                <td colspan="4"><hr></td>
            </tr>
                            
            <tr>
                <td colspan="2"><b>| Medicamentos:</b></td>
                <td colspan="2"><b>| Tabagismo:</b></td> 
            </tr>
                            
            <tr>
            <?php
            if($AnmineseDao->getMedicamentos()=='Sim'):
                echo"<td>| Sim:<input type='radio' name='medicamentos' value='1' checked='true'/></td>";
                echo"<td>| Não:<input type='radio' name='medicamentos' value='2'/></td>";
            elseif($AnmineseDao->getMedicamentos()=='Não'):
                echo"<td>| Sim:<input type='radio' name='medicamentos' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='medicamentos' value='2' checked='true'/></td>";
            else:   
                echo"<td>| Sim:<input type='radio' name='medicamentos' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='medicamentos' value='2'/></td>";
            endif;
                              
            if($AnmineseDao->getTabagismo()=='Sim'):
                echo"<td>| Sim:<input type='radio' name='tabagismo' value='1' checked='true'/></td>";
                echo"<td>| Não:<input type='radio' name='tabagismo' value='2'/></td>";
            elseif($AnmineseDao->getTabagismo()=='Não'):
                echo"<td>| Sim:<input type='radio' name='tabagismo' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='tabagismo' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim:<input type='radio' name='tabagismo' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='tabagismo' value='2'/></td>"; 
            endif;             
            ?>      
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_medicamentos" value="<?php echo $AnmineseDao->getObs_medicamentos() ?>" id="formCadAn"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_tabagismo" value="<?php echo $AnmineseDao->getObs_Tabagismo() ?>" id="formCadAn"/></td>
            </tr>
                  
            <tr>
                <td colspan="4"><hr></td>
            </tr>
                            
            <tr>
                <td colspan="2"><b>| Suplementos:</b></td>
                <td colspan="2"><b>| Etilismo:</b></td> 
            </tr>
                 
            <tr>
            <?php
            if($AnmineseDao->getSuplementos()=='Sim'):
                echo"<td>| Sim:<input type='radio' name='suplementos' value='1' checked='true' /></td>";
                echo"<td>| Não:<input type='radio' name='suplementos' value='2'/></td>";
            elseif($AnmineseDao->getSuplementos()=='Não'):
                echo"<td>| Sim:<input type='radio' name='suplementos' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='suplementos' value='2' checked='true' /></td>";
            else:
                echo"<td>| Sim:<input type='radio' name='suplementos' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='suplementos' value='2'/></td>";
            endif;
                                  
            if($AnmineseDao->getEtilismo()=='Sim'):
                echo"<td>| Sim:<input type='radio' name='etilismo' value='1'checked='true' /></td>";
                echo"<td>| Não:<input type='radio' name='etilismo' value='2'/></td>";
            elseif($AnmineseDao->getEtilismo()=='Não'):
                echo"<td>| Sim:<input type='radio' name='etilismo' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='etilismo' value='2' checked='true' /></td>";
            else:
                echo"<td>| Sim:<input type='radio' name='etilismo' value='1'/></td>";
                echo"<td>| Não:<input type='radio' name='etilismo' value='2'/></td>";
            endif;
            ?>
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_suplementos" value="<?php echo $AnmineseDao->getObs_Suplementos() ?>" id="formCadAn"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_etilismo" value="<?php echo $AnmineseDao->getObs_Etilismo() ?>" id="formCadAn"/></td>
            </tr>
                            
            <tr>
                <td colspan="4"><hr></td>
            </tr>         
                            
            <tr>
                <td colspan="2"><b>| Histórico Familiar:</b></td>
                <td colspan="2"><b>| Atividade Física:</b></td>
            </tr>
               
            <tr>
                <td colspan="2">| 
                <select name="historico_familiar">
                <?php
                if($AnmineseDao->getHistorico_familiar()):
                    echo"<option value='{$AnmineseDao->getCod_Doenca()}'> {$AnmineseDao->getHistorico_familiar()} </option>";
                endif;
                    $doencas->listaDoencas();
                ?>   
                </select> 
                </td>
                                
                <td colspan="2">| 
                <select name="atividade_fisica">
                <?php
                if($AnmineseDao->getCod_Atividade()):
                    echo"<option value='{$AnmineseDao->getCod_Atividade()}'> {$AnmineseDao->getAtividades_fisicas()} </option>";
                endif;
                    $Atividades->listaAtividades();
                ?>   
                </select>
                </td>
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_hist_familiar" value="<?php echo $AnmineseDao->getObs_hist_familiar() ?>" id="formCadAn"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_atividades" value="<?php echo $AnmineseDao->getObs_Atividades_Fisicas() ?>" id="formCadAn"/></td>
            </tr>
                 
            <tr>
                <td colspan="4"><hr></td>
            </tr>
                            
            </table>
                        
            <div class="divBotaoCadPac">
            <?php
            if($botaoAcao=='Editar'):
                echo"<button type='submit' onclick='return confirmaEditcao();' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/> {$botaoAcao} </button>";
            else:
                            echo"<button type='submit' onclick='cadastrarPaciente' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/>{$botaoAcao} </button>";
            endif;
            ?>
            <script>
                function confirmaEditcao(){
                    editcon= confirm('Deseja realmente Alterar esses Dados ?');
                    if(editcon){
                        return true;
                    }else{
                           return false;
                        }
                }
            </script>
            </div> 
                    
            </form>
                
            <div class="divBotaoCancPac">
                        <a href="dadosPacientes.php?idpac=<?php echo $paciente->getId_Pessoa()?>"><button  id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button></a>
            </div>
                    
            <?php
            if($Anminese->getId_Anminese()):
                echo"<div class='divBotaoExPac'>";
                echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                    . "<input type='hidden' name='ex_idan' value='{$Anminese->getId_Anminese()}'/>"
                    . "<input type='hidden' name='tipoexc' value='2'/>"
                    . "<input type='hidden' name='pac' value='{$paciente->getId_Pessoa()}'/>"
                    . "<button type='submit' onclick='return confDelAn();' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                    . "</form>";
            ?>  
            <script>
                function confDelAn(){
                    var conf= confirm('Deseja realmente Excluir a Anminese deste Paciente ?');
                    if(conf)
                        return true;
                    else
                        return false;
                }
            </script>
            </div>
            <?php
            endif;
            ?>
            </div>
        </div>           
        
        
    </body>
</html>
