<!DOCTYPE html>
<?php 
    //require_once './controle.php';
?>

<html lang="pt-br">
     <?php
    require('./_app/config.inc.php');
    $paciente= new Paciente();
    $anminese = new AnmineseDao();
    $Consumos = new Consumos();
    $ConsDao = new ConsumoDao();
    
    if(isset($_GET['idpac'])):
        $paciente->setIdPessoa($_GET['idpac']);
    else:
        header("location: cadastrarPaciente.php");
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
                <div class="formCadAn">
                    <form name="cadastrarConsumos" action="dadosConsumos.php" method="POST">
                        <table border="0">
                            <tr>
                                <td colspan="2" id="pacAn">
                                    <?php
                                    $anminese->ListaPacAn($paciente->getIdPessoa());
                                    ?>
                                </td>
                            </tr>    
                                
                            </tr>
                           
                             <tr>
                                     
                                 <td>
                                     <input type="hidden" name="id_consumo" value="<?php echo $Consumos->getId_Consumos() ?>"/>
                                     <b>Agua:</b><br><input type="text" name="agua" value="<?php echo $Consumos->getAgua() ?>"/>
                                 </td>
                                 <td><b>Cereais:</b><br><input type="text" name="cereais" value="<?php echo $Consumos->getCereais() ?>"/></td>
                                
                            </tr>
                            <tr>
                                <td><b>Sucos:</b><br><input type="text" name="sucos" value="<?php echo $Consumos->getSucos() ?>"/></td>
                                <td><b>Frutas:</b><br><input type="text" name="frutas" value="<?php echo $Consumos->getFrutas() ?>"/></td>
                                
                            </tr>
                            
                             <tr>
                                 <td><b>Liquidos durante as refeições:</b><br><input type="text" name="liq_d_refeicoes" value="<?php echo $Consumos->getDurante_Refeicoes() ?>"/></td>
                                 <td><b>Verduras:</b><br><input type="text" name="verduras" value="<?php echo $Consumos->getVerduras() ?>"/></td>
                                
                                
                            </tr>
                            <tr>
                                <td><b>Açucares:</b><br><input type="text" name="acucares" value="<?php echo $Consumos->getAcucares() ?>"/></td>
                                                            
                                <td><b>Local de Almoço:</b><br><input type="text" name="l_almoco" value="<?php echo $Consumos->getLocal_Amoco() ?>"/></td>
                            </tr>
                            
                             <tr>
                                 <td><b>Sódio:</b><br><input type="text" name="sodio" value="<?php echo $Consumos->getSodio() ?>"/></td>
                                
                                 <td><b>Preferencias:</b><br><input type="text" name="preferencias" value="<?php echo $Consumos->getPreferencias() ?>"/></td>
                            </tr>
                            <tr>
                                <td><b>Refrigerantes:</b><br><input type="text" name="refrigerantes" value="<?php echo $Consumos->getRefrigerantes() ?>"/></td>
                                
                                <td><b>Aversões:</b><br><input type="text" name="aversoes" value="<?php echo $Consumos->getAversao() ?>"/></td>
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
