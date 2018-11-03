<!DOCTYPE html>

<html lang="pt-br">

<?php
    require('./_app/config.inc.php');
    
    $Avalicao = new AvaliacaoDao();
    $AvaliacaoAnt=new AvaliacaoAntrometrica;
    
    if(isset($_GET['idval'])){
        $AvaliacaoAnt->setId_Avaliacao($_GET['idval']);
    }
    
    
?>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        
        <meta charset="UTF-8">
        <title></title>
    </head>
           
    <body>
       
       <div class="divPaginaAvaliacao">
        
           <div class="tdtitulo">
                <h2>Avaliação</h2>
           </div>
           
           <div class="divConteudoAvaliUp">
                <div class="divAvaliacaoUp">
                    <form name="atualizarAvaliacao" action="#" method="POST">
                    <table>
                        <?php
                            $Avalicao->AvalEspecifica($AvaliacaoAnt->getId_Avaliacao());
                        ?>
                        <tr>
                            <td colspan="2">
                                <button type="submit" onclick="atualizarAvaliacao" id="botoes"><img src="imagens/simboloCadastrar.png" width="20" height="20"/> Atualizar</button>
                                <button  id="botoes"><a href="dadosPacientes.php?idpac=0"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</a></button>
                                <button  id="botoes"><a href="dados.php?idpac=0"><img src="imagens/lixeira2.png" width="20" height="20"/> Excluir</a></button>
                            </td>
                        </tr>
                    </table>
                   </form>
                </div>
            </div>  
        </div>
    </body>
</html>
