<!DOCTYPE html>
<?php

require_once './controle.php';
require('./_app/config.inc.php');

$Avalicao = new AvaliacaoMold();
$AvaliacaoDao = new AvaliacaoMold();

if(isset($_GET['idpac'])):
    isset($_GET['idpac']);
    $Avalicao->setId_Pessoa($_GET['idpac']);
endif;

?>
<html>
    <head>
        <meta charset="UTF-8">
       
        <link rel="stylesheet" href="css/stylo.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/validacao.js"></script>
        <script src="js/validaUpadte.js"></script>
        
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
                    <div class="col-12 bcAzulMar bdr-20 pt-2 pb-2 bds-1">
                        <?php
                            $AvaliacaoDao->ListaAvaliacao($Avalicao, null);

                            if(isset($_GET['idpac'])):
                                if($AvaliacaoDao->getId_Avaliacao()):   
                        ?>
                        <div class="col-12 bg-secondary p-1 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $AvaliacaoDao->getNome() ?></b> | Idade: <b><?php echo $AvaliacaoDao->getIdade() ?> anos</b> | Altura:<b><?php echo $AvaliacaoDao->getAltura() ?></b></h5></div>
                        <div class="bloco-avaliacao">
                            <div class="bg-secondary indice-avaliacao "><h4>Avaliações:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Data:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Peso:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>---------</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Cintura:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Abdominal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Quadril:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Peito</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Braço D</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Braço E</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Coxa D</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Coxa E</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>-------</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Triceps:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Escapular:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Supra Iliaca:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Abdominal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Axilar:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Peitoral:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Coxa:</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="margin-top: 2px"><h4>%Gordura</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>M.Muscular</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Gordura</h4></div>
                        </div>
                        <div class="display-dados-aval">
                            <form class="excluirAvaliacao" action="excluirdados.php" method="POST">
                            <?php
                              $AvaliacaoDao->ListaAvaliacao($Avalicao, 1);
                            ?>
                            </form>
                        </div>
                        <div class="menus-aval float-left">
                            <nav class="mt-5">
                                        <ul class="m-0 p-0">
                                            <li class="d-flex mt-5"><a href='pacientes.php?idpac=<?php echo $AvaliacaoDao->getId_Pessoa()?>'><img src='icons-main/icons/person-badge.svg' alt='Dados Paciente' width='25' height='25' title='Dados Paciente'></a></li>
                                            <li class='d-flex mt-5'><a href='BioImpedancia.php?idpac=<?php echo $AvaliacaoDao->getId_Pessoa()?>'><img src='icons-main/icons/tablet-landscape.svg' alt='Bioimpedância' width='25' height='25' title='BioImpedância'></a></li>
                                            <li class='d-flex mt-5'><a href='Anamnese.php?idpac=<?php echo $AvaliacaoDao->getId_Pessoa()?>'><img src='icons-main/icons/clipboard.svg' alt='Anminese' width='25' height='25' title='Anminese'></a></li>
                                            <li class='d-flex mt-5'><a href='consumos.php?idpac=<?php echo $AvaliacaoDao->getId_Pessoa()?>'><img src='icons-main/icons/basket2.svg' alt='Consumos' width='25' height='25' title='Consumos'></a></li>
                                            <li class='d-flex mt-5'><a href='printAvaliacao2.php?idpac=<?php echo $Avalicao->getId_Pessoa()?>'><img src='icons-main/icons/eye-fill.svg' alt='Visualizar' width='25' height='25' title='Visualizar'></a></li>
                                            <li class='d-flex mt-5'><a href='CadastraAvaliacao3.php?idpac=<?php echo $Avalicao->getId_Pessoa()?>'><img src='icons-main/icons/plus-square-fill.svg' alt='Cadastrar Nova' width='25' height='25' title='Cadastrar Nova'></a></li>
                                        </ul>
                                    </nav>
                        </div>
                    <?php
                        else:
                            echo "Nenhuma Avaliação cadastrada!"
                            . "<a href='CadastraAvaliacao3.php?idpac={$Avalicao->getId_Pessoa()}'> Cadatrar 1º Avaliação</a>"
                            . "<a href='pacientes.php?idpac={$Avalicao->getId_Pessoa()}'>Cancelar</a>";
                        endif;
                      endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
