<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>

<html lang="pt-br">
    <?php
        require('./_app/config.inc.php');
        $paciente = new PacienteMold();
        $pacienteDados = new PacienteMold();
        $avaliacao =  new AvaliacaoMold();
        $avaliacaoDados = new AvaliacaoMold();
        
        if(isset($_GET['idpac'])):
            $paciente->setId_Pessoa($_GET['idpac']);
            $pacienteDados->dadosPacientes($paciente, 3);
            $avaliacao->setId_Pessoa($paciente->getId_Pessoa());
        else:
            header("location: cadastrarPaciente.php");
        endif;
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $avaliacao->setDataAvalicao(date('Y-m-d'));
        $avaliacaoDados->VerificaConsulta($avaliacao);
        $avaliacao->setAvaliacao($avaliacaoDados->getConsulta());
        
        $acaoTitulo = "Cadastro de Avaliação";
        $botaoAcao = "Cadastrar";
       
    if(isset($_GET['cod_aval'])):
        isset($_GET['cod_aval']);
    
            if($_GET['cod_aval']>=1):
            $avaliacao->setId_Avaliacao($_GET['cod_aval']);
            $avaliacaoDados->AvalEspecifica($avaliacao);
            $avaliacao->setAvaliacao($avaliacaoDados->getAvaliacao());
            $avaliacao->setDataAvalicao($avaliacaoDados->getDataAvalicao());
            $avaliacao->setPeso($avaliacaoDados->getPeso());
            $avaliacao->setC_Cintura($avaliacaoDados->getC_Cintura());
            $avaliacao->setC_Abdominal($avaliacaoDados->getC_Abdominal());
            $avaliacao->setC_Quadril($avaliacaoDados->getC_Quadril());
            $avaliacao->setC_Peito($avaliacaoDados->getC_Peito());
            $avaliacao->setC_Braco_D($avaliacaoDados->getC_Braco_D());
            $avaliacao->setC_Braco_E($avaliacaoDados->getC_Braco_E());
            $avaliacao->setC_Coxa_D($avaliacaoDados->getC_Coxa_D());
            $avaliacao->setC_Coxa_E($avaliacaoDados->getC_Coxa_E());
            $avaliacao->setDc_Triceps($avaliacaoDados->getDc_Triceps());
            $avaliacao->setDc_Escapular($avaliacaoDados->getDc_Escapular());
            $avaliacao->setDc_Supra_Iliaca($avaliacaoDados->getDc_Supra_Iliaca());
            $avaliacao->setDc_Abdominal($avaliacaoDados->getDc_Abdominal());
            $avaliacao->setDc_Axilar($avaliacaoDados->getDc_Axilar());
            $avaliacao->setDc_Peitoral($avaliacaoDados->getDc_Peitoral());
            $avaliacao->setDc_Coxa($avaliacaoDados->getDc_Coxa());
            
            $acaoTitulo = "Editar Avaliação";
            $botaoAcao = "Editar";
        endif;
     endif;
    ?>
    
    <head>
        <script type="text/javascript" src="Script/validaCamposAvaliacao.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title><?php echo $acaoTitulo ?></title>
    </head>
    
    <body>
        <div class="divPaginaAvaliacao">
            
            <div class="titPaginaAval">
                <h2><?php echo $acaoTitulo ?></h2>
            </div>
            
            <div class="titAvaliacao">
                <?php
                    echo"<h3>{$pacienteDados->getNome()}</h3>";
                ?>
            </div>
            
            
            <div class="graficoPagina">
            <table border='1'>
            <tr>
                <td colspan="3">
                    <div class="graficoAval">
                    <?php
                        $avaliacaoDados->ListaAvaliacao($avaliacao,2);
                    ?>
                    </div>
		</td>
            </tr>
            <tr>
                
                <td width="300">
                    <div>
                        <img src="_app/phplot-6.2.0/getGraph.php?" alt="Graficos de Avalições" title="" />
                    </div>
		</td>
					
		<td width="250">
                    <div class="grafdobras"> 
                        <table border="1">
                        <tr>
                            <td colspan="2" id="tit-table"><h3>Dobras Cutânias</h3></td>
                            
                        </tr>
                        <tr>
                            <td><b>DC.Triceps</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Triceps() ?></td> 
                        </tr>
                        <tr>
                            <td><b>DC.Escapular</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Escapular() ?></td> 
                        </tr>
                        <tr>
                            <td><b>Supra Iliáca</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Supra_Iliaca() ?></td> 
                        </tr>
                        <tr>
                            <td><b>DC.Abdminal</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Abdominal() ?></td> 
                        </tr>
                        <tr>
                            <td><b>Dc.Axilar</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Axilar() ?></td> 
                        </tr>
                        <tr>
                            <td><b>Dc.Peitoral</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Peitoral() ?></td> 
                        </tr>
                        <tr>
                            <td><b>Dc.Coxa</b></td>
                            <td><?php echo $avaliacaoDados->getDc_Coxa() ?></td> 
                        </tr>
                        
                        </table>
                    </div>							
                </td>
                <td width="250">
                    <div class="grafCirc"> 
                        <table border="1">
                        <tr>
                            <td colspan="3" id="tit-table"><h3>Circunferências</h3></td>
                            
                        </tr>
                        <tr>
                            <td id="atri"><b>C.Cintura</b></td>
                            <td><?php echo $avaliacaoDados->getC_Cintura() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>C.Abdominal</b></td>
                            <td><?php echo $avaliacaoDados->getC_Abdominal() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>C.Quadril</b></td>
                            <td><?php echo $avaliacaoDados->getC_Quadril() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>C.Peito</b></td>
                            <td><?php echo $avaliacaoDados->getC_Peito() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>Braço D</b></td>
                            <td><?php echo $avaliacaoDados->getC_Braco_D() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>Braço E</b></td>
                            <td><?php echo $avaliacaoDados->getC_Braco_E() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>Coxa D</b></td>
                            <td><?php echo $avaliacaoDados->getC_Coxa_D() ?></td> 
                        </tr>
                        <tr>
                            <td id="atri"><b>Coxa E</b></td>
                            <td id="atri"><?php echo $avaliacaoDados->getC_Coxa_E() ?></td> 
                        </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="grafvalor">
                        <table>
                        <tr>
                            <td id="mmgraf"><b>Massa Muscular: </b> <?php echo $mg=number_format($avaliacaoDados->getMc_graf(), 1, ',', ''); ?></td>
                            <td id="gordgraf"><b>Gordura: </b> <?php echo $gdr=number_format($avaliacaoDados->getGordura(), 1, ',', ''); $avaliacaoDados->getGordura()?> </td> 
                            <td id="residualgraf"><b>Peso Residual: </b> <?php echo $pg=number_format($avaliacaoDados->getPesoResidual(), 1, ',', ''); ?> </td>
                        </tr>
                        </table>
                    </div>
                </td>
            </tr>
            </table>
            </div>
        
        <div class="divimg"></div>
      
    </body>
</html>



