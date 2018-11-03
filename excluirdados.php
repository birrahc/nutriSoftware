<?php

require_once './controle.php';

require('./_app/config.inc.php');

$paciente = new PacienteMold();
$anminese = new AnmineseMold();
$consumos = new ConsumosMold();
$Avaliacao = new AvaliacaoMold();
$DeletarDados = new DeletarDados() ;


if(isset($_POST['tipoexc'])):
    
    if($_POST['tipoexc']==1):
        
        if(isset($_POST['ex_idpac'])):
            $paciente->setId_Pessoa($_POST['ex_idpac']);
            $DeletarDados->DeletarPaciente($paciente);
            header("Location: dadosPacientes.php?idpac={$paciente->getIdPessoa()}");
        endif;
    
    
    endif;
    
    if($_POST['tipoexc']==2):
        
        if(isset($_POST['ex_idan']))
            $anminese->setId_Anminese($_POST['ex_idan']);
            $DeletarDados->DeletaAmnise($anminese);
            $paciente->setId_Pessoa($_POST['pac']);
            header("Location: dadosPacientes.php?idpac={$paciente->getId_Pessoa()}#Anminese");
        endif;
        
    if($_POST['tipoexc']==3):
        
        if(isset($_POST['ex_idcon'])):
            $consumos->setId_Consumos($_POST['ex_idcon']);
            $DeletarDados->DeletaConsumos($consumos);
            $paciente->setId_Pessoa($_POST['pac']);
            header("Location: dadosPacientes.php?idpac={$paciente->getId_Pessoa()}#Anminese");
        endif;
        
    endif;
    
    if($_POST['tipoexc']==4):
        if($_POST['ex_idav']):
            $Avaliacao->setId_Avaliacao($_POST['ex_idav']);
            $DeletarDados->DeletaAvaliacao($Avaliacao);
            $paciente->setId_Pessoa($_POST['pac']);
            
            header("Location: cadastrarAvaliacao.php?idpac={$paciente->getId_Pessoa()}#Avaliacao");
        endif;
    endif;
    
endif;
    
   

