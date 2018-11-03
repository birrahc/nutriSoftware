<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>

<html lang="pt-br">
    
    <?php
    require('./_app/config.inc.php');
    
    $paciente= new Paciente();
    $pacDao= new PacienteDao();
    $AnmiseDao = new AnmineseDao();
    $ConsumosDao = new ConsumoDao();
    $Avalicao = new AvaliacaoDao();
    
    if(isset($_POST['pesquisar'])):
        isset($_POST['pesquisar']);
    $paciente->setNome($_POST['pesquisar']);
    endif;
    
    if(isset($_GET['idpac'])):
        isset($_GET['idpac']);
        $paciente->setIdPessoa($_GET['idpac']);
    endif;
        
    ?>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    
    <body>
        
        <div class="menus">
           <?php
               require 'menu.php';
           ?>
        </div>
        
        <div class="divPagina">
            
            <div class="divContudo" id="paciente">
            <table border="0" width="768">
                <tr>
                    <td>
                        
                        <div class="titulocont">
                         <form name="pesquisarPaciente" action="#" method="POST">    
                            <table border='0'>
                                <tr>
                                    <td colspan="2"><h2>Pacientes</h2></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" name="pesquisar"/> </td>
                                    <td> <button type="submit" onclick="pesquisarPaciente" id="botoes"><img src="imagens/lupa.png" width="20" height="20"/> Procurar </button></td>
                                </tr>
                            </table>
                        </form>    
                        </div>
                        
                        <div class="divlistpacientes">
                        <?php
                            $pacDao->ListaPacientes($paciente);
                        ?>
                        </div>
                        
                        <div class="divlinkcadpac">
                            <a href="cadastrarPaciente.php">Cadastrar Paciente</a>
                        </div>
                        
                    </td>
                  
                    <td>
                    <?php
                    if($_GET['idpac']):
                    ?>   
                        <div class="titulocont">
                            <table>
                                <tr>
                                    <td colspan="2"><h2>Dados Pessoais</h2></td>
                                </tr>
                            </table>
                        </div>
          
                        <div class="divPaciente">
                        <table>
                        <?php
                            $pacDao->SelectDadosPaciente($_GET['idpac'],2);
                        ?>
                            <tr>
                                <td>
                                    <a href="cadastrarPaciente.php?paciente=<?php echo $pacDao->getId_paciente() ?>">Editar</a> | 
                                    <a href='#Anminese'>Anminese</a> | 
                                    <a href='#Avaliacao'>Avaliação</a>
                                </td>
                            </tr>
                
                        </table>
                        </div>
                        
                    <?php
                    endif;
                    ?>
                        
                    </td>
                </tr>
            </table>
            </div>
          
        </div>
       
        <div class="divimg"></div>
        
        <?php
        if($_GET['idpac']):
        ?>
        
        <div class="divPagina">
            <div class="divContudo" id="Anminese">
            <table border="0" width="768">
                <tr>
                    <td>
                        
                        <div class="titulocont"> 
                        <table border='0'>
                            <tr>
                                <td colspan="2"><h2>Anminese</h2></td>
                            </tr>
                        </table>
                        </div>
                        
                        <div class="divAnminese">
                        <table>
                        <?php
                            $AnmiseDao->ListaAnminese($_GET['idpac'],2);
                            echo"<tr>"
                                . "<td>";
                                if($AnmiseDao->getId_Anminese()):
                                    echo"<a href='cadastrarAnminese.php?cod_anminese={$AnmiseDao->getId_Anminese()}&idpac={$_GET['idpac']}'/>Editar</a> | ";
                                else:
                                   echo "<a href='cadastrarAnminese.php?idpac={$_GET['idpac']}'/>Cadastar</a> | ";
                                endif;
                                   
                                   echo"<a href='#paciente'>Paciente</a> |"
                                   . "<a href='#Avaliacao'>Avaliação</a>"
                                . "</td>"
                             . "</tr>";
                        ?>
                        
                        </table>
                        </div>
                        
                    </td>
                    
                    <td>
                        
                        <div class="titulocont">
                            <table>
                            <tr>
                                <td colspan="2"><h2>Consumos</h2></td>
                            </tr>
                            </table>
                        </div>
                        
                        <div class="divConsumos">
                            <table>
                            <?php
                               $ConsumosDao->ListaConsumos($_GET['idpac'],2);
                            
                            echo"<tr>"
                            . "<td>";
                            if($ConsumosDao->getId_Consumos()):
                               echo "<a href='cadastrarConsumos.php?cod_consumos={$ConsumosDao->getId_Consumos()}&idpac={$_GET['idpac']}'>Editar</a> | ";
                            else:
                                echo"<a href='cadastrarConsumos.php?idpac={$_GET['idpac']}'>Cadastrar</a> | ";
                            endif;
                            
                            echo"<a href='#paciente'>Paciente</a> | "
                            . "<a href='#Avaliacao'>Avaliação</a>"
                            . "</td>"
                     .      "</tr>";
                            ?>
                            </table>
                        </div>
                        
                    </td>
                </tr>
            </table>
            </div>
            
        </div>
        
        <div class="divimg"></div>
        
        <div class="divPaginaAvaliacao" id="Avaliacao">
            <div class="tdtitulo">
                <h2>Avaliação</h2>
            </div>
            
            <div class="PacAvaliacao">
            <?php
                $Avalicao->ListapacAval($_GET['idpac']);
            ?>
            </div>
            
            <div class="divContudoAvaliacao">
            <div class="divContudoAvaliacaotopic">
                <table>
                    <tr>
                        <td><h5>Avaliações</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Data:</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Peso</h5></td>
                    </tr>
                    <tr>
                        <td><h3></h3></td>
                    </tr>
                    <tr>
                        <td><h5>C.cintura</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Abdominal</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Quadril</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Peito</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Braço D</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Braço E</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Coxa D</h5></td>
                    </tr>
                    <tr>
                        <td><h5>C.Coxa E</h5></td>
                    </tr>
                    <tr>
                        <td><h3></h3></td>
                    </tr>
                    <tr>
                        <td><h5>DC Triceps</h5></td>
                    </tr>
                    <tr>
                        <td><h5>DC Escapular</h5></td>
                    </tr>
                    <tr>
                        <td><h5>DC Supra Iliaca</h5></td>
                    </tr>
                    <tr>
                        <td><h5>DC Abdominal</h5></td>
                    </tr>
                    <tr>
                        <td><h5>DC Axilar</h5></td>
                    </tr>
                    <tr>
                        <td><h5>DC Peitoral</h5></td>
                    </tr>
                     <tr>
                        <td><h5>DC Coxa</h5></td>
                    </tr>
                    <tr>
                        <td><h5>% Gordura</h5></td>
                    </tr>
                    <tr>
                        <td><h5>M.Muscular</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Gordura</h5></td>
                    </tr>
                     
                </table>
            </div>
            
            <div class="divContudoAvaliacaoCont">
                <?php
                    $Avalicao->ListaAvaliacao($_GET['idpac'],2);
                ?>
            </div>
            
            </div>
            
            <div class="linkAval">
                <a href='cadastrarAvaliacao.php?idpac=<?php echo $paciente->getIdPessoa()?>'> Cadastrar Avaliação</a>
            </div>
            
            <div class="divCalculo">
                <?php
                    $Avalicao->ListaAvaliacao($_GET['idpac'],11);
                ?>
            </div>
            
        </div>
        
        <?php
        endif;
        ?>
    </body>
</html>
