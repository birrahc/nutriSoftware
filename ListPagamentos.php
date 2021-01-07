<!DOCTYPE html>
<?php
require_once './controle.php';

require './_app/config.inc.php';

if(isset($_GET['idpac'])):
    $pagamentos = new Pagamentos();
    $pagamentos->setId_Pessoa($_GET['idpac']);
else:
 echo"Você não possui nenhuma avaliação cadastrada <a href='dadosPacientes.php'>Sair </a>";   
endif;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/stylo.css">
        <script src="css/jquery-3.5.1.min.js"></script>
        <script src="css/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 bdr-20 pt-2 pb-2 bds-1 bcAzulMar">
                    <div class="col-12 bg-secondary p-1 bdr-5">
                        <h5 class="text-center text-light p-0 m-0">Pagamentos: <b><?php //echo $pacientedao->getNome() ?></b></h5>
                    </div>
                    <div class="conteudoCad">
                    <?php
                    $PagDao = new Pagamentos();
                    $PagDao->listaParcialPg($pagamentos, 2);
                    ?>   
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
