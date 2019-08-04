<?php 
    require_once './controle.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

require ('./_app/config.inc.php');
$paciente = new PacienteMold();
$anminese = new AnmineseMold();
$anmineseCad = new Cadastro();
$Atualizar = new AtualizaDados();


if(isset($_GET['id'])):
     $paciente->setId_Pessoa($_GET['id']);
endif;
       
        
if(isset($_POST['id_paciente'])):
   $anminese->setId_Pessoa($_POST['id_paciente']);
endif;

if(isset($_POST['historico_familiar'])):
   $anminese->setHistorico_familiar($_POST['historico_familiar']);
endif;

if(isset($_POST['obs_hist_familiar'])):
    $anminese->setObs_hist_familiar($_POST['obs_hist_familiar']);
endif;

if(isset($_POST['objetivo'])):
  $anminese->setObjetivo($_POST['objetivo']);
endif;

if(isset($_POST['sinais_sintomas'])):
  $anminese->setSinais_sintomas($_POST['sinais_sintomas']);  
endif;

if(isset($_POST['obs_sinais_sintomas'])):
    $anminese->setObs_Sinais_Sintomas($_POST['obs_sinais_sintomas']);
endif;

if(isset($_POST['diag_medico'])):
   $anminese->setDiagnostico_medico($_POST['diag_medico']); 
endif;

if(isset($_POST['obs_diag_medico'])):
    $anminese->setObs_Diag_medico($_POST['obs_diag_medico']);
endif;

if(isset($_POST['hab_intestinais'])):
  $anminese->setHabito_intestinal($_POST['hab_intestinais']);  
endif;

if(isset($_POST['obs_hab_intestinal'])):
   $anminese->setObs_Habit_int($_POST['obs_hab_intestinal']); 
endif;


if(isset($_POST['exames'])):
  $anminese->setExames($_POST['exames']);  
endif;

if(isset($_POST['obs_exames'])):
    $anminese->setObs_exames($_POST['obs_exames']);
endif;

if(isset($_POST['tabagismo'])):
  $anminese->setTabagismo($_POST['tabagismo']);  
endif;

if(isset($_POST['obs_tabagismo'])):
    $anminese->setObs_Tabagismo($_POST['obs_tabagismo']);
endif;

if(isset($_POST['medicamentos'])):
  $anminese->setMedicamentos($_POST['medicamentos']);  
endif;

if(isset($_POST['obs_medicamentos'])):
    $anminese->setObs_medicamentos($_POST['obs_medicamentos']);    
endif;

if(isset($_POST['etilismo'])):
  $anminese->setEtilismo($_POST['etilismo']); 
endif;

if(isset($_POST['obs_etilismo'])):
    $anminese->setObs_Etilismo($_POST['obs_etilismo']);
endif;

if(isset($_POST['suplementos'])):
   $anminese->setSuplementos($_POST['suplementos']); 
endif;

if(isset($_POST['obs_suplementos'])):
    $anminese->setObs_Suplementos($_POST['obs_suplementos']);
endif;

if(isset($_POST['atividade_fisica'])):
  $anminese->setAtividades_fisicas($_POST['atividade_fisica']);  
endif;

if(isset($_POST['obs_atividades'])):
   $anminese->setObs_Atividades_Fisicas($_POST['obs_atividades']); 
endif;

if(isset($_POST['id_anminese'])):
    $anminese->setId_Anminese($_POST['id_anminese']);
endif;
    if($anminese->getId_Anminese()>=1):
        $Atualizar->AtualizarAnminese($anminese);
        header("Location: dadosPacientes.php?idpac={$anminese->getId_Pessoa()}#Anminese");
        
elseif($anminese->getId_Anminese()<1):
    if(!empty($anminese) || !$anminese==null):
        $anmineseCad->CadAnMinese($anminese);
        header("Location: dadosPacientes.php?idpac={$anminese->getId_Pessoa()}#Anminese");
    endif;
endif;
