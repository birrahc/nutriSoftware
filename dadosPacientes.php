<!DOCTYPE html>
<?php 
    require_once './controle.php';
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
        
        <div class="menus"> <!-- Menus -->
           <?php
               require 'menu.php';
           ?>
        </div> <!-- Fecha Menus -->
        
        <div class="divPagina"> <!-- div para lista de pacientes e paciente Detalhado -->
            
            <div class="divContudo" id="paciente">
            <table border="0" width="768">
            <tr>
                <td>
                    <div class="titulocont">
                    <form name="pesquisarPaciente" action="#" method="POST"> <!-- Formulario de pesquisa Paciente-->
                        
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
                        
                    <div class="divlistpacientes"> <!-- div lista Pacientes -->
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
                    if(isset($_GET['idpac'])):
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
                            //var_dump($pacDao->dadosPacientes($paciente,2))
                        ?>
                            <tr>
                                <td>
                                    
                                    <a href='#Avaliacao'>Avaliação</a> | 
                                    <a href='#Anminese'>Anminese</a> | 
                                    <a href='#Consumos'>Consumos</a> | 
                                    <hr>
                                    <a href="cadastrarPaciente.php?paciente=<?php echo $pacDao->getId_Pessoa() ?>">Editar</a> | 
                                    <a href="ListPagamentos.php?idpac=<?php echo $pacDao->getId_Pessoa() ?>">Pagamentos</a> |
                                    
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
        
        <!-- Div Avaliacao -->
    <?php  if(isset($_GET['idpac'])): ?>    
        <div class="divPaginaAvaliacao" id="Avaliacao">
            <div class="tdtitulo">
                <h2>Avaliação</h2>
            </div>
            
            <?php
                $Avalicao->setId_Pessoa($_GET['idpac']);
                $AvaliacaoDao->ListaAvaliacao($Avalicao, null);
                if($AvaliacaoDao->getNome()):
            ?>
            
            <div class="PacAvaliacao">
            <?php
                echo"Paciente: <b>{$AvaliacaoDao->getNome()}</b>  <b>|</b>  Idade: <b>{$AvaliacaoDao->getIdade()} anos</b>"; 
            ?>
            </div>
			
            <div class="contAvaliacao">
                <table border='0'>
                <tr>
                    <td>
			<div class="divconteudoprint">
                            <table border="0">
                            <tr>
				<td width="150"><b>Avaliações</b></td>
                            </tr>
                            
                            <tr>
				<td><b>Data:</b></td>
                            </tr>
                            
                            <tr>
				<td><b>Peso</b></td>
                            </tr>
                            
                            <tr>
				<td></td>
                            </tr>
                            
                            <tr>
				<td><b>C.cintura</b></td>
                            </tr>
                            
                            <tr>
                                <td><b>C.Abdominal</b></td>
                            </tr>
                            
                            <tr>
				<td><b>C.Quadril</b></td>
                            </tr>
                            
                            <tr>
				<td><b>C.Peito</b></td>
                            </tr>
                            
                            <tr>
				<td><b>C.Braço D</b></td>
                            </tr>
                            
                            <tr>
				<td><b>C.Braço E</b></td>
                            </tr>
								
                            <tr>
				<td><b>C.Coxa D</b></td>
                            </tr>
                            
                            <tr>
				<td><b>C.Coxa E</b></td>
                            </tr>
			
                            <tr>
                                <td><b></h5></b>		
                            </tr>
								
                            <tr>
				<td><b>DC Triceps</b></td>
                            </tr>
				
                            <tr>
				<td><b>DC Escapular</b></td>
                            </tr>
								
                            <tr>
				<td><b>DC Supra Iliaca</b></td>
                            </tr>
								
                            <tr>
				<td><b>DC Abdominal</b></td>
                            </tr>
			
                            <tr>
				<td><b>DC Axilar</b></td>
                            </tr>
								
                            <tr>
				<td><b>DC Peitoral</b></td>
                            </tr>
								
                            <tr>
				<td><b>DC Coxa</b></td>
                            </tr>
				
                            <tr>
                                <td><b>% Gordura</b></td>
                            </tr>
                            
                            <tr>
				<td><b>M.Muscular</b></td>
                            </tr>
				
                            <tr>
				<td><b>Gordura</b></td>
                            </tr>  
										 
                            </table>
							
			</div>
                    </td>
				
                    <td>
						
			<div class="divprintavaliacao">
			<?php
                        if($Avalicao->getId_Pessoa()):
                            $AvaliacaoDao->ListaAvaliacao($Avalicao,1);
			endif;
			?>
			</div>
						
                    </td>
		</tr>
		</table>
            </div>
			
            <div class="linkAval">
                <a href='cadastrarAvaliacao.php?idpac=<?php echo $Avalicao->getId_Pessoa()?>'> Cadastrar Avaliação</a> | 
                    <a href='printAvaliacao.php?paciente=<?php echo $Avalicao->getId_Pessoa()?>'> Visualizar</a> | 
                    <a href='#paciente'>Paciente</a> | 
                    <a href='#Anminese'>Anminese</a> | 
                    <a href='#Consumos'>Consumos</a> |
                    <a href='#graf-perc'>Grafico</a> 
                    
            </div>
            
        </div>
        
        <div class="divimg"></div>
        
        <?php
        else:
       
        echo"<div class='linkAval'>
                Nenhuma Avaliação cadastrada <br/>
                <a href='cadastrarAvaliacao.php?idpac={$Avalicao->getId_Pessoa()}'> Cadastrar Avaliação</a> | 
                <a href='#paciente'>Paciente</a> | 
                <a href='#Anminese'>Anminese</a> | 
                <a href='#Consumos'>Consumos</a>
            </div>";
        endif;
    endif;
    
    $anminese->setId_Pessoa($paciente->getId_Pessoa());
    $AnmiseDao->ListaAnminese($anminese,0);
    
    if($AnmiseDao->getId_Pessoa()):
    ?>
		
    <div class="divPagina" id="Anminese">
        <div class="divContudo" >
                
            <div class="titAnminese">
                    <h2> Anminese </h2>
            </div>
                
            <div class="divAnminese" id="Anminese">
            <table>
            <?php
            $anminese->setId_Pessoa($paciente->getId_Pessoa());
            $AnmiseDao->ListaAnminese($anminese,1);
                
            echo"<tr>"
                . "<td colspan='2'>";
                    if($AnmiseDao->getId_Anminese()):
                        echo"<a href='cadastrarAnminese.php?cod_anminese={$AnmiseDao->getId_Anminese()}&idpac={$AnmiseDao->getId_Pessoa()}'/>Editar</a> | ";
                    else:
                        echo "<a href='cadastrarAnminese.php?idpac={$anminese->getId_Pessoa()}'/>Cadastar</a> | ";
                    endif;
                    echo"<a href='#paciente'>Paciente</a> | "
                      . "<a href='#Avaliacao'>Avaliação</a> | "
                      . "<a href='#Consumos'>Consumos</a>"
                    . "</td>"
              . "</tr>";
            ?>
            </table>
            </div>
            
        </div>
            
    </div>
    
    <div class="divimg"></div>
    
    <?php
    else:
        echo"<div id='Anminese'>"
            . "<p align='center'> Anminese não cadastrada para este Paciente. Cadastrar : <a href='cadastrarAnminese.php?idpac={$anminese->getId_Pessoa()}'/>Cadastar</a> </p>"
          . "</div>";
    endif;
    
    $consumos->setId_Pessoa($paciente->getId_Pessoa());
    $ConsumosDao->ListaConsumos($consumos,0);
    
    if($ConsumosDao->getId_Pessoa()):
    ?>
        <div class="divPagina" id="Consumos">
            <div class="divContudo" id="Consumos">
                
                <div class="titAnminese">
                    <h2> Consumos </h2>
                </div>
                
                <div class="divAnminese" id="Consumos">
                <table>
                <?php
                $consumos->setId_Pessoa($paciente->getId_Pessoa());
                $ConsumosDao->ListaConsumos($consumos,1);
                
                echo"<tr>"
                    . "<td colspan='2'>";
                        if($ConsumosDao->getId_Consumos()):
                            echo"<a href='cadastrarConsumos.php?cod_consumos={$ConsumosDao->getId_Consumos()}&idpac={$ConsumosDao->getId_Pessoa()}'/>Editar</a> | ";
                        else:
                            echo "<a href='cadastrarConsumos.php?idpac={$consumos->getId_Pessoa()}'/>Cadastar</a> | ";
                        endif;
                    echo"<a href='#paciente'>Paciente</a> | "
                      . "<a href='#Avaliacao'>Avaliação</a> | "
                      . "<a href='#Anminese'>Anminese</a>"
                    . "</td>"
                  . "</tr>";
                
                ?>
                </table>
                </div>
            </div>
            
        </div> 
        
    <?php
    else:
        echo"<div id='Consumos'>"
            . "<p align='center'> Consumo não cadastrado para este Paciente: <a href='cadastrarConsumos.php?idpac={$consumos->getId_Pessoa()}'/>Cadastar</a></p>"
          . "</div>";
    endif;
    ?>
    </body>
</html>
