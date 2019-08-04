<?php 
    require_once './controle.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

require ('./_app/config.inc.php');
$paciente = new PacienteMold();
$Avaliacao = new AvaliacaoMold();
$avaliacaoCad = new Cadastro();
$AtualizarAval = new AtualizaDados();


        
        
if(isset($_POST['id_paciente'])):
   $Avaliacao->setId_Pessoa($_POST['id_paciente']);
endif;

if(isset($_POST['consulta'])):
   $Avaliacao->setAvaliacao($_POST['consulta']);
endif;

if(isset($_POST['data_avalicao'])):
  $Avaliacao->setDataAvalicao($_POST['data_avalicao']);
endif;

if(isset($_POST['peso'])):
  $Avaliacao->setPeso($_POST['peso']);  
endif;

if(isset($_POST['c_cintura'])):
   $Avaliacao->setC_Cintura($_POST['c_cintura']); 
endif;

if(isset($_POST['c_abdominal'])):
  $Avaliacao->setC_Abdominal($_POST['c_abdominal']);  
endif;

if(isset($_POST['c_quadril'])):
  $Avaliacao->setC_Quadril($_POST['c_quadril']);  
endif;

if(isset($_POST['c_peito'])):
  $Avaliacao->setC_Peito($_POST['c_peito']);  
endif;

if(isset($_POST['c_braco_d'])):
  $Avaliacao->setC_Braco_D($_POST['c_braco_d']);  
endif;

if(isset($_POST['c_braco_e'])):
  $Avaliacao->setC_Braco_E($_POST['c_braco_e']); 
endif;

if(isset($_POST['c_coxa_d'])):
   $Avaliacao->setC_Coxa_D($_POST['c_coxa_d']); 
endif;

if(isset($_POST['c_coxa_e'])):
  $Avaliacao->setC_Coxa_E($_POST['c_coxa_e']);  
endif;

if(isset($_POST['dc_triceps'])):
  $Avaliacao->setDc_Triceps($_POST['dc_triceps']);  
endif;

if(isset($_POST['dc_escapular'])):
  $Avaliacao->setDc_Escapular($_POST['dc_escapular']); 
endif;

if(isset($_POST['dc_supra_iliaca'])):
   $Avaliacao->setDc_Supra_Iliaca($_POST['dc_supra_iliaca']); 
endif;

if(isset($_POST['dc_abdominal'])):
  $Avaliacao->setDc_Abdominal($_POST['dc_abdominal']);  
endif;

if(isset($_POST['dc_axilar'])):
  $Avaliacao->setDc_Axilar($_POST['dc_axilar']);  
endif;

///
if(isset($_POST['dc_peitoral'])):
  $Avaliacao->setDc_Peitoral($_POST['dc_peitoral']);  
endif;

if(isset($_POST['dc_coxa'])):
  $Avaliacao->setDc_Coxa($_POST['dc_coxa']); 
endif;

if(isset($_POST['id_avaliacao'])):
    $Avaliacao->setId_Avaliacao($_POST['id_avaliacao']);
endif;
    if($Avaliacao->getId_Avaliacao()>=1):
        $AtualizarAval->AtualizarAvaliacao($Avaliacao);
        header("Location: dadosPacientes.php?cod_aval={$Avaliacao->getId_Avaliacao()}&idpac={$Avaliacao->getId_Pessoa()}#Avaliacao");
        
    elseif($Avaliacao->getId_Avaliacao()<1):
        $avaliacaoCad->CadAvalAntropometrica($Avaliacao);
        header("Location: AvaliacaoDetalhada.php?idpac={$Avaliacao->getId_Pessoa()}&idpg={$avaliacaoCad->getRegistroPagamentos()}");
    endif;

    






