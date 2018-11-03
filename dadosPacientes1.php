<!DOCTYPE html>
<?php 
    //require_once './controle.php';
?>

<html lang="pt-br">
    
    <?php
    require('./_app/config.inc.php');
    
    $paciente= new PacienteMold();
    $pacDao= new PacienteMold();
    $anminese=new AnmineseMold();
    $AnmiseDao = new AnmineseMold();
    $consumos = new ConsumosMold();
    $ConsumosDao = new ConsumosMold();
    $Avalicao = new AvaliacaoMold();
    $AvaliacaoDao = new AvaliacaoMold();
    
    if(isset($_POST['pesquisar'])):
        isset($_POST['pesquisar']);
    $paciente->setNome($_POST['pesquisar']);
    endif;
    
    if(isset($_GET['idpac'])):
        isset($_GET['idpac']);
        $paciente->setId_Pessoa($_GET['idpac']);
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
                            $pacDao->listaPaciente($paciente);
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
                            <table border='0'>
                                <tr>
                                    <td colspan="2"><h2>Dados Pessoais</h2></td>
                                </tr>
                            </table>
                        </div>
          
                        <div class="divPaciente">
                        <table border='0'>
                        <?php
                            $pacDao->dadosPacientes($paciente, 2);
                            
                        ?>
                            <tr>
                                <td>
                                    <a href="cadastrarPaciente.php?paciente=<?php echo $pacDao->getId_Pessoa() ?>">Editar</a> | 
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
        
        <div class="divPaginaAvaliacao" id="Avaliacao">
            <div class="tdtitulo">
                <h2>Avaliação</h2>
            </div>
            
            <div class="PacAvaliacao">
                
                <?php
                    echo"Paciente: <b>{$pacDao->getNome()}</b>  <b>|</b>  Idade: <b>{$pacDao->getIdade()} anos</b>";
                ?>
            </div>
            
            <div class="divContudoAvaliacao">
            <div class="divContudoAvaliacaotopic">
                <table border="0">
                    <tr>
                        <td><h5>Avaliações</h5></td>
                    <td rowspan="23" > 
                    <div>
                    <?php
                        $Avalicao->setId_Pessoa($paciente->getId_Pessoa());
                        $AvaliacaoDao->ListaAvaliacao($Avalicao,1);
                    ?>
                    </div>
                    </td>
                    </tr>
                    <tr>
                        <td><h5>Data:</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Peso</h5></td>
                    </tr>
                    <tr>
                        <td height='20'></td>
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
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                     
                </table>
            </div>
            
            
            
            </div>
            
            <div class="linkAval">
                <a href='cadastrarAvaliacao.php?idpac=<?php echo $Avalicao->getId_Pessoa()?>'> Cadastrar Avaliação</a>
            </div>
            
            <div class="divCalculo">
                <?php
                    //$Avalicao->ListaAvaliacao($paciente,11);
                ?>
            </div>
            <div class="divimg"></div>
        
        <?php
        if($_GET['idpac']):
        ?>
        
        <div class="divPagina">
          <div class="divContudo" id="Anminese">
            
                        <div class="divAnminese">
                        <table border='0'>
                            <tr>
                                <td><h1>Anminese</h1></td>
                            </tr>    
                        <?php
                            $anminese->setId_Pessoa($paciente->getId_Pessoa());
                            $AnmiseDao->ListaAnminese($anminese);
                            
                            echo"<tr>"
                                . "<td>";
                                if($AnmiseDao->getId_Anminese()):
                                    echo"<a href='cadastrarAnminese.php?cod_anminese={$AnmiseDao->getId_Anminese()}&idpac={$AnmiseDao->getId_Pessoa()}'/>Editar</a> | ";
                                else:
                                   echo "<a href='cadastrarAnminese.php?idpac={$anminese->getId_Pessoa()}'/>Cadastar</a> | ";
                                endif;
                                  
                                   echo"<a href='#paciente'>Paciente</a> |"
                                     . "<a href='#Avaliacao'>Avaliação</a>"
                                . "</td>"
                             . "</tr>";
                        ?>
                        
                        </table>
                        </div>
          </div>
            
        </div> 
        
        <div class="divimg"></div>
        
        <div class="divPagina">
            <div class="divContudo" id="Anminese">
            
                <div class="divConsumos">
                    <table border='1'>
                    <?php
                        $consumos->setId_Pessoa($paciente->getId_Pessoa());
                        $ConsumosDao->ListaConsumos($consumos, 1);
                            
                            echo"<tr>"
                            . "<td>";
                            if($ConsumosDao->getId_Consumos()):
                               echo "<a href='cadastrarConsumos.php?cod_consumos={$ConsumosDao->getId_Consumos()}&idpac={$ConsumosDao->getId_Pessoa()}'>Editar</a> | ";
                            else:
                                echo"<a href='cadastrarConsumos.php?idpac={$consumos->getId_Pessoa()}'>Cadastrar</a> | ";
                            endif;
                            
                            echo"<a href='#paciente'>Paciente</a> | "
                            . "<a href='#Avaliacao'>Avaliação</a>"
                            . "</td>"
                     .      "</tr>";
                            ?>
                            </table>
                        </div>
                </div>
       // </div>
        </div>
        
        <?php
        endif;
        ?>
    </body>
</html>
