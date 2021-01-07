 <?php
        require_once './controle.php';
        require('./_app/config.inc.php');
        $paciente = new PacienteMold();
        $pacienteDados = new PacienteMold();
        $Bioimp =  new BioImpedancia();
        $BioDados = new BioImpedancia();
        
        if(isset($_GET['idpac'])):
            $paciente->setId_Pessoa($_GET['idpac']);
            $pacienteDados->dadosPacientes($paciente, 3);
            $Bioimp->setId_Pessoa($paciente->getId_Pessoa());
        else:
            header("location: cadastrarPaciente.php");
        endif;
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $Bioimp->setData_bio(date('Y-m-d'));
        //$BioDados->VerificaConsultaBio($Bioimp);
        //$Bioimp->setConsulta_bio($BioDados->getConsulta_bio());
        
        $acaoTitulo = "Cadastro de Bioimpedância";
        $botaoAcao = "Cadastrar";
       
    if(isset($_GET['id_bio'])):
        isset($_GET['id_bio']);
    
            if($_GET['id_bio']>=1):
            $Bioimp->setId_bio($_GET['id_bio']);
            $BioDados->BioImpedanciaEspecifica($Bioimp);
            //$Bioimp->setConsulta_bio($BioDados->getConsulta_bio());
            $Bioimp->setData_bio($BioDados->getData_bio());
            $Bioimp->setPeso_bio($BioDados->getPeso_bio());
            $Bioimp->setImc($BioDados->getImc());
            $Bioimp->setPerc_gord_corp($BioDados->getPerc_gord_corp());
            $Bioimp->setPerc_musc_esq($BioDados->getPerc_musc_esq());
            $Bioimp->setMetabolismo_basal($BioDados->getMetabolismo_basal());
            $Bioimp->setIdade_corporal($BioDados->getIdade_corporal());
            $Bioimp->setGordura_viceral($BioDados->getGordura_viceral());
            
            $acaoTitulo = "Editar Bioimpedância";
            $botaoAcao = "Editar";
            
        endif;
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
        <style>
            .tableBiocad .tableBio{
                float: right;
                margin-right: 1px;
            }
        </style>
        <title></title>
    </head>
    <body>
       <body>
        <div class="container">
            <div class="row">
                    <div class="col-12 bg-white bdr-20 pt-2 pb-1 bds-1">
                        
                        <div class="col-12 bg-secondary p-1 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $pacienteDados->getNome() ?></b> | Idade: <b><?php echo $pacienteDados->getIdade() ?> anos</b> | Altura:<b><?php echo $pacienteDados->getAltura() ?></b></h5></div>
                        
                        <div class="display-dados-aval w-display-dadosBio tableBiocad w-75">
                            <form class="excluirBio" action="excluirdados.php" method="POST">
                            <?php
                            
                             if($Bioimp->getId_Pessoa()):
                                   $BioDados->ListaBioImpedancia($Bioimp,1); 
                             endif;
                            ?>
                            </form>
                        </div>
                        
                        <div class="bloco-avaliacao bloco-bio-cad">
                            <div class="bg-secondary indice-avaliacao"><h4>Data:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Peso:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>IMC:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>%Gordura Corporal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>%Musc.Esquelético:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Met.Basal</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Idade Corporal</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Gord.Veceral</h4></div>
                            <form action="BioImpedancia.php" method="GET">
                                <input type="hidden" name="idpac" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                                <button type="submit">Cancelar</button>
                            </form>
                        </div>
                        <div class="input-aval p-0 m-0">
                           <form id="cadastrarBioimpedancia" action="dadosBioimpedancia.php" method="POST"> 
                               <input type="hidden" name="id_bio" id="bio_id" value="<?php echo $Bioimp->getId_bio() ?>"/>
                                <input type="hidden" name="id_paciente" id="paciente_id" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                                <input style="height: 55px; width: 110px; position: absolute; top: 43px; font-size: 11px;" pattern="\d+,?\d{0,2}" required type="date" name="data_bio" value="<?php echo $Bioimp->getData_bio() ?>"/>
                                <input style="height: 55px; position: absolute; top: 99px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="peso_bio" value="<?php echo $Bioimp->getPeso_bio() ?>"/>
                                <input style="height: 55px; position: absolute; top: 155px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="imc_bio" value="<?php echo $Bioimp->getImc() ?>"/>
                                <input style="height: 55px; position: absolute; top: 211px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="perc_gord_corp" value="<?php echo $Bioimp->getPerc_gord_corp() ?>"/>
                                <input style="height: 55px; position: absolute; top: 267px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="perc_musc_esq" value="<?php echo $Bioimp->getPerc_musc_esq() ?>"/>
                                <input style="height: 55px; position: absolute; top: 323px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="met_basal" value="<?php echo $Bioimp->getMetabolismo_basal() ?>"/>
                                <input style="height: 55px; position: absolute; top: 379px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="idade_corpoaral" value="<?php echo $Bioimp->getIdade_corporal() ?>"/>
                                <input style="height: 55px; position: absolute; top: 434px; font-size: 15px;" pattern="\d+,?\d{0,2}" required type="text" name="gord_viceral" value="<?php echo $Bioimp->getGordura_viceral() ?>"/>
                                <div style="clear: both"></div>
                                <button style="position: absolute; top: 492px; height: 40px;">
                                   <?php echo $botaoAcao ?>
                                </button>
                            </form>
                            
                        </div>
                </div>
            </div>
        </div>
    </body>
    </body>
</html>

