<!DOCTYPE html>
<?php 
require_once './controle.php';
?>
<html lang="pt-br">
    
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
    <head>
        <script type="text/javascript" src="Script/validaCamposPaciente.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <script type="text/javascript" src="Script/Js.js"></script>
        <title>Cadastrar Paciente</title>
    </head>
    <body>
      
        <div class="divPagina">
            
            <div class="tdtitulo">
                <h2><?php echo $DescPagina ?></h2>
            </div>
                    
            <div class="formCadastro">
            <form name="cadastrarPaciente" action="dadosPaciente.php" method="POST" onsubmit="return validacao();">
            <table border="0">
            <input type="hidden" name="id_paciente" value="<?php echo $pacienteDao->getId_Pessoa() ?>"/>                           
            <tr>
                <th>Nome:</th>
                <td colspan="4"><input type="text" name="nome" value="<?php echo $pacienteDao->getNome() ?>"/></td>
            </tr>
                            
            <tr>
                <td colspan="5"></td>
            </tr>
                            
            <tr>
                <th>Sexo:</th>
            <?php
            if($pacienteDao):
                if($pacienteDao->getSexo()=='M'):
                    echo"<td id='tdRadio'>Masculino</td> <td id='tdRadio'><input type='radio' name='sexo' value='1' id='inputRadio' checked='true'/></td>";
                    echo"<td id='tdRadio'>Feminino</td> <td id='tdRadio'><input type='radio' name='sexo' value='2' id='inputRadio'/></td>";
                                    
                elseif($pacienteDao->getSexo()=='F'):
                    echo"<td id='tdRadio'>Masculino</td> <td id='tdRadio'><input type='radio' name='sexo' value='1' id='inputRadio'/></td>";
                    echo"<td id='tdRadio'>Feminino</td> <td id='tdRadio'><input type='radio' name='sexo' value='2' id='inputRadio' checked='true'/></td>";
                else:
                    echo "<td id='tdRadio'>Masculino</td> <td id='tdRadio'><input type='radio' name='sexo' value='1' id='inputRadio'/></td>";
                    echo "<td id='tdRadio'>Feminino</td> <td id='tdRadio'><input type='radio' name='sexo' value='2' id='inputRadio'/></td>";
                endif;
            else:
                echo "<td id='tdRadio'>Masculino</td> <td id='tdRadio'><input type='radio' name='sexo' value='1' id='inputRadio'/></td>";
                echo "<td id='tdRadio'>Feminino</td> <td id='tdRadio'><input type='radio' name='sexo' value='2' id='inputRadio'/></td>";
            endif;
            ?>
            </tr>
                            
            <tr>
                <td colspan="5"></td>
            </tr>
                            
            <tr>
                <th>Nascimento:</th>
                <td colspan="4"><input type="date" name="nascimento" value="<?php echo $pacienteDao->getData_Nascimento() ?>"/></td>
            </tr>
                            
            <tr>
                <td colspan="5"></td>
            </tr>
                           
            <tr>
                <th>Profissão:</th>
                <td colspan="4"><input type="text" name="profissao" value="<?php echo $pacienteDao->getProfissao() ?>"/></td>
            </tr>
                            
            <tr>
                <td colspan="5"></td>
            </tr>
                            
            <tr>
                <th>E_Mail:</th>
                <td colspan="4"><input type="text" name="email" value="<?php echo $pacienteDao->getEmail() ?>"/></td>
            </tr>
                    
            <tr>
                <td colspan="5"></td>
            </tr>
                            
            <tr>
                <th>Telefone:</th>
                <td colspan="4"><input type="text" name="telefone" value="<?php echo $pacienteDao->getTelefone() ?>"/></td>
            </tr>
                            
            <tr>
                <td colspan="5"></td>
            </tr>
            
            </table>
                    
            <div class="divBotaoCadPac">
            <?php
            if($BotaoAcao=='Editar'):
                echo"<button Onclick='return ConfirmEdit();' type='submit' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/>{$BotaoAcao}</button>";
            ?>
            <script>
                function ConfirmEdit(){
                    var x = confirm("Deseja realmente confirmar as alterações deste Paciente ?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
            <?php
            else:
                echo"<button id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/> {$BotaoAcao} </button>";
            endif;
            ?>         
            </div>
                        
            </form>
                    
            <div class="divBotaoCancPac">
            <?php
            if($pacienteDao->getId_Pessoa()<1):
                echo "<a href='dadosPacientes.php'><button  id='botoes'><img src='imagens/cancel.png' width='20' height='20'> Cancelar</button></a>"; 
            else:
                echo "<a href='dadosPacientes1.php?idpac={$pacienteDao->getId_Pessoa()}'><button  id='botoes'><img src='imagens/cancel.png' width='20' height='20'> Cancelar</button></a>";
            endif;
            ?>
            </div>
            <?php
            if($paciente->getId_Pessoa()):
                echo"<div class='divBotaoExPac'>";
                echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                    ."<input type='hidden' name='ex_idpac' value='{$pacienteDao->getId_Pessoa()}'/>"
                    ."<input type='hidden' name='tipoexc' value='1'/>"
                    . "<button Onclick='return ConfirmDelete();' type='submit' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                    ."</form>";
            ?>
            <script>
            function ConfirmDelete(){
                var x = confirm("Deseja realmente deletar esse Paciente ?");
                    if (x)
                        return true;
                    else
                        return false;
            }
            </script>
            </div>
                    
            <?php
            endif;
            ?>
            </div>
         </div>
    </body>
</html>
