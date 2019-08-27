<!DOCTYPE html>
<?php
require('./_app/config.inc.php');

$paciente= new PacienteMold();
$pacDao= new PacienteMold();
$Avalicao = new AvaliacaoMold();
$AvaliacaoDao = new AvaliacaoMold();
$Bio = new BioImpedancia();
$BioDao = new BioImpedancia();

if(isset($_GET['idpac'])):
    isset($_GET['idpac']);
    $paciente->setId_Pessoa($_GET['idpac']);
endif;

if(isset($_POST['pesquisar'])):
    isset($_POST['pesquisar']);
    $paciente->setNome($_POST['pesquisar']);
endif;
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="css/small.css"/>
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="css/medium.css"/>
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1350px)" href="css/large.css"/>
    </head>

    <body>
        
        
        <div style="width: 100%; height: 120px;">
            
        </div>
        <div class="responsive-pag">

            <div class="conteudo-esquerdo">
                <h2>Pacientes</h2>
                <div class="interno" id="campo-pesquisa">
                    <form action="#" method="POST">
                        <button type="submit">Pesquisar</button>
                        <input type="text" name="pesquisar"/>
                    </form>
                    <div class="interno-cont-1">
                    <?php
                        $pacDao->listaPaciente($paciente);
                    ?>
                    </div>
                </div>

                <p id="menu-interno">
                    <a href="#">Cadastrar Paciente</a>
                </p>
            </div>

            <div class="conteudo-direito">
                <h2>Dados Pessoais</h2>
                <div class="interno">
                    <div class="interno-cont-2">
                        <?php
                        if(isset($_GET['idpac'])):
                            $pacDao->dadosPacientes($paciente, 2);
                        endif;
                        ?>
                    </div>
                </div>
                <p id="menu-interno">
                    <a href="#">Editar</a> |
                    <a href="#">Pacientes</a> |
                    <a href="#">Avaliação</a> |
                    <a href="#">Anminese</a> |
                    <a href="#">Consumos</a>

                </p>
            </div>

        </div>

        <?php
        $Avalicao->setId_Pessoa($pacDao->getId_Pessoa());
        $AvaliacaoDao->ListaAvaliacao($Avalicao, null);
        
        if($AvaliacaoDao->getId_Avaliacao()):
        ?>
        
        <div class="responsive-pag">

            <div class="conteudo-centro">
                <h2>Avaliações</h2> 
                <div class="interno-camada-2">
                    <table border="0">
                        <tr>
                            <th><b>Paciente:</b></th> 
                            <td><p><?php echo $AvaliacaoDao->getNome() ?> </p></td>
                            <th><b>Idade:</b></th>
                            <td><p><?php echo $AvaliacaoDao->getIdade()." anos" ?></p></td>
                        </tr>
                    </table>
                    <div class="interno-centro">


                        <div class="conteudo-avaliacao">
                            <table border="0">
                                <tr>
                                    <th><p>Avaliações</p></th>
                                </tr>
                                <tr>
                                    <th><p>Data</p></th>
                                </tr>
                                <tr>
                                    <th><p>Peso</p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th><p>C.cintura</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Abdominal</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Quadril</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Peito</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Braço D</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Braço E</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Coxa D</p></th>
                                </tr>
                                <tr>
                                    <th><p>C.Coxa E</p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th><p>DC Triceps</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Escapular</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Supra Iliaca</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Abdominal</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Axilar</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Peitoral</p></th>
                                </tr>
                                <tr>
                                    <th><p>DC Coxa</p></th>
                                </tr>
                                <tr>
                                    <th><p>% Gordura</p></th>
                                </tr>
                                <tr>
                                    <th><p>M.Muscular</p></th>
                                </tr>
                                <tr>
                                    <th><p>Gordura</p></th>
                                </tr>
                            </table>
                        </div>
                        <div class="conteudo-avaliacao-1">
                        <?php
                        $AvaliacaoDao->ListaAvaliacao($Avalicao, 1)
                        ?>
                        </div>
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
            <?php
            endif;
            ?>


        </div>
        
         <?php
        $Bio->setId_Pessoa($pacDao->getId_Pessoa());
        $BioDao->ListaBioImpedancia($Bio, null);
        
        if($BioDao->getId_bio()):
        ?>
        <div class="responsive-pag" style="margin-top: 115px">

            <div class="conteudo-centro">
                <h2>Bioimpedância</h2> 
                <div class="interno-camada-2">
                    <table border="0">
                        <tr>
                            <th><b>Paciente:</b></th> 
                            <td><p><?php echo $BioDao->getNome() ?> </p></td>
                            <th><b>Idade:</b></th>
                            <td><p><?php echo $BioDao->getIdade()." anos" ?></p></td>
                             <th><b>Altura:</b></th>
                             <td><p><?php echo $BioDao->getAltura() ?></p></td>
                        </tr>
                    </table>
                    <div class="interno-centro">
                        <div class="conteudo-bioimp">
                            <table border="0">
                                <tr>
                                    <th><p>Data</p></th>
                                </tr>
                                <tr>
                                    <th><p>Peso</p></th>
                                </tr>
                                
                                <tr>
                                    <th><p>Imc</p></th>
                                </tr>
                                <tr>
                                    <th><p>%Gord.Corporal</p></th>
                                </tr>
                                <tr>
                                    <th><p>%Musc.Esquelético</p></th>
                                </tr>
                                <tr>
                                    <th><p>Met.Basal</p></th>
                                </tr>
                                <tr>
                                    <th><p>Idade Corporal</p></th>
                                </tr>
                                <tr>
                                    <th><p>Gord.Veceral</p></th>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="conteudo-bioimp-1">
                        <?php
                        $BioDao->ListaBioImpedancia($Bio, 1)
                        ?>
                        </div>
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
            <?php
            endif;
            ?>
        </div>
        
        <div style="width: 100%; height: 50px; background-color: whitesmoke; border-bottom-style:solid; border-color: #00BFFF; position: fixed; top:0px; text-align: center">
            <div style="width:30%; margin-left: auto; margin-right: auto; background-color:white; border-radius: 0px 0px 100px 100px; border-bottom-style:solid; border-color: #00BFFF; ">
                <img src="imagens/logo atual.jpg" style="width:220px; height: 100px; align:center; border:1px; " />
            </div> 
        </div>
    </body>
</html>