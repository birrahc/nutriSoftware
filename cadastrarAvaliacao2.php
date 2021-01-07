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
            
            <form name="cadastrarAvaliacao" action="dadosAvaliacao.php" method="POST" onsubmit=" return validAvaliacao();">    
            <div class="contAvaliacao">
            <table border='0'>
            <tr>
                <td>
                    <div class="divcadAvaliaca">
                    <?php
                        $avaliacaoDados->ListaAvaliacao($avaliacao,1);
                    ?>
                    </div>
		</td>
					
		<td width="220">
                    <div class="divformcadAv">
                    <table border='0'>
                    <tr>
			<td width="150"><b>Avaliações</b></td>
                        <td>
                            <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao->getId_Avaliacao() ?>"/>
                            <input type="hidden" name="id_paciente" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                            <input type="text" name="consulta" value="<?php echo $avaliacao->getAvaliacao()?>"/>
			</td>
                    </tr>
                    <tr>
                        <td><b>Data:</b></td>
                        <td><input type="date" name="data_avalicao" value="<?php echo $avaliacao->getDataAvalicao() ?>" width="100"/></td>
                    </tr>
                        
                    <tr>
                        <td><b>Peso</b></td>
                        <td><input type="text" name="peso" value="<?php echo $avaliacao->getPeso() ?>"/></td>
                    </tr>
			
                    <tr>
                        <td colspan='2'></td>
                    </tr>
										
                    <tr>
                        <td><b>C.cintura</b></td>
                        <td><input type="text" name="c_cintura" value="<?php echo $avaliacao->getC_Cintura() ?>"/></td>
                    </tr>
                        
                    <tr>
                        <td><b>C.Abdominal</b></td>
                        <td><input type="text" name="c_abdominal" value="<?php echo $avaliacao->getC_Abdominal() ?>"/></td>
                    </tr>
			
                    <tr>
                        <td><b>C.Quadril</b></td>
                        <td><input type="text" name="c_quadril" value="<?php echo $avaliacao->getC_Quadril() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>C.Peito</b></td>
                        <td><input type="text" name="c_peito" value="<?php echo $avaliacao->getC_Peito() ?>"/></td>
                    </tr>
			
                    <tr>
                        <td><b>C.Braço D</b></td>
                        <td><input type="text" name="c_braco_d" value="<?php echo $avaliacao->getC_Braco_D() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>C.Braço E</b></td>
                        <td><input type="text" name="c_braco_e" value="<?php echo $avaliacao->getC_Braco_E() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>C.Coxa D</b></td>
                        <td><input type="text" name="c_coxa_d" value="<?php echo $avaliacao->getC_Coxa_D() ?>"/></td>
                    </tr>
					
                    <tr>
                        <td><b>C.Coxa E</b></td>
                        <td><input type="text" name="c_coxa_e" value="<?php echo $avaliacao->getC_Coxa_E() ?>"/></td>
                    </tr>
				
                    <tr>
                        <td colspan='2'></td>
                    </tr>
			
                    <tr>
                        <td><b>DC Triceps</b></td>
                        <td><input type="text" name="dc_triceps" value="<?php echo $avaliacao->getDc_Triceps() ?>"/></td>
                    </tr>
								
                    <tr>
                        <td><b>Dc.Escapular</b></td>
                        <td><input type="text" name="dc_escapular" value="<?php echo $avaliacao->getDc_Escapular() ?>"/></td>
                    </tr>
					
                    <tr>
                        <td><b>Dc.Supra Iliaca</b></td>
                        <td><input type="text" name="dc_supra_iliaca" value="<?php echo $avaliacao->getDc_Supra_Iliaca() ?>"/></td>
                    </tr>	
										
                    <tr>
                        <td><b>Dc.Abdominal</b></td>
                        <td><input type="text" name="dc_abdominal" value="<?php echo $avaliacao->getDc_Abdominal() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>Dc.Axilar</b></td>
                        <td><input type="text" name="dc_axilar" value="<?php echo $avaliacao->getDc_Axilar() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>Dc.Peitoral</b></td>
                        <td><input type="text" name="dc_peitoral" value="<?php echo $avaliacao->getDc_Peitoral() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>Dc.Coxa</b></td>
                        <td><input type="text" name="dc_coxa" value="<?php echo $avaliacao->getDc_Coxa() ?>"/></td>
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
            </tr>
            </table>
            </div>
            
            <div class="divBotaoCad">
            <?php
            if($botaoAcao=='Editar'):
                echo"<button type='submit' onclick='return confirmaEditAval();' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/> {$botaoAcao} </button>";
            else:
                echo"<button type='submit' onclick='cadastrarPaciente' id='botoes'><img src='imagens/simboloCadastrar.png' width='20' height='20'/> {$botaoAcao} </button>";
            endif;
            ?>
            <script>
                function confirmaEditAval(){
                    editAval = confirm('Deseja realmente confirmar as alterações desta Avaliação ?');
                    if(editAval)
                        return true;
                    else
                        return false;
                }
            </script>   
            </div>
            </form>
			
            <div class="divBotaoCanc">
            <form method="GET" action="dadosPacientes.php">
                <input type="hidden" name="idpac" value="<?php echo $avaliacao->getId_Pessoa() ?>"/>
                <button  type="submit" id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button>
            </form>
            </div>
                
            <?php
            if($avaliacao->getId_Avaliacao()):
	            echo"<div class='divBotaoEx'>";
                echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                        ."<input type='hidden' name='ex_idav' value='{$avaliacaoDados->getId_Avaliacao()}'/>"
                        ."<input type='hidden' name='tipoexc' value='4'/>"
                         ."<input type='hidden' name='pac' value='{$avaliacaoDados->getId_Pessoa()}'/>"
                        . "<button type='submit' onclick='return confExAva();' id='botoes'><img src='imagens/lixeira2.png' width='20' height='20'/> Excluir </button>"
                   ."</form>";
                echo"</div>";
            endif;
            ?>
            <script>
            function confExAva(){
                var excAval = confirm('Deseja realmente excluir esta avaliação ?');
                if(excAval)
                    return true;
                else
            return false;
            }
            </script>
        </div>
        
        <div class="divimg"></div>
      
    </body>
</html>
