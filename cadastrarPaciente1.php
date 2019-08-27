<!DOCTYPE html>
<?php
require('./_app/config.inc.php');

$DescPagina="Cadastro de Paciente";
$BotaoAcao="Cadastrar";

$paciente=new PacienteMold();
$pacienteDao = new PacienteMold();
        
if(isset($_GET['paciente'])):
    isset($_GET['paciente']);
    if($_GET['paciente']>=1):
        $paciente->setId_Pessoa($_GET['paciente']);
        $pacienteDao->dadosPacientes($paciente,3); 
               
        $DescPagina="Editar Paciente";
        $BotaoAcao="Editar";
    endif;
endif;
       
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="css/small.css"/>
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="css/medium.css"/>
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1350px)" href="css/large.css"/>
        <title></title>
    </head>
    <body>
       <div class="responsive-pag">

            <div class="conteudo-centro">
                <h2>Titulo</h2> 
                <div class="interno-camada-2">
                    
                    <div class="interno-centro">
                        <form>
                        <div class="conteudo-cad-paciente">
                            <table border="0">
                                <tr>
                                    <th><h4>Nome:</h4></th>
                                    <td><input type="text" name="nome" value="#" id="campo"></td>
                                </tr>
                                <tr>
                                    <th><h4>Sexo:</h4></th>
                                    <?php
                                    if($pacienteDao):
                                        if($pacienteDao->getSexo()=='M'):
                                            echo"<td>"
                                            . "<p style=' margin-left:30px; font-size:18px;'>Masculino <input type='radio' name='sexo' value='1' id='inputRadio' checked='true'/>"
                                            . "Feminino <input type='radio' name='sexo' value='2' id='inputRadio'/></p>"
                                            . "</td>";
                                        elseif($pacienteDao->getSexo()=='F'):
                                            echo"<td>"
                                            . "<p style=' margin-left:30px; font-size:18px;'>Masculino <input type='radio' name='sexo' value='1' id='inputRadio'/>"
                                            . "Feminino <input type='radio' name='sexo' value='2' id='inputRadio' checked='true'/></p>"
                                            . "</td>";
                                        else:
                                            echo "<td>"
                                            . "<p style=' margin-left:30px; font-size:18px;'>Masculino  <input type='radio' name='sexo' value='1' id='inputRadio'/> | "
                                            . " Feminino   <input type='radio' name='sexo' value='2' id='inputRadio'/></p>"
                                            . "</td>";
                                        endif;
                                    else:
                                        echo "<td>"
                                        . "<p style=' margin-left:30px; font-size:18px;'>Masculino <br/> <input type='radio' name='sexo' value='1' id='inputRadio'/>"
                                        . "Feminino <br/> <input type='radio' name='sexo' value='2' id='inputRadio'/>"
                                        . "</td></p>";
                                    endif;
                                    ?>
                                </tr>
                                
                                <tr>
                                    <th>Nascimento:</th>
                                    <td colspan="2"><input type="date" name="nascimento" value="<?php //echo $pacienteDao->getData_Nascimento() ?>" id="campodata" /></td>
                                </tr>
                                <tr>
                                    <th>Altura:</th>
                                    <td><input type="text" name="altura" value="<?php //echo $pacienteDao->getAltura() ?>" id="campodata"/></td>
                                </tr>
                                <tr>
                                    <th><h4>Profissão</h4></th>
                                    <td><input type="text" name="profissao" value="#" id="campo"/></td>
                                </tr>
                                <tr>
                                    <th><h4>E-Mail</h4></th>
                                    <td><input type="text" name="email" value="#" id="campo"/></td>
                                </tr>
                                <tr>
                                    <th><h4>Telefone</h4></th>
                                    <td><input type="text" name="telefone" value="#" id="campo"/></td>
                                </tr>
                                
                            </table>
                        </div>
                            <div class="botaoCadPaciente"><button type="submit"> Cadastrar</button></div>
                        </form>
                        <div class="botaoCancPaciente"><button>Cancelar</button></div>
                        
                        <div class="botaoDelPaciente"><button>Excluir</button></div>
                    </div>
                </div>

                <p id="menu-interno">
                    <a href="#">Cadastrar Avaliação</a> |
                    <a href="#">Visualizar</a> |
                    <a href="#">Dados Pessoais</a> |
                    <a href="#">Avaliação</a> |
                    <a href="#">Anminese</a> |
                    <a href="#">Consumos</a>

                </p>
            </div>
            
        </div>
    </body>
</html>
