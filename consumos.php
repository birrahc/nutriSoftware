<!DOCTYPE html>
<?php

    require_once './controle.php';
    require('./_app/config.inc.php');
    
    $consumos = new ConsumosMold();
    $consumosDao = new ConsumosMold();
    
    if(isset($_GET['idpac'])):
        $consumos->setId_Pessoa($_GET['idpac']);
        $consumosDao->ListaConsumos($consumos, 0);
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
                    if($consumosDao->getId_Consumos()):
                    ?>
                    <div class="col-12 bg-secondary p-1 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $consumosDao->getNome() ?></b></h5> </div>
                    <div class="float-left text-center" style="width: 20%; padding: 173px 0;"><h2 class="text-secondary">Consumos</h2></div>
                    <div class="float-left" style="width: 60%; margin: auto;">
                        
                        <h6 class="h-tit">Água</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getAgua() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Agua() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Sucos</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getSucos() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Sucos() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Durante as Refeições</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getDurante_Refeicoes() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_d_Refeicoes() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Áçucares</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getAcucares() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Acucares() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Sódio</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getSodio() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Sodio() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Refrigerantes</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getRefrigerantes() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Refrigerantes() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Cereais</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getCereais() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Cereais() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Frutas</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getFrutas() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Frutas() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Verduras</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getVerduras() ?></p></div>
                            <div class="pl-3 float-left" style="width:60%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getObs_Verduras() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <h6 class="h-tit">Local de Almoço</h6>
                        <div class="circ bdr-5">
                            <div class="pl-3 float-left" style="width:30%; margin:0 2.4%;"><p class="text-center m-0"><?php echo $consumosDao->getLocal_Amoco() ?></p></div>
                            <div style="clear:both;"></div>
                        </div>
                        <?php
                        if($consumosDao->getPreferencias()):
                        echo"<h6 class='h-tit'>Preferências</h6>
                        <div class='circ bdr-5'>
                            <div class='pl-3 float-left' style='width:30%; margin:0 2.4%;'><p class='text-center m-0'> {$consumosDao->getPreferencias()}</p></div>
                            <div style='clear:both;'></div>
                        </div>";
                        endif;
                        if($consumosDao->getAversao()):
                        echo"<h6 class='h-tit'>Aversões</h6>
                        <div class='circ bdr-5'>
                            <div class='pl-3 float-left' style='width:30%; margin:0 2.4%;'><p class='text-center m-0'>{$consumosDao->getAversao()}</p></div>
                            <div style='clear:both;'></div>
                        </div>";
                        endif;
                        ?>
                    </div> 
                    <div class="float-left" style="width: 20%">
                        <nav class="mt-5" style="margin-left: 120px;">
                            <ul class="m-0 p-0">
                                <li class="d-flex mt-5"><a href="pacientes.php?idpac=<?php echo $consumosDao->getId_Pessoa()?>"><img src="icons-main/icons/person-badge.svg" alt="Dados Paciente" width="25" height="25" title="Dados Paciente"></a></li>
                                <li class="d-flex mt-5"><a href="Anamnese.php?idpac=<?php echo $consumosDao->getId_Pessoa()?>"><img src="icons-main/icons/clipboard.svg" alt="Anminese" width="25" height="25" title="Anminese"></a></li>
                                <li class="d-flex mt-5"><a href="Avaliacoes.php?idpac=<?php echo $consumosDao->getId_Pessoa()?>"><img src="icons-main/icons/table.svg" alt="Avaliações" width="25" height="25" title="Avaliações"></a></li>
                                <li class='d-flex mt-5'><a href='BioImpedancia.php?idpac=<?php echo $consumosDao->getId_Pessoa()?>'><img src='icons-main/icons/tablet-landscape.svg' alt='Bioimpedância' width='25' height='25' title='BioImpedância'></a></li>
                                <li class="d-flex mt-5"><a href="cadastrarConsumos.php?cod_consumos=<?php echo $consumosDao->getId_Consumos()?>&idpac=<?php echo $consumosDao->getId_Pessoa()?>"><img src="icons-main/icons/pencil-square.svg" alt="Editar" width="25" height="25" title="Editar"></a></li>
                            </ul>
                        </nav>
                    </div>
                    <?php
                        else:
                            echo"<div class='col-12'>"
                            . " Consumo não cadastrado <a href='cadastrarConsumos.php?idpac={$consumos->getId_Pessoa()}'>Cadastrar</a></div>";
                        endif;
                    ?>
                </div>
            </div>
        </div>        
    </body>
</html>


