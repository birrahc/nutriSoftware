<?php 
    require_once './controle.php';
require ('./_app/config.inc.php');
$paciente = new PacienteMold();
$Avaliacao = new AvaliacaoMold();
$avaliacaoCad = new Cadastro();
$AtualizarAval = new AtualizaDados();


        
        
if(isset($_POST['id_paciente'])):
   $Avaliacao->setId_Pessoa(intval( $_POST['id_paciente']));
    //echo"Id Paciente {$Avaliacao->getId_Pessoa()} <br>";
endif;

if(isset($_POST['consulta'])):
   $Avaliacao->setAvaliacao(intval($_POST['consulta']));
    //echo"Consulta {$Avaliacao->getAvaliacao()} <br>";
endif;

if(isset($_POST['data_avalicao'])):
    $Avaliacao->setDataAvalicao($_POST['data_avalicao']);
    //$dataAval = new DateTime();
   // $dataAval->createFromFormat('d/m/Y', $_POST['data_avalicao']);
    //$Avaliacao->setDataAvalicao($dataAval->format('Y-m-d'));
  //echo"Data {$Avaliacao->getDataAvalicao()}<br>";
endif;

if(isset($_POST['peso'])):
  $Avaliacao->setPeso($_POST['peso']);
  //echo"Peso {$Avaliacao->getPeso()}<br>";
endif;

if(isset($_POST['c_cintura'])):
   $Avaliacao->setC_Cintura($_POST['c_cintura']);
    //echo"C.Cintura {$Avaliacao->getC_Cintura()}<br>";
endif;

if(isset($_POST['c_abdominal'])):
  $Avaliacao->setC_Abdominal($_POST['c_abdominal']);
    //echo"C.Abdominal {$Avaliacao->getC_Abdominal()}<br>";
endif;

if(isset($_POST['c_quadril'])):
  $Avaliacao->setC_Quadril($_POST['c_quadril']);
  //echo"C.Quadril {$Avaliacao->getC_Quadril()}<br>";
endif;

if(isset($_POST['c_peito'])):
  $Avaliacao->setC_Peito($_POST['c_peito']); 
  //echo"C.Peito {$Avaliacao->getC_Peito()}<br>";
endif;

if(isset($_POST['c_braco_d'])):
  $Avaliacao->setC_Braco_D($_POST['c_braco_d']);
  //echo"C.Braço D {$Avaliacao->getC_Braco_D()}<br>";
endif;

if(isset($_POST['c_braco_e'])):
  $Avaliacao->setC_Braco_E($_POST['c_braco_e']);
   //echo"C.Braço E {$Avaliacao->getC_Braco_E()}<br>";
endif;

if(isset($_POST['c_coxa_d'])):
   $Avaliacao->setC_Coxa_D($_POST['c_coxa_d']);
   //echo"C.Coxa D {$Avaliacao->getC_Coxa_D()}<br>";
endif;

if(isset($_POST['c_coxa_e'])):
  $Avaliacao->setC_Coxa_E($_POST['c_coxa_e']);
  //echo"C.Coxa E {$Avaliacao->getC_Coxa_E()}<br>";
endif;

if(isset($_POST['dc_triceps'])):
  $Avaliacao->setDc_Triceps($_POST['dc_triceps']);
  //echo"DC.Triceps {$Avaliacao->getDc_Triceps()}<br>";
endif;

if(isset($_POST['dc_escapular'])):
  $Avaliacao->setDc_Escapular($_POST['dc_escapular']);
  //echo"DC.Escapular {$Avaliacao->getDc_Escapular()}<br>";
endif;

if(isset($_POST['dc_supra_iliaca'])):
   $Avaliacao->setDc_Supra_Iliaca($_POST['dc_supra_iliaca']);
//echo"DC.Supra Iliaca {$Avaliacao->getDc_Supra_Iliaca()}<br>";
endif;

if(isset($_POST['dc_abdominal'])):
  $Avaliacao->setDc_Abdominal($_POST['dc_abdominal']);
   //echo"DC.Abdominal {$Avaliacao->getDc_Abdominal()}<br>";
endif;

if(isset($_POST['dc_axilar'])):
  $Avaliacao->setDc_Axilar($_POST['dc_axilar']);
    //echo"DC.Axilar {$Avaliacao->getDc_Axilar()}<br>";
endif;

///
if(isset($_POST['dc_peitoral'])):
  $Avaliacao->setDc_Peitoral($_POST['dc_peitoral']);
//echo"DC.Peitoral {$Avaliacao->getDc_Peitoral()}<br>";
endif;

if(isset($_POST['dc_coxa'])):
  $Avaliacao->setDc_Coxa($_POST['dc_coxa']);
//echo"DC.Coxa {$Avaliacao->getDc_Coxa()}<br>";
endif;


if(isset($_POST['id_avaliacao'])):
    $Avaliacao->setId_Avaliacao(intval($_POST['id_avaliacao']));
    //echo"Id Avaliacao {$Avaliacao->getId_Avaliacao()}<br>";
endif;
    if($Avaliacao->getId_Avaliacao()>=1):
        $AtualizarAval->AtualizarAvaliacao($Avaliacao);
        if($AtualizarAval->getResultado()):
            echo $AtualizarAval->getResultado();
        else:
            echo 0;
        endif;
        
        //header("Location: Avaliacoes.php?cod_aval={$Avaliacao->getId_Avaliacao()}&idpac={$Avaliacao->getId_Pessoa()}");
        
    elseif($Avaliacao->getId_Avaliacao()<1):
        $avaliacaoCad->CadAvalAntropometrica($Avaliacao);
        if($avaliacaoCad->getUltimaId()):
            echo $avaliacaoCad->getRegistroPagamentos();
        else:
            echo 0;
        endif;
        
        //header("Location: Avaliacoes.php?idpac={$Avaliacao->getId_Pessoa()}&idpg={$avaliacaoCad->getRegistroPagamentos()}");
        //echo"Legal<br>";
       // var_dump($avaliacaoCad->CadAvalAntropometrica($Avaliacao));
    endif;

    






