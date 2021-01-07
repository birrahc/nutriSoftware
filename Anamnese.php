<!DOCTYPE html>
<?php
    
    require_once './controle.php';
    require('./_app/config.inc.php');
    
    $Anamnese = new AnmineseMold();
    $AnamneseDao = new AnmineseMold();
    
    if(isset($_GET['idpac'])):
        $Anamnese->setId_Pessoa($_GET['idpac']);
        $AnamneseDao->ListaAnminese($Anamnese, 0);
    endif;
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
        <div class="container-fluid">
        <?php
            require 'menu.php';
        ?>
        </div>
            <div class="container" style="margin-top: 64px;">
            <div class="row">
                <div class="col-12 bdr-20 pt-2 pb-2 bds-1 bcAzulMar">
                    <?php
                    if($AnamneseDao->getId_Anminese()):
                    ?>
                    <div class="col-12 bg-secondary p-1 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $AnamneseDao->getNome() ?></b></h5> </div>
                    <div class="float-left text-center" style="width: 20%; padding: 173px 0;"><h2 class="text-secondary">Anamnese</h2></div>
                    <div class="float-left" style="width: 60%; margin: auto;">
                        <div class="col-12 p-1">
                            <h6 class="h-tit">Objetivo</h6> 
                            <div class="circ bdr-5">
                                <div class="pl-3"><p class='m-0' style='margin-left:76px !important;'><?php echo $AnamneseDao->getObjetivo() ?></p></div>
                            </div>
                        </div>
                            <h6 class="h-tit">Diagnóstico Médico</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $AnamneseDao->getDiagnostico_medico() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $AnamneseDao->getObs_Diag_medico() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <?php
                        if($AnamneseDao->getExames()=='Sim' || $AnamneseDao->getObs_exames()):
                            echo"<h6 class='h-tit'>Exames</h6>"
                            . "<div class='circ bdr-5'>"
                                . "<div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_exames()}</p></div>"
                            . "</div>";
                        endif;
                        if($AnamneseDao->getMedicamentos()=='Sim' || $AnamneseDao->getObs_medicamentos()):
                            echo"<h6 class='h-tit'>Medicamentos</h6>"
                            . "<div class='circ bdr-5'>"
                                . "<div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_medicamentos()}</p></div>"
                            . "</div>";
                        endif;
                        if($AnamneseDao->getSuplementos()=='Sim' || $AnamneseDao->getObs_Suplementos()):
                            echo"<h6 class='h-tit'>Suplementos</h6>"
                            . "<div class='circ bdr-5'>"
                                . "<div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_Suplementos()}</p></div>"
                            . "</div>";
                        endif;
                        ?>

                        <h6 class="h-tit">Histórico Familiar</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="m-0 text-center"><?php echo $AnamneseDao->getHistorico_familiar() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%;margin:0 2.4%;"><p class="m-0 text-center"><?php echo $AnamneseDao->getObs_hist_familiar() ?></p></div>
                            <div style="clear:both"></div>
                        </div>
                        <?php
                        if($AnamneseDao->getSinais_sintomas()=='Sim' || $AnamneseDao->getObs_Sinais_Sintomas()):
                            echo"<h6 class='h-tit'>Sinais e Sintomas</h6>"
                            . "<div class='circ bdr-5'>"
                                . "<div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_Sinais_Sintomas()}</p></div>"
                            . "</div>";
                        endif;
                        ?>

                        <h6 class="h-tit">Hábitos Intestinais</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin: 0 2.4%"><p class="m-0 text-center"><?php echo $AnamneseDao->getHabito_intestinal() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin: 0 2.4%"><p class="m-0 text-center"><?php echo $AnamneseDao->getObs_Habit_int() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>

                        <?php
                        if($AnamneseDao->getTabagismo()=='Sim' || $AnamneseDao->getObs_Tabagismo()):
                        echo"<h6 class='h-tit'>Tabagismo</h6>
                            <div class='circ bdr-5'>
                                <div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_Tabagismo()}</p></div>
                            </div>";
                        endif;

                        if($AnamneseDao->getEtilismo()=='Sim' || $AnamneseDao->getObs_Etilismo()):
                            echo"<h6 class='h-tit'>Etilismo</h6>"
                            . "<div class='circ bdr-5'>"
                                . "<div class='pl-3'><p class='m-0' style='margin-left:76px !important;'>{$AnamneseDao->getObs_Etilismo()}</p></div>"
                            . "</div>";
                        endif;
                        ?>
                        <h6 class="h-tit">Atividades Fisicas</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width: 30%; margin: 0 2.4%;"><p class="m-0 text-center"><?php echo $AnamneseDao->getAtividades_fisicas() ?></p></div>
                            <div class="pl-3 float-left" style="width: 60%; margin: 0 2.4%;"><p class="m-0 text-center"><?php echo $AnamneseDao->getObs_Atividades_Fisicas() ?></p></div>
                            <div style="clear: both;"></div>
                        </div>
                    </div> 
                    <div class="float-left" style="width: 20%">
                        <nav class="mt-5" style="margin-left: 120px;">
                            <ul class="m-0 p-0">
                                <li class="d-flex mt-5"><a href="pacientes.php?idpac=<?php echo $AnamneseDao->getId_Pessoa()?>"><img src="icons-main/icons/person-badge.svg" alt="Dados Paciente" width="25" height="25" title="Dados Paciente"></a></li>
                                <li class='d-flex mt-5'><a href="Avaliacoes.php?idpac=<?php echo $AnamneseDao->getId_Pessoa()?>"><img src="icons-main/icons/table.svg" alt="Avaliações" width="25" height="25" title="Avaliações"></a></li>
                                <li class='d-flex mt-5'><a href='BioImpedancia.php?idpac=<?php echo $AnamneseDao->getId_Pessoa()?>'><img src='icons-main/icons/tablet-landscape.svg' alt='Bioimpedância' width='25' height='25' title='BioImpedância'></a></li>
                                <li class='d-flex mt-5'><a href="consumos.php?idpac=<?php echo $AnamneseDao->getId_Pessoa()?>"><img src='icons-main/icons/basket2.svg' alt='Consumos' width='25' height='25' title='Consumos'></a></li>
                                <li class="d-flex mt-5"><a href="CadastrarAnamnese.php?cod_anminese=<?php echo $AnamneseDao->getId_Anminese()?>&idpac=<?php echo $AnamneseDao->getId_Pessoa()?>"><img src="icons-main/icons/pencil-square.svg" alt="Editar" width="25" height="25" title="Editar"></a></li>
                            </ul>
                        </nav>
                    </div>
                    <?php
                        else:
                            echo"<div class='col-12'>"
                            . "Anamnese não cadastrada <a href='CadastrarAnamnese.php?idpac={$Anamnese->getId_Pessoa()}'>Cadastrar</a></div>";
                        endif;
                    ?>
                </div>
            </div>
        </div>        
    </body>
</html>


