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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/stylo.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                    <div class="col-12 bg-white bdr-20 pt-2 pb-2 bds-1">
                        <div class="col-12">
                            <div style="width: 18%; margin: auto;"><img src="imagens/logo atual.jpg" class="img-fluid"/></div>
                        </div>
                        <?php
                            $AvaliacaoDao->ListaAvaliacao($Avalicao, null);

                            if(isset($_GET['idpac'])):
                                if($AvaliacaoDao->getId_Avaliacao()):   
                        ?>
                        <div class="col-12 bg-secondary p-1"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $AvaliacaoDao->getNome() ?></b> | Idade: <b><?php echo $AvaliacaoDao->getIdade() ?> anos</b> | Altura:<b><?php echo $AvaliacaoDao->getAltura() ?></b></h5></div>
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
                            <div class="bg-secondary indice-avaliacao"><h4>%Gordura</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>M.Muscular</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Gordura</h4></div>
                        </div>
                        <div class="display-dados-aval">
                            <?php
                              $AvaliacaoDao->ListaAvaliacao($Avalicao, 1);
                            ?>
                        </div>
                        
                    <?php
                        else:
                            echo "Nenhuma Avaliação cadastrada";
                        endif;
                      endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
