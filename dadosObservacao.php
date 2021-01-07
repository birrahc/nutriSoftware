<?php

require("./_app/config.inc.php");

$dadosObs = new Observacao();
$insertObs = new Cadastro();
$AtualizaObs = new AtualizaDados();

if(isset($_POST['id_observacao'])):
    $dadosObs->setId_Obs($_POST['id_observacao']);
endif;
if(isset($_POST['paciente_obs'])):
    $dadosObs->setId_Pessoa($_POST['paciente_obs']);

    if(isset($_POST['data_obs'])):
    $dadosObs->setData_obs($_POST['data_obs']);
    endif;

    if(isset($_POST['observacao'])):
        $dadosObs->setObservacao($_POST['observacao']);
    endif;
    
    if($dadosObs->getId_Obs() < 1):
        $insertObs->cadatrarObservacao($dadosObs);
        if($insertObs->getUltimaId() > 0):
            echo $insertObs->getUltimaId();
        else:
            echo 0;
        endif;
        //header("Location: pacientes.php?idpac={$dadosObs->getId_Pessoa()}");
    elseif($dadosObs->getId_Obs()>=1):
        $AtualizaObs->AtualizarObservacao($dadosObs);
        if($AtualizaObs->getResultado() > 0):
          echo  $AtualizaObs->getResultado();
        endif;
        //header("Location: pacientes.php?idpac={$dadosObs->getId_Pessoa()}");
    endif;
endif;

