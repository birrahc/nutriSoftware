<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>

<html lang="pt-br">
     <?php
    require('./_app/config.inc.php');
    $paciente= new PacienteMold();
    $pacienteDao = new PacienteMold();
    $Consumos = new ConsumosMold();
    $ConsDao = new ConsumosMold();
    $local= new LocalAmoco();
    
    if(isset($pac)):
        $pac;
    endif;
    
    if(isset($_GET['idpac'])&& $_GET['idpac']>=1):
        $paciente->setId_Pessoa($_GET['idpac']);
        $pacienteDao->dadosPacientes($paciente, 3);
        $pac=$pacienteDao->getNome();
    else:
        header("location: cadastrarPaciente.php");
    endif;
     
    
    $DescPagina="Cadastro Consumos";
    $BotaoAcao="Cadastrar";
    
    if(isset($_GET['cod_consumos'])):
        isset($_GET['cod_consumos']);
        if($_GET['cod_consumos']>=1):
            $Consumos->setId_Consumos($_GET['cod_consumos']);
            $ConsDao->ListaConsumos($Consumos, 3);
            $pac=$ConsDao->getNome();
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
                <p><h2><?php echo $DescPagina ?></h2></p>
            </div>
            
            <div class="divCadastroConsumos">
            <form name="cadastrarConsumos" action="dadosConsumos.php" method="POST">
            <table border="0">
            <tr>
                <td colspan="6" id="pacAn">
                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->getId_Pessoa() ?>"/>
                    <p><h3><?php echo $pac ?></h3></p>
                </td>
            </tr>
                            
            <tr>
                <td colspan="6"><br/><hr/></td>
            </tr>
                            
            <tr>  
                <td colspan="2">
                    <input type="hidden" name="id_consumo" value="<?php echo $ConsDao->getId_Consumos() ?>"/>
                    | <b>Agua:</b>
                </td>
                <td colspan="2">| <b>Sucos:</b></td>
                <td colspan="2">| <b>Liq Durante as refeições:</b></td>
            </tr>
                            
            <tr>
            <?php
            if($ConsDao->getAgua()=='Sim'):
                echo"<td>| Sim<input type='radio' name='agua' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='agua' value='2'/></td>";
            elseif($ConsDao->getAgua()=='Não'):
                echo"<td>| Sim<input type='radio' name='agua' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='agua' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='agua' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='agua' value='2' checked='true'/></td>"; 
            endif;
                            
            if($ConsDao->getSucos()=='Sim'):
                echo"<td>| Sim<input type='radio' name='sucos' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='sucos' value='2'/></td>";
            elseif($ConsDao->getSucos()=='Não'):
                echo"<td>| Sim<input type='radio' name='sucos' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='sucos' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='sucos' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='sucos' value='2' checked='true'/></td>";
            endif;
                            
            if($ConsDao->getDurante_refeicoes()=='Sim'):
                echo"<td>| Sim<input type='radio' name='liq_d_refeicoes' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='liq_d_refeicoes' value='2'/></td>";
            elseif($ConsDao->getDurante_refeicoes()=='Não'):
                echo"<td>| Sim<input type='radio' name='liq_d_refeicoes' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='liq_d_refeicoes' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='liq_d_refeicoes' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='liq_d_refeicoes' value='2' checked='true'/></td>"; 
            endif;
            ?>    
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_agua" value="<?php echo $ConsDao->getObs_Agua() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_sucos" value="<?php echo $ConsDao->getObs_Sucos()?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_refeicoes" value="<?php echo $ConsDao->getObs_d_Refeicoes() ?>" id="divCadastroConsumos"/></td>
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
            <?php
            if($ConsDao->getAcucares()=='Sim'):
                echo"<td>| Sim<input type='radio' name='acucares' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='acucares' value='2'/></td>";
            elseif($ConsDao->getAcucares()=='Não'):
                echo"<td>| Sim<input type='radio' name='acucares' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='acucares' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='acucares' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='acucares' value='2' checked='true'/></td>";
            endif;
                            
            if($ConsDao->getSodio()=='Sim'):
                echo"<td>| Sim<input type='radio' name='sodio' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='sodio' value='2'/></td>";
            elseif($ConsDao->getSodio()=='Não'):
                echo"<td>| Sim<input type='radio' name='sodio' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='sodio' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='sodio' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='sodio' value='2' checked='true'/></td>";
            endif;
                            
            if($ConsDao->getRefrigerantes()=='Sim'):
                echo"<td>| Sim<input type='radio' name='refrigerantes' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='refrigerantes' value='2'/></td>";
            elseif($ConsDao->getRefrigerantes()=='Não'):
                echo"<td>| Sim<input type='radio' name='refrigerantes' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='refrigerantes' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='refrigerantes' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='refrigerantes' value='2' checked='true'/></td>";
            endif;
            ?>    
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_acucares" value="<?php echo $ConsDao->getObs_Acucares() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_sodio" value="<?php echo $ConsDao->getObs_Sodio() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_refri" value="<?php echo $ConsDao->getObs_Refrigerantes() ?>" id="divCadastroConsumos"/></td>
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
            <?php
            if($ConsDao->getCereais()=='Sim'):
                echo"<td>| Sim<input type='radio' name='cereais' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='cereais' value='2'/></td>";
            elseif($ConsDao->getCereais()=='Não'):
                echo"<td>| Sim<input type='radio' name='cereais' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='cereais' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='cereais' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='cereais' value='2' checked='true'/></td>";
            endif;
                            
            if($ConsDao->getFrutas()=='Sim'):
                echo"<td>| Sim<input type='radio' name='frutas' value='1' checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='frutas' value='2'/></td>";
            elseif($ConsDao->getFrutas()=='Não'):
                echo"<td>| Sim<input type='radio' name='frutas' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='frutas' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='frutas' value='1' /></td>";
                echo"<td>| Não<input type='radio' name='frutas' value='2' checked='true'/></td>";
            endif;
                            
            if($ConsDao->getVerduras()=='Sim'):
                echo"<td>| Sim<input type='radio' name='verduras' value='1'checked='true'/></td>";
                echo"<td>| Não<input type='radio' name='verduras' value='2'/></td>";
            elseif($ConsDao->getVerduras()=='Sim'):
                echo"<td>| Sim<input type='radio' name='verduras' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='verduras' value='2' checked='true'/></td>";
            else:
                echo"<td>| Sim<input type='radio' name='verduras' value='1'/></td>";
                echo"<td>| Não<input type='radio' name='verduras' value='2' checked='true'/></td>";
            endif;
            ?>
            </tr>
                            
            <tr>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_cereais" value="<?php echo $ConsDao->getObs_Cereais() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_frutas" value="<?php echo $ConsDao->getObs_Frutas() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2">| Obs:<br/> <input type="text" name="obs_verduras" value="<?php echo $ConsDao->getObs_Verduras() ?>" id="divCadastroConsumos"/></td>
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
                <select name="l_almoco">
                <?php
                if($ConsDao->getLocal_Amoco()):
                    echo"<option value='{$ConsDao->getCod_local_almoco()}'> {$ConsDao->getLocal_Amoco()} </option>";
                endif;
                    $local->Locais();
                ?>
                </select>
                </td>
                                 
                <td colspan="2"><input type="text" name="preferencias" value="<?php echo $ConsDao->getPreferencias() ?>" id="divCadastroConsumos"/></td>
                <td colspan="2"><input type="text" name="aversoes" value="<?php echo $ConsDao->getAversao() ?>" id="divCadastroConsumos"/></td>
            </tr>          
            </table>
                    
            <div class="divBotaoCadPac">
            <?php
            if($BotaoAcao=='Editar'):
                echo"<button type='submit' onclick='return confirmaEditcao();' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/> {$BotaoAcao} </button>";
            else:
                echo"<button type='submit' onclick='cadastrarPaciente' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/>{$BotaoAcao} </button>";
            endif;
            ?>
            <script>
                function confirmaEditcao(){
                    editcon= confirm('Deseja realmente Alterar esses Dados ?');
                    if(editcon)
                        return true;
                    else
                        return false;
                }
            </script>  
            </div>    
                    
            </form>
                    
            <div class="divBotaoCancPac">
                <a href="dadosPacientes.php?idpac=<?php echo $paciente->getId_Pessoa()?>"><button  id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button></a>
            </div>
                    
            <?php
            if($ConsDao->getId_Consumos()):
                echo"<div class='divBotaoExPac'>";
                echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                    ."<input type='hidden' name='ex_idcon' value='{$ConsDao->getId_Consumos()}'/>"
                    ."<input type='hidden' name='tipoexc' value='3'/>"
                    . "<input type='hidden' name='pac' value='{$ConsDao->getId_Pessoa()}'/>"
                    . "<button type='submit' onclick='return confDelAn();' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                    ."</form>";
            ?>
            <script>
                function confDelAn(){
                    var conf= confirm('Deseja realmente Excluir a Anminese deste Paciente ?');
                    if(conf)
                        return true;
                    else
                        return false;
                }
            </script>
            </div>;
            <?php
            endif;
            ?>
            </div>
        </div>
        
        
    </body>
</html>
