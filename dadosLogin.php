<?php

require('./_app/config.inc.php');

$Login = new Login();
$LoginDao = new Cadastro();
$destino='';
$cad='';
if(isset($_POST['autorizacao'])):
    if($_POST['autorizacao'] =='cadlog2019'):
        
        if(isset($_POST['login'])):
          if(!empty($_POST['login'])):
               $Login->setNome($_POST['login']);

                if(isset($_POST['senha'])):
                    if(!empty($_POST['senha'])):
                        $Login->setSenha($_POST['senha']);

                        if(isset($_POST['repsenha'])):
                            $Login->setRepeteSenha($_POST['repsenha']);
                            if($Login->getSenha() == $Login->getRepeteSenha()):
                                $LoginDao->CadastrarLogin($Login);
                                echo"Cadastrado com Sucesso!";
                                $destino = 'index.php';
                                $cad="ok";
                            else:
                                $mensagem="O campo senha esta diferente do campo Repete Senha!";
                                $destino = 'cadastrarLogin.php';
                                $cad="dif";
                            endif;
                        elseif(!empty($_POST['repsenha']) || $_POST['repsenha']=='' ):
                            $mensagem="O campo Repete Senha está nulo ou vazio!";
                            $destino = 'cadastrarLogin.php';
                            $cad="reppassnull";
                        endif;

                    else:
                         $mensagem="O campo senha esta Vazio ou nulo!'";
                         $destino = 'cadastrarLogin.php';
                         $cad="passnull";
                   endif;
                endif;
            else:
                $cad="lognull";
                $destino = 'cadastrarLogin.php';
                $mensagem="O campo Usuario esta Vazio ou nulo!";
         endif;
         
         else:
            $destino = 'cadastrarLogin.php';
            $cad="lognull";
        endif;
        
        else:
            $destino = 'cadastrarLogin.php';
            $mensagem="Autorização nula ou não valida";
            $cad="auto";
    endif;

endif;
header("Location: {$destino}?cad={$cad}");