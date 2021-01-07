<!DOCTYPE html>
<?php 
    //require_once './controle.php';
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

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/stylo.css">
        <script src="css/jquery-3.5.1.min.js"></script>
        <script src="css/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
       <body>
        <div class="container">
            <div class="row">
                <div class="col-12 bdr-20 pt-2 pb-2 bds-1 bcAzulMar">
                    <div class="col-12 bg-secondary p-1 bdr-5">
                        <h5 class="text-center text-light p-0 m-0">Paciente: <b><?php echo $pacienteDao->getNome() ?></b></h5>
                    </div>
                    <div class="conteudoCad">
                        <form name="cadastrarConsumos" action="dadosConsumos.php" method="POST">
                            <input type="hidden" name="id_paciente" value="<?php echo $pacienteDao->getId_Pessoa()?>"/>
                            <input type="hidden" name="id_consumo" value="<?php echo $ConsDao->getId_Consumos() ?>"/>
                            
                            <div class="float-left w-49">
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Agua</h6>
                                    <div class="selectores">
                                    <?php
                                        if($ConsDao->getAgua()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='agua' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='agua' value='2'/></div>";
                                        elseif($ConsDao->getAgua()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='agua' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='agua' value='2' checked='true'/></div>";
                                        else:
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='agua' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='agua' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_agua" value="<?php echo $ConsDao->getObs_Agua() ?>"/>
                                    </div>
                                    <div style="clear: both"/></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Sucos</h6>
                                    <div class="selectores">
                                    <?php
                                        if($ConsDao->getSucos()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sucos' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sucos' value='2'/></div>";
                                        elseif($ConsDao->getSucos()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sucos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sucos' value='2' checked='true'/></div>";
                                        else:
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sucos' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sucos' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_sucos" value="<?php echo $ConsDao->getObs_Sucos() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Liq. Durante as refeições</h6>
                                    <div class="selectores">
                                   <?php
                                        if($ConsDao->getDurante_Refeicoes()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='liq_d_refeicoes' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='liq_d_refeicoes' value='2'/></div>";
                                        elseif($ConsDao->getDurante_Refeicoes()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='liq_d_refeicoes' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='liq_d_refeicoes' value='2' checked='true'/></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='liq_d_refeicoes' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='liq_d_refeicoes' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_refeicoes" value="<?php echo $ConsDao->getObs_d_Refeicoes() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Refrigerantes</h6>
                                    <div class="selectores">
                                   <?php
                                        if($ConsDao->getRefrigerantes()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='refrigerantes' value='1' checked='true' /></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='refrigerantes' value='2'/></div>";
                                        elseif($ConsDao->getRefrigerantes()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='refrigerantes' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='refrigerantes' value='2' checked='true' /></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='refrigerantes' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='refrigerantes' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_refri" value="<?php echo $ConsDao->getObs_Refrigerantes() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Açucares</h6>
                                    <div class="selectores">
                                        <?php
                                        if($ConsDao->getAcucares()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='acucares' value='1' checked='true' /></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='acucares' value='2'/></div>";
                                        elseif($ConsDao->getAcucares()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='acucares' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='acucares' value='2' checked='true' /></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='acucares' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='acucares' value='2'/></div>";
                                        endif;
                                        ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_acucares" value="<?php echo $ConsDao->getObs_Acucares() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Sódio</h6>
                                    <div class="selectores">
                                        <?php
                                        if($ConsDao->getSodio()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sodio' value='1' checked='true' /></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sodio' value='2'/></div>";
                                        elseif($ConsDao->getSodio()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sodio' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sodio' value='2' checked='true' /></div>";
                                        else:   
                                             echo"<div class='float-left w-45'>| Sim:<input type='radio' name='sodio' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='sodio' value='2'/></div>";
                                        endif;
                                        ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_sodio" value="<?php echo $ConsDao->getObs_Sodio() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                
                            </div>
                            <div class="float-left w-49 ml2">
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Cereais</h6>
                                    <div class="selectores">
                                    <?php
                                        if($ConsDao->getCereais()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='cereais' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='cereais' value='2'/></div>";
                                        elseif($ConsDao->getCereais()=='Não'):
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='cereais' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='cereais' value='2' checked='true'/></div>";
                                        else:
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='cereais' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='cereais' value='2'/></div>";
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_cereais" value="<?php echo $ConsDao->getObs_Cereais() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Frutas</h6>
                                    <div class="selectores">
                                        <?php
                                        if($ConsDao->getFrutas()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='frutas' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='frutas' value='2'/></div>";
                                        elseif($ConsDao->getFrutas()=='Não'):
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='frutas' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='frutas' value='2' checked='true'/></div>";
                                        else:
                                            echo" <div class='float-left w-45'>| Sim:<input type='radio' name='frutas' value='1'/></div>";
                                            echo" <div class='float-left w-45'>| Não:<input type='radio' name='frutas' value='2'/></div>";
                                        endif;
                                        ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_frutas" value="<?php echo $ConsDao->getObs_Frutas() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Verduras</h6>
                                    <div class="selectores">
                                    <?php
                                        if($ConsDao->getVerduras()=='Sim'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='verduras' value='1' checked='true'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='verduras' value='2'/></div>";
                                        elseif($ConsDao->getVerduras()=='Não'):
                                            echo"<div class='float-left w-45'>| Sim:<input type='radio' name='verduras' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='verduras' value='2' checked='true'/></div>";
                                        else:
                                           echo"<div class='float-left w-45'>| Sim:<input type='radio' name='verduras' value='1'/></div>";
                                            echo"<div class='float-left w-45'>| Não:<input type='radio' name='verduras' value='2'/></div>"; 
                                        endif;
                                    ?>
                                    </div>
                                    <div class="obsCad">
                                        | Obs <input type="text" name="obs_verduras" value="<?php echo $ConsDao->getObs_Verduras() ?>"/>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Local de Almoço</h6>
                                    <div class="selectores w-75">
                                        <select class="w-100" name="l_almoco">
                                         <?php
                                         if($ConsDao->getLocal_Amoco()):
                                             echo"<option value='{$ConsDao->getCod_local_almoco()}'> {$ConsDao->getLocal_Amoco()} </option>";
                                         endif;
                                            $local->Locais();
                                         ?>
                                     </select>
                                    </div>
                                    <div style='clear: both'></div>
                                </div>
                                
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Preferências</h6>
                                    <div class="selectores w-75">
                                        <input class="w-100" type="text" name="preferencias" value="<?php echo $ConsDao->getPreferencias() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                <div class="bg-light p-2 mt-1 w-100 bdr-10">
                                    <h6>Aversões</h6>
                                    <div class="selectores w-75">
                                        <input class="w-100" type="text" name="aversoes" value="<?php echo $ConsDao->getAversao() ?>"/>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                            <div class="float-right w-45 ml-mr-25 p-2"><button class="btn btn-info w-100 p-2 bdr-10">Cadastrar</button></div>
                        </form>
                        <form action="pacientes.php" method="GET">
                            <input type="hidden" name="idpac" value="<?php echo $paciente->getId_Pessoa() ?>"/>
                        <div class="float-right w-45 ml-mr-25 p-2"><button class="btn btn-danger w-100 p-2 bdr-10">Cancelar</button></div>
                        </form>
                        <div style="clear: both"s></div>
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>
