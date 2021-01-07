<?php

//require_once './controle.php';

require('./_app/config.inc.php');

$paciente = new PacienteMold();
$anminese = new AnmineseMold();
$consumos = new ConsumosMold();
$Avaliacao = new AvaliacaoMold();
$Bioimpedancia = new BioImpedancia();
$Observacao = new Observacao();
$DeletarDados = new DeletarDados() ;



if(isset($_POST['tipoexc'])):
    
    if($_POST['tipoexc']==1):
        
        if(isset($_POST['ex_idpac'])):
            $paciente->setId_Pessoa($_POST['ex_idpac']);
            $DeletarDados->DeletarPaciente($paciente);
            header("Location: pacientes.php");
        endif;
    
    
    endif;
    
    if($_POST['tipoexc']==2):
        
        if(isset($_POST['ex_idan']))
            $anminese->setId_Anminese($_POST['ex_idan']);
            $DeletarDados->DeletaAmnise($anminese);
            $paciente->setId_Pessoa($_POST['pac']);
            header("Location: PacienteDados.php?idpac={$paciente->getId_Pessoa()}#Anminese");
        endif;
        
    if($_POST['tipoexc']==3):
        
        if(isset($_POST['ex_idcon'])):
            $consumos->setId_Consumos($_POST['ex_idcon']);
            $DeletarDados->DeletaConsumos($consumos);
            $paciente->setId_Pessoa($_POST['pac']);
            header("Location: PacienteDados.php?idpac={$paciente->getId_Pessoa()}#Anminese");
        endif;
        
    endif;
    
    if($_POST['tipoexc']==4):
        if($_POST['ex_idav']):
            $Avaliacao->setId_Avaliacao($_POST['ex_idav']);
            $DeletarDados->DeletaAvaliacao($Avaliacao);
            $paciente->setId_Pessoa($_POST['pac']);
            
            if($DeletarDados->getResult()):
                echo $DeletarDados->getResult();
            else:
                echo 0;
            endif;
           // header("Location: Avaliacoes.php?idpac={$paciente->getId_Pessoa()}");
        endif;
    endif;
    
    if($_POST['tipoexc']==5):
        if($_POST['ex_idbio']):
            $Bioimpedancia->setId_bio($_POST['ex_idbio']);
            $DeletarDados->DeletaBioimpedancia($Bioimpedancia);
            $paciente->setId_Pessoa($_POST['pac']);
            if($DeletarDados->getResult()):
                echo $DeletarDados->getResult();
            else:
                echo 0;
            endif;
            //var_dump( $DeletarDados->DeletaBioimpedancia($Bioimpedancia));
           // header("Location: CadastrarBioimpedancia2.php?idpac={$paciente->getId_Pessoa()}");
        endif;
    endif;
    
    if($_POST['tipoexc']==6):
        if($_POST['ex_idobs']):
            $Observacao->setId_Obs($_POST['ex_idobs']);
            $DeletarDados->DeletarObs($Observacao);
            $paciente->setId_Pessoa($_POST['pac']);
            header("Location: pacientes.php?idpac={$paciente->getId_Pessoa()}");
        endif;
    endif;
    
endif;
    
   

