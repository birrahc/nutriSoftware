<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>

<html lang="pt-br">
    <?php
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
    
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="Script/ValidaCamposImpedancia.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/stylo_large.css" rel="stylesheet"/>
        <title><?php echo $acaoTitulo ?></title>
    </head>
    
    <body>
        <div id="pagina" style="float:none; margin: auto; margin-top: -21px;">
           
	<main>
            
            <section>
		<div class="conteudo">

                    <h2><?php echo $acaoTitulo ?></h2>

                    <div class="camada-2">

                        <div class="camada-3">
                            
                            <div id="titulo-paciente"><p>Paciente: <b><?php echo $pacienteDados->getNome() ?></b> | Idade: <b><?php echo $pacienteDados->getIdade() ?> anos</b> | Altura:<b><?php echo $pacienteDados->getAltura() ?></b></p></div>
                                
                            <div class="dados-ava-bio div-ajuste-dados" style="width: 29% !important;">
                            <?php
                                $BioDados->ListaBioImpedancia($Bioimp, 1)
                            ?>			
                            </div>
                            <div class="div-ind-bio div-ajut-ind">
                            
                                <div class="indice-bio"><h1>Data</h1></div>
                               
                                <div class="indice-bio"><h1>Peso</h1></div>
                                
                                <div class="indice-bio"><h1>Imc</h1></div>
                               
                                <div class="indice-bio"><h1>%Gord.Corporal</h1></div>
                                
                                <div class="indice-bio"><h1>%Musc.Esquelético</h1></div>
                                
                                <div class="indice-bio"><h1>Met.Basal</h1></div>
                               
                                <div class="indice-bio"><h1>Idade Corporal</h1></div>
                                
                                <div class="indice-bio"><h1>Gord.Veceral</h1></div>
                              
                        </div>
                            <form name="cadastrarBioimpedancia" action="dadosBioimpedancia.php" method="POST" onsubmit=" return validBio();">        
                                <div class="div-indice div-ajut-ind div-ajut-form div-ajut-form-bio">
                                    <input type="hidden" name="id_bio" value="<?php echo $Bioimp->getId_bio() ?>"/>
                                    <input type="hidden" name="id_paciente" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                                    <input type="date" name="data_bio" value="<?php echo $Bioimp->getData_bio() ?>">
                                    <input type="text" name="peso_bio" value="<?php echo $Bioimp->getPeso_bio() ?>">
                                    <input type="text" name="imc_bio" value="<?php echo $Bioimp->getImc() ?>">
                                    <input type="text" name="perc_gord_corp" value="<?php echo $Bioimp->getPerc_gord_corp() ?>">
                                    <input type="text" name="perc_musc_esq" value="<?php echo $Bioimp->getPerc_musc_esq() ?>">
                                    <input type="text" name="met_basal" value="<?php echo $Bioimp->getMetabolismo_basal() ?>">
                                    <input type="text" name="idade_corpoaral" value="<?php echo $Bioimp->getIdade_corporal() ?>">
                                    <input type="text" name="gord_viceral" value="<?php echo $Bioimp->getGordura_viceral() ?>">
                                </div>

                                <div id="obsAvaliacao">
                                    <h3 style="color:whitesmoke;">Observação</h3>
                                    <p>Referente a data <?php echo  date('d/m/Y', strtotime($Bioimp->getData_bio())) ?></p>
                                        <textarea name="observacao_bio"><?php echo ""?></textarea>
                                </div>
                                
                                <?php
                                $acao="";
                                if($botaoAcao=='Editar'):
                                    $acao="onclick='return confirmaEditAval();'";
                                endif;
                                ?>

                                <div class="botoes Ajude-botoes-bio">
                                    <button type="submit" <?php echo $acao ?>> <?php echo $botaoAcao ?> </button>
                                </div>
                                
                                <script>
                                    function confirmaEditAval(){
                                        editAval = confirm('Deseja realmente confirmar as alterações desta Avaliação ?');
                                        if(editAval)
                                            return true;
                                        else
                                            return false;
                                    }
                                </script> 
                                
                            </form>
                            
                            <div class="botoes Ajude-botoes-bio">
                                <form method="GET" action="PacienteDados.php">
                                    <input type="hidden" name="idpac" value="<?php echo $pacienteDados->getId_Pessoa() ; ?>"/>
                                    <button  type="submit"> Cancelar</button>
                                </form>
                            </div>
                            
                            <?php
                                $acaobotao="";
                                if(!$Bioimp->getId_bio()):
                                    $acaobotao="disabled='true'";
                                endif;
                            ?>
                            <div class="botoes Ajude-botoes-bio">
                            <form name="excluirPaciente" action="excluirdados.php" method="POST">
                                <input type="hidden" name="ex_idbio" value="<?php echo $Bioimp->getId_bio(); ?>"/>
                                <input type="hidden" name="tipoexc" value="5"/>
                                <input type="hidden" name="pac" value="<?php echo $Bioimp->getId_Pessoa() ?>"/>
                                <button type="submit" <?php echo $acaobotao ?>onclick="return confExAva();"> Excluir </button>
                   .        </form>
                                
                            <script>
                                function confExAva(){
                                    var excAval = confirm('Deseja realmente excluir esta avaliação ?');
                                    if(excAval)
                                        return true;
                                    else
                                return false;
                                }
                                </script>
                            </div>
			</div>

                    </div>
                    
                    </div>

		</div>
                
               
            </section>
            
	</main>
        </div>
            <div style="clear:both"></div> 
    </body>
</html>
