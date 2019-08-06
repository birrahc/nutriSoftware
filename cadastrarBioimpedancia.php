<!DOCTYPE html>
<?php 
    require_once './controle.php';
?>

<html lang="pt-br">
    <?php
        require('./_app/config.inc.php');
        $paciente = new PacienteMold();
        $pacienteDados = new PacienteMold();
        $Bioimp =  new BioImpedancia();
        $BioDados = new BioImpedancia();
        
        if(isset($_GET['idpac'])):
            $paciente->setId_Pessoa($_GET['idpac']);
            $pacienteDados->dadosPacientes($paciente, 3);
            $Bioimp->setId_Pessoa($paciente->getId_Pessoa());
        else:
            header("location: cadastrarPaciente.php");
        endif;
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $Bioimp->setData_bio(date('Y-m-d'));
        //$BioDados->VerificaConsultaBio($Bioimp);
        //$Bioimp->setConsulta_bio($BioDados->getConsulta_bio());
        
        $acaoTitulo = "Cadastro de Bioimpedância";
        $botaoAcao = "Cadastrar";
       
    if(isset($_GET['id_bio'])):
        isset($_GET['id_bio']);
    
            if($_GET['id_bio']>=1):
            $Bioimp->setId_bio($_GET['id_bio']);
            $BioDados->BioImpedanciaEspecifica($Bioimp);
            //$Bioimp->setConsulta_bio($BioDados->getConsulta_bio());
            $Bioimp->setData_bio($BioDados->getData_bio());
            $Bioimp->setPeso_bio($BioDados->getPeso_bio());
            $Bioimp->setImc($BioDados->getImc());
            $Bioimp->setPerc_gord_corp($BioDados->getPerc_gord_corp());
            $Bioimp->setPerc_musc_esq($BioDados->getPerc_musc_esq());
            $Bioimp->setMetabolismo_basal($BioDados->getMetabolismo_basal());
            $Bioimp->setIdade_corporal($BioDados->getIdade_corporal());
            $Bioimp->setGordura_viceral($BioDados->getGordura_viceral());
            
            $acaoTitulo = "Editar Bioimpedância";
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
            
            <form name="cadastrarBioimpedancia" action="dadosBioimpedancia.php" method="POST" onsubmit=" return validAvaliacao();">    
            <div class="contAvaBio">
            <table border='0'>
            <tr>
                <td colspan="3" id="bio">
                    <?php $BioDados->ListaBioImpedancia($Bioimp,0);
                    if($BioDados->getSexo()&& $BioDados->getIdade() && $BioDados->getAltura()):
                    echo"Sexo: {$BioDados->getSexo()} | Idade: {$BioDados->getIdade()} | Altura: {$BioDados->getAltura()} ";
                    else:
                     echo"Sexo: {$pacienteDados->getSexo()} | Idade: {$pacienteDados->getIdade()} | Altura: {$pacienteDados->getAltura()} ";   
                    endif;
                    ?>
                </td>
            </tr>
            <tr>
                <td width="460">
                    <div class="divcadBio">
                    <?php
                        $BioDados->ListaBioImpedancia($Bioimp,1);
                    ?>
                    </div>
		</td>
					
		<td>
                    <div class="divformcadBio">
                    <table border='0'>
                    <tr>
                        <td><b>Data:</b></td>
                        <td><input type="date" name="data_bio" value="<?php echo $BioDados->getData_bio() ?>" width="100"/></td>
                        <input type="hidden" name="id_avaliacao" value="<?php echo $BioDados->getId_bio() ?>"/>
                        <input type="hidden" name="id_paciente" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                    </tr>
                        
                    <tr>
                        <td><b>Peso</b></td>
                        <td><input type="text" name="peso_bio" value="<?php echo $BioDados->getPeso_bio() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>IMC</b></td>
                        <td><input type="text" name="imc_bio" value="<?php echo $BioDados->getImc() ?>"/></td>
                    </tr>
                        
                    <tr>
                        <td><b>% Gord.Corporal</b></td>
                        <td><input type="text" name="perc_gord_corp" value="<?php echo $BioDados->getPerc_gord_corp() ?>"/></td>
                    </tr>
			
                    <tr>
                        <td><b>% Musc.Esquelético</b></td>
                        <td><input type="text" name="perc_musc_esq" value="<?php echo $BioDados->getPerc_musc_esq() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>Met.Basal</b></td>
                        <td><input type="text" name="met_basal" value="<?php echo $BioDados->getMetabolismo_basal() ?>"/></td>
                    </tr>
			
                    <tr>
                        <td><b>Idade Corporal</b></td>
                        <td><input type="text" name="idade_corpoaral" value="<?php echo $BioDados->getIdade_corporal() ?>"/></td>
                    </tr>
										
                    <tr>
                        <td><b>Gordura Viceral</b></td>
                        <td><input type="text" name="gord_viceral" value="<?php echo $BioDados->getGordura_viceral() ?>"/></td>
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
                <input type="hidden" name="idpac" value="<?php echo $Bioimp->getId_Pessoa() ?>"/>
                <button  type="submit" id="botoes"><img src="imagens/cancel.png" width="20" height="20"/> Cancelar</button>
            </form>
            </div>
                
            <?php
            if($BioDados->getId_bio()):
	            echo"<div class='divBotaoEx'>";
                echo"<form name='excluirPaciente' action='excluirdados.php' method='POST'>"
                        ."<input type='hidden' name='ex_idbio' value='{$BioDados->getId_bio()}'/>"
                        ."<input type='hidden' name='tipoexc' value='5'/>"
                         ."<input type='hidden' name='pac' value='{$BioDados->getId_bio()}'/>"
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
