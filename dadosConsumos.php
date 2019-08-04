<?php 
    require_once './controle.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

require ('./_app/config.inc.php');
$paciente = new PacienteMold();
$consumos = new ConsumosMold();
$consumosCad = new Cadastro();
$AtualizarCons = new AtualizaDados();

if(isset($_GET['id'])):
            $paciente->setId_Pessoa($_GET['id']);
endif;
        
        
if(isset($_POST['id_paciente'])):
   $consumos->setId_Pessoa($_POST['id_paciente']);
endif;

if(isset($_POST['agua'])):
   $consumos->setAgua($_POST['agua']);
endif;

if(isset($_POST['obs_agua'])):
   $consumos->setObs_Agua($_POST['obs_agua']);
endif;

if(isset($_POST['sucos'])):
  $consumos->setSucos($_POST['sucos']);
endif;

if(isset($_POST['obs_sucos'])):
   $consumos->setObs_Sucos($_POST['obs_sucos']);
endif;

if(isset($_POST['liq_d_refeicoes'])):
  $consumos->setDurante_Refeicoes($_POST['liq_d_refeicoes']);  
endif;

if(isset($_POST['obs_refeicoes'])):
   $consumos->setObs_d_Refeicoes($_POST['obs_refeicoes']);
endif;

if(isset($_POST['acucares'])):
   $consumos->setAcucares($_POST['acucares']); 
endif;

if(isset($_POST['obs_acucares'])):
   $consumos->setObs_Acucares($_POST['obs_acucares']);
endif;

if(isset($_POST['sodio'])):
  $consumos->setSodio($_POST['sodio']);  
endif;

if(isset($_POST['obs_sodio'])):
   $consumos->setObs_Sodio($_POST['obs_sodio']);
endif;

if(isset($_POST['refrigerantes'])):
  $consumos->setRefrigerantes($_POST['refrigerantes']);  
endif;

if(isset($_POST['obs_refri'])):
   $consumos->setObs_Refrigerantes($_POST['obs_refri']);
endif;

if(isset($_POST['cereais'])):
  $consumos->setCereais($_POST['cereais']);  
endif;

if(isset($_POST['obs_cereais'])):
   $consumos->setObs_Cereais($_POST['obs_cereais']);
endif;

if(isset($_POST['frutas'])):
  $consumos->setFrutas($_POST['frutas']);  
endif;

if(isset($_POST['obs_frutas'])):
   $consumos->setObs_Frutas($_POST['obs_frutas']);
endif;

if(isset($_POST['verduras'])):
  $consumos->setVerduras($_POST['verduras']); 
endif;

if(isset($_POST['obs_verduras'])):
   $consumos->setObs_Verduras($_POST['obs_verduras']);
endif;

if(isset($_POST['l_almoco'])):
   $consumos->setLocal_Amoco($_POST['l_almoco']); 
endif;

if(isset($_POST['preferencias'])):
  $consumos->setPreferencias($_POST['preferencias']);  
endif;

if(isset($_POST['aversoes'])):
  $consumos->setAversao($_POST['aversoes']);  
endif;

if(isset($_POST['id_consumo'])):
    $consumos->setId_Consumos($_POST['id_consumo']);
endif;
    if($consumos->getId_Consumos()>=1):
        $AtualizarCons->AtualizarConsumos($consumos);
        header("Location: dadosPacientes.php?idpac={$consumos->getId_Pessoa()}#Consumos");
        
    elseif($consumos->getId_Consumos()<1):
        if(!empty($consumos) || !$consumos==null):
            $consumosCad->CadastarConsumos($consumos); 
            header("Location:dadosPacientes.php?idpac={$consumos->getId_Pessoa()}#Consumos");
            var_dump($consumosCad->CadastarConsumos($consumos));
        endif;
    endif;

    echo"Resultado {$consumos->getId_Pessoa()}";
