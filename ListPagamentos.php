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
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>
        <div class="divPagina">
            
            <div class="titcadPag"> <h2> Pagamentos </h2> </div>
            
            <div class="divcontlistapag">
                <table>
                <?php
                    $PagDao = new Pagamentos();
                    $PagDao->listaParcialPg($pagamentos, 2);
               
                ?>   
                </table>
            </div>
        </div>
        
    </body>
</html>
