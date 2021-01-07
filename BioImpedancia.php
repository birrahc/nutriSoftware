<!DOCTYPE html>
<?php
require_once './controle.php';
require('./_app/config.inc.php');

$bioimp = new BioImpedancia();
$bioDao = new BioImpedancia();

if(isset($_GET['idpac'])):
    isset($_GET['idpac']);
    $bioimp->setId_Pessoa($_GET['idpac']);
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
                    <div class="col-12 bcAzulMar bdr-20 pt-2 pb-1 bds-1">
                        <?php
                            $bioDao->ListaBioImpedancia($bioimp, null);

                            if(isset($_GET['idpac'])):
                                if($bioDao->getId_bio()):   
                        ?>
                        <div class="col-12 bg-secondary p-2 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $bioDao->getNome() ?></b> | Idade: <b><?php echo $bioDao->getIdade() ?> anos</b> | Altura:<b><?php echo $bioDao->getAltura() ?></b></h5></div>
                        <div class="bloco-avaliacao w-blocobio">
                            <div class="bg-secondary indice-avaliacao"><h4>Data:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Peso:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>IMC:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>%Gordura Corporal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>%Musc.Esquelético:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Met.Basal</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Idade Corporal</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Gord.Veceral</h4></div>
                        </div>
                        <div class="display-dados-aval w-display-dadosBio">
                            <form class="excluirBio" action="excluirdados.php" method="POST">
                            <?php
                              $bioDao->ListaBioImpedancia($bioimp, 1);
                            ?>
                            </form>
                        </div>
                        <div class="menus-aval float-left mt-mb-30">
                            <nav class="mt-5">
                                        <ul class="m-0 p-0">
                                            <li class="d-flex mt-5"><a href='pacientes.php?idpac=<?php echo $bioimp->getId_Pessoa()?>'><img src='icons-main/icons/person-badge.svg' alt='Dados Paciente' width='25' height='25' title='Dados Paciente'></a></li>
                                            <li class='d-flex mt-5'><a href="Avaliacoes.php?idpac=<?php echo $bioimp->getId_Pessoa()?>"><img src="icons-main/icons/table.svg" alt="Avaliações" width="25" height="25" title="Avaliações"></a></li>
                                            <li class='d-flex mt-5'><a href='Anamnese.php?idpac=<?php echo $bioimp->getId_Pessoa()?>'><img src='icons-main/icons/clipboard.svg' alt='Anminese' width='25' height='25' title='Anminese'></a></li>
                                            <li class='d-flex mt-5'><a href='consumos.php?idpac=<?php echo $bioimp->getId_Pessoa()?>'><img src='icons-main/icons/basket2.svg' alt='Consumos' width='25' height='25' title='Consumos'></a></li>
                                            <li class='d-flex mt-5'><a href='printAvaliacao2.php?idpac=<?php echo $bioimp->getId_Pessoa()?>'><img src='icons-main/icons/eye-fill.svg' alt='Visualizar' width='25' height='25' title='Visualizar'></a></li>
                                            <li class='d-flex mt-5'><a href='CadastrarBioimpedancia2.php?idpac=<?php echo $bioimp->getId_Pessoa()?>'><img src='icons-main/icons/plus-square-fill.svg' alt='Cadastrar Nova' width='25' height='25' title='Cadastrar Nova'></a></li>
                                        </ul>
                                    </nav>
                        </div>
                    <?php
                        else:
                            echo "Nenhuma Avaliação cadastrada!"
                            . "<a href='CadastrarBioimpedancia2.php?idpac={$bioimp->getId_Pessoa()}'> Cadatrar 1º Bioimpedância</a> "
                            . "<a href='pacientes.php?idpac={$bioimp->getId_Pessoa()}'>Cancelar</a>";
                        endif;
                      endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
