<?php

require('./_app/config.inc.php');
$log = new Login();
$logDao = new loginDao();

if(isset($_POST['login'])):
   $log->setNome($_POST['login']); 
endif;

if(isset($_POST['senha'])):
   $log->setSenha($_POST['senha']); 
endif;
$logDao->Logar($log);

if($logDao->getExisteUsuario()){
	$logDao->setDestino("pacientes.php");
	session_start();
	$_SESSION["usuario"]=$log->getNome();
	$_SESSION["permissao"]=$logDao->getPermissaoDao();
}else{
	$logDao->setDestino("index.php");
	}
        
header("location: ". $logDao->getDestino());


