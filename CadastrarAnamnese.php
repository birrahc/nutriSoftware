<!DOCTYPE html>
<?php
    
    require_once './controle.php';
    require('./_app/config.inc.php');
    
    $paciente= new PacienteMold();
    $pacientedao = new PacienteMold();
    $Anamnese = new AnmineseMold();
    $AnamneseDao = new AnmineseMold();
    $doencas = new Doencas();
    $Atividades = new AtividadesFisicas();
    $habitos = new HabitosIntestinais();
    
     if(isset($_GET['idpac'])&& $_GET['idpac']>=1):
        $paciente->setId_Pessoa($_GET['idpac']);
        $pacientedao->dadosPacientes($paciente, 3);
        
    else:
        //header("location: cadastrarPaciente.php");
    endif;
    
        $DescPagina="Cadastro Anminese";
        $botaoAcao="Cadastrar";
        
    if(isset($_GET['cod_anminese'])):
        isset($_GET['cod_anminese']);
        if($_GET['cod_anminese']>=1):
            $Anamnese->setId_Anminese($_GET['cod_anminese']);
            $AnamneseDao->ListaAnminese($Anamnese,2); 
            $DescPagina="Editar Dados Anminese";
            $botaoAcao="Editar";
        endif;
    endif;
    /*if(isset($_GET['idpac'])):
        $Anamnese->setId_Pessoa($_GET['idpac']);
        $AnamneseDao->ListaAnminese($Anamnese, 0);
    endif;*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/stylo.css">
        <script src="css/jquery-3.5.1.min.js"></script>
        <script src="css/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
       <body>
        <div class="container">
            <div class="row">
                <div class="col-12 bdr-20 pt-2 pb-2 bds-1 bcAzulMar">
                    <div class="col-12 bg-secondary p-1 bdr-5">
                        <h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $pacientedao->getNome() ?></b></h5>
                    </div>
                    <div class="conteudoCad">
                        <form name="cadastrarAnminese" action="dadosAnminese.php" method="POST">
                            <input type="hidden" name="id_paciente" value="<?php echo $pacientedao->getId_Pessoa()?>"/>
                            <input type="hidden" name="id_anminese" value="<?php echo $AnamneseDao->getId_Anminese() ?>"/>
                            <div class="bg-light w-100 p-2 mt-1 bdr-10">
                                <h6 class="m-0">Objetivo</h6>
                                <input type="text" class="bdr-5 border-0 w-100" name="objetivo" value="<?php echo $AnamneseDao->getObjetivo() ?>"/>
                            </div>
                            <div class="float-left w-49">
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Diagnnostico Médico</h6>
                                    <div class="selectores">
                                        <select name="diag_medico">
                                        <?php
                                            if($AnamneseDao->getDiagnostico_medico()):
                                                echo"<option value='{$AnamneseDao->getCod_Doenca()}'> {$AnamneseDao->getDiagnostico_medico()} </option> "; 
                                            endif;
                                            $doencas->listaDoencas();
                                        ?>
                                        </select>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_diag_medico" value="<?php echo $AnamneseDao->getObs_Diag_medico() ?>"/>
                                    </div>
                                    <div style="clear: both"/></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Exames</h6>
                                    <div class="selectores">
                                    <?php
                                        if($AnamneseDao->getExames()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='exames' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='exames' value='2'/></div>";
                                        elseif($AnamneseDao->getExames()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='exames' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='exames' value='2' checked='true'/></div>";
                                        else:
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='exames' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='exames' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_exames" value="<?php echo $AnamneseDao->getObs_exames() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Medicamentos</h6>
                                    <div class="selectores">
                                   <?php
                                        if($AnamneseDao->getMedicamentos()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='medicamentos' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='medicamentos' value='2'/></div>";
                                        elseif($AnamneseDao->getMedicamentos()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='medicamentos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='medicamentos' value='2' checked='true'/></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='medicamentos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='medicamentos' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_medicamentos" value="<?php echo $AnamneseDao->getObs_medicamentos() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Sulementos</h6>
                                    <div class="selectores">
                                   <?php
                                        if($AnamneseDao->getSuplementos()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='suplementos' value='1' checked='true' /></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='suplementos' value='2'/></div>";
                                        elseif($AnamneseDao->getSuplementos()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='suplementos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='suplementos' value='2' checked='true' /></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='suplementos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='suplementos' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    
                                    <div class="obsCad">
                                       | Obs <input type="text" name="obs_suplementos" value="<?php echo $AnamneseDao->getObs_Suplementos() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Histórico Familiar</h6>
                                    <div class="selectores">
                                        <select name="historico_familiar">
                                         <?php
                                         if($AnamneseDao->getHistorico_familiar()):
                                             echo"<option value='{$AnamneseDao->getCod_Doenca()}'> {$AnamneseDao->getHistorico_familiar()} </option>";
                                         endif;
                                             $doencas->listaDoencas();
                                         ?>   
                                         </select>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_hist_familiar" value="<?php echo $AnamneseDao->getObs_hist_familiar() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                
                            </div>
                            <div class="float-left w-49 ml2">
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Sinais e Sintomas</h6>
                                    <div class="selectores">
                                    <?php
                                        if($AnamneseDao->getSinais_sintomas()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sinais_sintomas' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sinais_sintomas' value='2'/></div>";
                                        elseif($AnamneseDao->getSinais_sintomas()=='Não'):
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='sinais_sintomas' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='sinais_sintomas' value='2' checked='true'/></div>";
                                        else:
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='sinais_sintomas' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='sinais_sintomas' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_sinais_sintomas" value="<?php echo $AnamneseDao->getObs_Sinais_Sintomas() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Habitos Intestinais</h6>
                                    <div class="selectores">
                                         <select name="hab_intestinais">
                                        <?php
                                            if($AnamneseDao->getHabito_intestinal()):
                                                echo"<option value='{$AnamneseDao->getCod_Habito()}'> {$AnamneseDao->getHabito_intestinal()} </option>";
                                            endif;
                                            $habitos->listaHabitos();
                                        ?>
                                    </select>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_hab_intestinal" value="<?php echo $AnamneseDao->getObs_Habit_int() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Tabagismo</h6>
                                    <div class="selectores">
                                    <?php
                                        if($AnamneseDao->getTabagismo()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='tabagismo' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='tabagismo' value='2'/></div>";
                                        elseif($AnamneseDao->getTabagismo()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='tabagismo' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='tabagismo' value='2' checked='true'/></div>";
                                        else:
                                           echo"<div class='float-left w-45'>| Sim:<input type='radio' name='tabagismo' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='tabagismo' value='2'/></div>"; 
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_tabagismo" value="<?php echo $AnamneseDao->getObs_Tabagismo() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Etilismo</h6>
                                    <div class="selectores">
                                    <?php
                                        if($AnamneseDao->getEtilismo()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='etilismo' value='1'checked='true' /></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='etilismo' value='2'/></div>";
                                        elseif($AnamneseDao->getEtilismo()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='etilismo' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='etilismo' value='2' checked='true' /></div>";
                                        else:
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='etilismo' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='etilismo' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_etilismo" value="<?php echo $AnamneseDao->getObs_Etilismo() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Atividades Fisicas</h6>
                                    <div class="selectores">
                                        <select name="atividade_fisica">
                                        <?php
                                            if($AnamneseDao->getCod_Atividade()):
                                                echo"<option value='{$AnamneseDao->getCod_Atividade()}'> {$AnamneseDao->getAtividades_fisicas()} </option>";
                                            endif;
                                            $Atividades->listaAtividades();
                                        ?>   
                                       </select>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_atividades" value="<?php echo $AnamneseDao->getObs_Atividades_Fisicas() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                            <div class="float-right w-45 ml-mr-25 p-2"><button class="btn btn-info w-100 p-2 bdr-10">Cadastrar</button></div>
                        </form>
                        <form action="pacientes.php" method="GET">
                            <input type="hidden" name="idpac" value="<?php echo $paciente->getId_Pessoa() ?>"/>
                        <div class="float-right w-45 ml-mr-25 p-2"><button class="btn btn-danger w-100 p-2 bdr-10">Cancelar</button></div>
                        </form>
                        <div style="clear: both"s></div>
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>


