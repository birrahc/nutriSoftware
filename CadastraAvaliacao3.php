<!DOCTYPE html>
<?php
        require_once './controle.php';
        require('./_app/config.inc.php');
        
        
        $paciente = new PacienteMold();
        $pacienteDados = new PacienteMold();
        $avaliacao =  new AvaliacaoMold();
        $avaliacaoDados = new AvaliacaoMold();
        
        if(isset($_GET['idpac'])):
            $paciente->setId_Pessoa($_GET['idpac']);
            $pacienteDados->dadosPacientes($paciente, 3);
            $avaliacao->setId_Pessoa($paciente->getId_Pessoa());
        else:
            header("location: cadastrarPaciente.php");
        endif;
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $avaliacao->setDataAvalicao(date('Y-m-d'));
        $avaliacaoDados->VerificaConsulta($avaliacao);
        $avaliacao->setAvaliacao($avaliacaoDados->getConsulta());
        
        $botaoAcao = "Cadastrar";
       
    if(isset($_GET['cod_aval'])):
        isset($_GET['cod_aval']);
    
            if($_GET['cod_aval']>=1):
            $avaliacao->setId_Avaliacao($_GET['cod_aval']);
            $avaliacaoDados->AvalEspecifica($avaliacao);
            
            $avaliacao->setAvaliacao($avaliacaoDados->getAvaliacao());
            $avaliacao->setDataAvalicao($avaliacaoDados->getDataAvalicao());
            $avaliacao->setPeso($avaliacaoDados->getPeso());
            $avaliacao->setC_Cintura($avaliacaoDados->getC_Cintura());
            $avaliacao->setC_Abdominal($avaliacaoDados->getC_Abdominal());
            $avaliacao->setC_Quadril($avaliacaoDados->getC_Quadril());
            $avaliacao->setC_Peito($avaliacaoDados->getC_Peito());
            $avaliacao->setC_Braco_D($avaliacaoDados->getC_Braco_D());
            $avaliacao->setC_Braco_E($avaliacaoDados->getC_Braco_E());
            $avaliacao->setC_Coxa_D($avaliacaoDados->getC_Coxa_D());
            $avaliacao->setC_Coxa_E($avaliacaoDados->getC_Coxa_E());
            $avaliacao->setDc_Triceps($avaliacaoDados->getDc_Triceps());
            $avaliacao->setDc_Escapular($avaliacaoDados->getDc_Escapular());
            $avaliacao->setDc_Supra_Iliaca($avaliacaoDados->getDc_Supra_Iliaca());
            $avaliacao->setDc_Abdominal($avaliacaoDados->getDc_Abdominal());
            $avaliacao->setDc_Axilar($avaliacaoDados->getDc_Axilar());
            $avaliacao->setDc_Peitoral($avaliacaoDados->getDc_Peitoral());
            $avaliacao->setDc_Coxa($avaliacaoDados->getDc_Coxa());
            
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
            .display-dados-aval .tableCadAval{
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
                    <div class="col-12 bcAzulMar bdr-20 pt-2 pb-2 bds-1">
                        
                        <div class="col-12 bg-secondary p-1 bdr-5"><h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $pacienteDados->getNome() ?></b> | Idade: <b><?php echo $pacienteDados->getIdade() ?> anos</b> | Altura:<b><?php echo $pacienteDados->getAltura() ?></b></h5></div>
                        
                        <div class="display-dados-aval w-78">
                            <form class="excluirAvaliacao" action="excluirdados.php" method="POST">
                            <?php
                             if($avaliacao->getId_Pessoa()):
                                   $avaliacaoDados->ListaAvaliacao($avaliacao,1); 
                             endif;
                            ?>
                            </form>
                        </div>
                        
                        <div class="bloco-avaliacao">
                            <div class="bg-secondary indice-avaliacao "><h4>Avaliação:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Data:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Peso:</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="border-radius: 5px 0 0 5px"><h4>---------</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Cintura:</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="margin-top:2px"><h4>C.Abdominal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Quadril:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Peito</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Braço D</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Braço E</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="margin-top:2px"><h4>C.Coxa D</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>C.Coxa E</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="border-radius: 5px 0 0 5px"><h4>-------</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Triceps:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Escapular:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Supra Iliaca:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Abdominal:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Axilar:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Peitoral:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>DC.Coxa:</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>%Gordura</h4></div>
                            <div class="bg-secondary indice-avaliacao" style="margin-top: 2px"><h4>M.Muscular</h4></div>
                            <div class="bg-secondary indice-avaliacao"><h4>Gordura</h4></div>
                            <div class="indice-avaliacao"><h4>----</h4></div>
                        </div>
                        <div class="input-aval p-0 m-0">
                           <form id="cadastrarAvaliacao" action="dadosAvaliacao.php" method="POST"> 
                                <input type="hidden" name="id_avaliacao" id="avaliacao_id" value="<?php echo $avaliacao->getId_Avaliacao() ?>"/>
                                <input type="hidden" name="id_paciente" id="paciente_id" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                                <input style="position: relative; top: -1px;" type="text" name="consulta" value="<?php echo $avaliacao->getAvaliacao()?>"/>
                                <input style="height: 20px; width: 114px; position: absolute; top: 67px;" id="data_aval" type="date" name="data_avalicao" value="<?php echo $avaliacao->getDataAvalicao() ?>"/>
                                <input style="height: 20px; position: absolute; top: 90px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" id="peso" name="peso" value="<?php echo $avaliacao->getPeso() ?>"/>
                                <input style="height: 21px; position: absolute; top: 111px; background-color: #6c757d; border-radius: 0 5px 5px 0" type="text" name="" value="" disabled="true"/>
                                <input style="height: 20px; position: absolute; top: 137px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_cintura" value="<?php echo $avaliacao->getC_Cintura() ?>"/>
                                <input style="height: 20px; position: absolute; top: 160px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_abdominal" value="<?php echo $avaliacao->getC_Abdominal() ?>"/>
                                <input style="height: 20px; position: absolute; top: 183px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_quadril" value="<?php echo $avaliacao->getC_Quadril() ?>"/>
                                <input style="height: 20px; position: absolute; top: 207px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" id="c_peito" name="c_peito" value="<?php echo $avaliacao->getC_Peito() ?>"/>
                                <input style="height: 20px; position: absolute; top: 230px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_braco_d" value="<?php echo $avaliacao->getC_Braco_D() ?>"/>
                                <input style="height: 20px; position: absolute; top: 254px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_braco_e" value="<?php echo $avaliacao->getC_Braco_E() ?>"/>
                                <input style="height: 20px; position: absolute; top: 278px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_coxa_d" value="<?php echo $avaliacao->getC_Coxa_D() ?>"/>
                                <input style="height: 20px; position: absolute; top: 299px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="c_coxa_e" value="<?php echo $avaliacao->getC_Coxa_E() ?>"/>
                                <input style="height: 22px; position: absolute; top: 320px; background-color: #6c757d; border-radius: 0 5px 5px 0" type="text" name="" value="" disabled="true"/>
                                <input style="height: 20px; position: absolute; top: 348px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_triceps" value="<?php echo $avaliacao->getDc_Triceps() ?>"/>
                                <input style="height: 20px; position: absolute; top: 371px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_escapular" value="<?php echo $avaliacao->getDc_Escapular() ?>"/>
                                <input style="height: 20px; position: absolute; top: 393px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_supra_iliaca" value="<?php echo $avaliacao->getDc_Supra_Iliaca() ?>"/>
                                <input style="height: 20px; position: absolute; top: 417px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_abdominal" value="<?php echo $avaliacao->getDc_Abdominal() ?>"/>
                                <input style="height: 20px; position: absolute; top: 440px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_axilar" value="<?php echo $avaliacao->getDc_Axilar() ?>"/>
                                <input style="height: 20px; position: absolute; top: 463px;" pattern="\d+,?\d{0,2}" required class="imputAval" type="text" name="dc_peitoral" value="<?php echo $avaliacao->getDc_Peitoral() ?>"/>
                                <input style="position: absolute; top: 485px;" type="text" name="dc_coxa" value="<?php echo $avaliacao->getDc_Coxa() ?>"/>
                                <button style="position: absolute; top: 509px;">
                                    <?php echo $botaoAcao ?>
                                </button>
                            </form>
                            <form method="GET" action="Avaliacoes.php">
                                <input type="hidden" name="idpac" value="<?php echo $pacienteDados->getId_Pessoa() ?>"/>
                                <button type="submit" style="position: absolute; top: 542px;">Cancelar</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </body>
    </body>
</html>
