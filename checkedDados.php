<?php

require('./_app/config.inc.php');

$paciente = new PacienteMold();

$check = new verificaDados();

if(isset($_GET['cpf'])){
    $paciente->setCpf($_GET['cpf']);
   //echo $paciente->getCpf();
   $check->checkedCpf($paciente);
   
}
elseif(isset($_GET['email'])){
    $paciente->setEmail($_GET['email']);
    $check->checkedEmail($paciente);
}
