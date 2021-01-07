<!DOCTYPE html>
<?php
require_once './controle.php';

require('./_app/config.inc.php');
$tipo = new TipoConsulta();
$plano = new Planos();
$situacao = new Status();
$local = new Local_Atendimento();

if( isset($_GET['idpg']) && isset($_GET['idpac'])):
    $Pagamentos = new Pagamentos();
    $Pagamentos->setId_Pessoa($_GET['idpac']);
    $Pagamentos->setId_Pagamento($_GET['idpg']);
    
    $PagDao = new Pagamentos();
    
    
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
            <div class="titcadPag"> <h2> Cadastro Pagamentos </h2> </div>
            
            <div class="divcontPag">
            <form action="dadosPagamentos.php" method="POST">
            <table border="0">
            <tr>
            <?php 
               $PagDao->listaParcialPg($Pagamentos,1);
                echo"<input type='text' name='id_pgt' value='{$PagDao->getId_Pagamento()}'/>";
                echo"<input type='hidden' name='id_paciente' value='{$PagDao->getId_Pessoa()}'/>";
                
            ?>   
            </tr>
            <tr>
                
                <td>
                    Local de Atendimento:<br/>
                    <select name="local_atendimento">
                    <?php
                    $local->listaLocal();
                    ?>   
                    </select>
                </td>
            
                <td>
                Tipo:<br/>
                <select name="tipo">
                <?php
                $tipo->listaTipo();
                ?> 
                </select>
                </td>
                
                <td>
                Plano: <br/>
                <select name="plano">
                <?php
                $plano->listaPlanos();
                ?>  
                </select>
                </td>
            </tr>
            
            <tr>
                <td> Valor: <br/> <input type="text" name="valor" value="<?php// echo $PagDao->getValor() ?>"/> </td>
                <td> Qtd Parcelas: <br/> <input type="text" name="qtd_vezes" value="<?php// echo $PagDao->getQtd_vezes() ?>"/> </td>
          
                <td 
                    Situação<br/>
                    <select name="situacao">
                    <?php
                    $situacao->listaStatus();
                    ?>    
                    </select>
                </td>
            
            </tr>
            <tr>
                <td colspan="3"> Observação<br/> <textarea name="observacao"> <?php echo $PagDao->getObservacao() ?></textarea> </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Cadastrar"/></td>
            </tr>
            
            </table>
                
            </form>
            </div>
        </div>
        
    </body>
</html>
