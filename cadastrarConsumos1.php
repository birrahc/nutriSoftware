<!DOCTYPE html>
<?php 
    //require_once './controle.php';
?>

<html lang="pt-br">
     <?php
    require('./_app/config.inc.php');
    $paciente= new Paciente1();
    $pacienteDao = new PacienteDao1();
    $anminese = new AnmineseDao();
    $Consumos = new Consumos();
    $ConsDao = new ConsumoDao();
    $local= new LocalAmoco();
    
    if(isset($_GET['idpac'])):
        $paciente->setIdPessoa($_GET['idpac']);
        $pacienteDao->dadosPacientes($paciente, 3);
    else:
        //header("location: cadastrarPaciente.php");
    endif;
     
    
    $DescPagina="Cadastro Consumos";
    $BotaoAcao="Cadastrar";
    
    if(isset($_GET['cod_consumos'])):
        isset($_GET['cod_consumos']);
        if($_GET['cod_consumos']>=1):
            $ConsDao->ListaConsumos($_GET['cod_consumos'], 3);
            $Consumos->setId_Consumos($_GET['cod_consumos']);
            $Consumos->setAgua($ConsDao->getAgua());
            $Consumos->setSucos($ConsDao->getSucos());
            $Consumos->setDurante_Refeicoes($ConsDao->getDurante_refeicoes());
            $Consumos->setAcucares($ConsDao->getAcucares());
            $Consumos->setSodio($ConsDao->getSodio());
            $Consumos->setRefrigerantes($ConsDao->getRefrigerantes());
            $Consumos->setCereais($ConsDao->getCereais());
            $Consumos->setFrutas($ConsDao->getFrutas());
            $Consumos->setVerduras($ConsDao->getVerduras());
            $Consumos->setLocal_Amoco($ConsDao->getLocal_Almoco());
            $Consumos->setPreferencias($ConsDao->getPreferencias());
            $Consumos->setAversao($ConsDao->getAversoes());
            
            $DescPagina="Editar Consumos";
            $BotaoAcao="Editar";
            
        endif;
    endif;
    
    
        
    ?>
    <head>
        <meta charset="UTF-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>
         
        <div class="divPagina">
            
            <div class="tdtitulo">
                <h2><?php echo $DescPagina ?></h2>
            </div> 
            <div class="divCadastroAnminese">
                    <form name="cadastrarConsumos" action="dadosConsumos.php" method="POST">
                        <table border="0">
                            <tr>
                                <td colspan="6">
                                    <input type="hidden" name="id_paciente" value="<?php echo $pacienteDao->getCodPaciente() ?>"/>
                                    <b><?php echo $pacienteDao->getPaciente()?></b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="6"><br/><hr/></td>
                            </tr>
                            
                            <tr>  
                                <td colspan="2">
                                     <input type="hidden" name="id_consumo" value="<?php echo $Consumos->getId_Consumos() ?>"/>
                                     | <b>Agua:</b>
                                </td>
                                <td colspan="2">| <b>Sucos:</b></td>
                                <td colspan="2">| <b>Liq Durante as refeições:</b></td>
                            </tr>
                            <tr>
                                <td>| Sim<input type="radio" name="agua" value="1"/></td>
                                <td>| Não<input type="radio" name="agua" value="2"/></td>
                            
                                <td>| Sim<input type="radio" name="sucos" value="1"/></td>
                                <td>| Não<input type="radio" name="sucos" value="2"/></td>
                                
                                <td>| Sim<input type="radio" name="liq_d_refeicoes" value="1"/></td>
                                <td>| Não<input type="radio" name="liq_d_refeicoes" value="2"/></td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="2">| Obs: <input type="text" name="obs_agua" value="<?php echo $Consumos->getObs_Agua() ?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_sucos" value="<?php echo $Consumos->getObs_Sucos()?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_refeicoes" value="<?php echo $Consumos->getObs_d_Refeicoes() ?>" id="formularioTexto"/></td>
                            </tr>
                            
                            <tr>
                                <td colspan="6"><br/><hr/></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">| <b>Açucares:</b></td>
                                <td colspan="2">|  <b>Sódio:</b></td>
                                <td colspan="2">| <b>Refrigerantes:</b></td>
                                
                            </tr>
                             <tr>
                                <td>| Sim<input type="radio" name="acucares" value="1"/></td>
                                <td>| Não<input type="radio" name="acucares" value="2"/></td>
                               
                                <td>| Sim<input type="radio" name="sodio" value="1"/></td>
                                <td>| Não<input type="radio" name="sodio" value="2"/></td>
                                
                                <td>| Sim<input type="radio" name="refrigerantes" value="1"/></td>
                                <td>| Não<input type="radio" name="refrigerantes" value="2"/></td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="2">| Obs: <input type="text" name="obs_acucares" value="<?php echo $Consumos->getObs_Acucares() ?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_sodio" value="<?php echo $Consumos->getObs_Sodio() ?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_refri" value="<?php echo $Consumos->getObs_Refrigerantes() ?>" id="formularioTexto"/></td>
                            </tr>
                            
                            <tr>
                                <td colspan="6"><br/><hr/></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">| <b>Cereais:</b></td>
                                <td colspan="2">| <b>Frutas:</b></td>
                                <td colspan="2">| <b>Verduras:</b></td>
                            </tr>
                            <tr>
                                <td>| Sim<input type="radio" name="cereais" value="1"/></td>
                                <td>| Não<input type="radio" name="cereais" value="2"/></td>
                                
                                <td>| Sim<input type="radio" name="frutas" value="1"/></td>
                                <td>| Não<input type="radio" name="frutas" value="2"/></td>
                                
                                <td>| Sim<input type="radio" name="verduras" value="1"/></td>
                                <td>| Não<input type="radio" name="verduras" value="2"/></td>
                            <tr>
                                <td colspan="2">| Obs: <input type="text" name="obs_cereais" value="<?php echo $Consumos->getObs_Cereais() ?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_frutas" value="<?php echo $Consumos->getObs_Frutas() ?>" id="formularioTexto"/></td>
                                <td colspan="2">| Obs: <input type="text" name="obs_verduras" value="<?php echo $Consumos->getObs_Verduras() ?>" id="formularioTexto"/></td>
                            </tr>
                                
                            <tr>
                                <td colspan="6"><br/><hr/></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2"><b>Local de Almoço:</b></td>
                                <td colspan="2"><b>Preferências:</b></td>
                                <td colspan="2"><b>Aversões:</b></td>
                            </tr>
                             <tr>
                                 <td colspan="2">
                                     <select name="l_almoco" id="formularioTexto">
                                         <option>Selecione</option>
                                         <?php
                                            $local->Locais();
                                         ?>
                                     </select>
                                 </td>
                                 <td colspan="2"><input type="text" name="preferencias" value="<?php echo $Consumos->getPreferencias() ?>" id="formularioTexto"/></td>
                                 <td colspan="2"><input type="text" name="aversoes" value="<?php echo $Consumos->getAversao() ?>" id="formularioTexto"/></td>
                                
                            </tr>
                            
                        </table>
                    <div class="divBotaoCad">
                        <button type="submit" onclick="cadastrarPaciente" id="botoes"><img src="imagens/simboloCadastrar.png" width="20" height="20"/> <?php echo $BotaoAcao ?></button>
                    </div>    
                    
                    </form>
                    
                    <div class="divBotaoCanc">
                        <a href="dadosPacientes.php?idpac=<?php echo $paciente->getIdPessoa()?>"><button  id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button></a>
                    </div>
                     <?php
                    if($Consumos->getId_Consumos()):
                    echo"<div class='divBotaoEx'>";
                        echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                            ."<input type='hidden' name='ex_idcon' value='{$Consumos->getId_Consumos()}'/>"
                            ."<input type='hidden' name='tipoexc' value='3'/>"
                            . "<input type='hidden' name='pac' value='{$paciente->getIdPessoa()}'/>"
                            . "<button type='submit' onclick='excluirPaciente' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                            ."</form>";
                    echo"</div>";
                    endif;
                    ?>
                </div>
                        
                
        </div>
        
        <div class="divimg"></div>
    </body>
</html>
