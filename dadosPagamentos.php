<?php
require_once './controle.php';

require ('./_app/config.inc.php');

$pagamentos = new Pagamentos();
$cadPagamentos = new AtualizaDados();

if(isset($_POST['id_paciente'])):
    $id=$_POST['id_paciente'];
endif;

if(isset($_POST['id_pgt'])):
    $pagamentos->setId_Pagamento($_POST['id_pgt']);
endif;

if(isset($_POST['data_pagamento'])):
  $pagamentos->setData_Consulta($_POST['data_pagamento']);  
endif;

if(isset($_POST['referencia'])):
   $pagamentos->setReferencia($_POST['referencia']); 
endif;

if(isset($_POST['local_atendimento'])):
    $pagamentos->setLocal_Atendimento($_POST['local_atendimento']);
endif;

if(isset($_POST['tipo'])):
    $pagamentos->setTipo($_POST['tipo']);
endif;

if(isset($_POST['plano'])):
    $pagamentos->setPlano($_POST['plano']);
endif;

if(isset($_POST['valor'])):
    $pagamentos->setValor($_POST['valor']);
endif;

if(isset($_POST['qtd_vezes'])):
    $pagamentos->setQtd_vezes($_POST['qtd_vezes']);
endif;

if(isset($_POST['situacao'])):
    $pagamentos->setSituacao($_POST['situacao']);
endif;

if(isset($_POST['observacao'])):
    $pagamentos->setObservacao($_POST['observacao']);
endif;

if($pagamentos->getId_Pagamento()>=1):
    $cadPagamentos->AtualizarPagamentos($pagamentos);
    header("Location: ListPagamentos.php?idpac={$id}#Avaliacao");
else:
   echo"<script> alert('Não foi possivel cadastrar');</script>";
endif;


