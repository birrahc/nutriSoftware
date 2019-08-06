<?php
require_once './controle.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

require ('./_app/config.inc.php');
$paciente = new PacienteMold();
$Bioimp = new BioImpedancia();
$BioCadastro = new Cadastro();
$AtualizarBio = new AtualizaDados();


        
        
if(isset($_POST['id_paciente'])):
   $Bioimp->setId_Pessoa($_POST['id_paciente']);
endif;

if(isset($_POST['data_bio'])):
  $Bioimp->setData_bio($_POST['data_bio']);
endif;

if(isset($_POST['peso_bio'])):
  $Bioimp->setPeso_bio($_POST['peso_bio']);  
endif;

if(isset($_POST['imc_bio'])):
   $Bioimp->setImc($_POST['imc_bio']); 
endif;

if(isset($_POST['perc_gord_corp'])):
  $Bioimp->setPerc_gord_corp($_POST['perc_gord_corp']);  
endif;

if(isset($_POST['perc_musc_esq'])):
  $Bioimp->setPerc_musc_esq($_POST['perc_musc_esq']);  
endif;

if(isset($_POST['met_basal'])):
  $Bioimp->setMetabolismo_basal($_POST['met_basal']);  
endif;

if(isset($_POST['idade_corpoaral'])):
  $Bioimp->setIdade_corporal($_POST['idade_corpoaral']);  
endif;

if(isset($_POST['gord_viceral'])):
  $Bioimp->setGordura_viceral($_POST['gord_viceral']); 
endif;


if(isset($_POST['id_bio'])):
    $Bioimp->setId_bio($_POST['id_bio']);
endif;
    if($Bioimp->getId_bio()>=1):
        $AtualizarBio->AtualizarBioimpedancia($Bioimp);
        header("Location: dadosPacientes.php?cod_aval={$Bioimp->getId_bio()}&idpac={$Bioimp->getId_Pessoa()}#Bioimpedancia");
        
    elseif($Bioimp->getId_bio()<1):
        $BioCadastro->CadBioImpedancia($Bioimp);
        header("Location: dadosPacientes.php?idpac={$Bioimp->getId_Pessoa()}#Bioimpedancia");
    endif;

    






