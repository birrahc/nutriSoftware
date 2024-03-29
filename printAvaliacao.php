<!DOCTYPE html>

    <?php
    require_once './controle.php';
    require('./_app/config.inc.php');
    
    $paciente= new PacienteMold();
    $pacDao= new PacienteMold();
    $Avalicao = new AvaliacaoMold();
    $AvaliacaoDao = new AvaliacaoMold();
    ?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    
    <body>
        <div class="divlogoprint">
            <p align="center"><img src="imagens/logo atual.jpg"/></p>
        </div>
        
        <div class="PacAvaliacao">
        <?php
        if(isset($_GET['paciente'])):
            $Avalicao->setId_Pessoa($_GET['paciente']);
            $AvaliacaoDao->ListaAvaliacao($Avalicao, null);
            echo"Nome: <b>{$AvaliacaoDao->getNome()}</b>  <b>|</b>  Idade: <b>{$AvaliacaoDao->getIdade()} anos</b>";
        endif;
        ?>
        </div>
        <div class="contAvaliacao">
	<table border='0'>
	<tr>
            <td>
		<div class="divconteudoprint">
		<table border="0">
                    
		<tr>
                    <td width="150"><b>Avaliações</b></td>
                </tr>					
								
                <tr>
                    <td><b>Data:</b></td>
		</tr>
		
                <tr>
                    <td><b>Peso</b></td>
		</tr>
		
                <tr>
                    <td></td>
		</tr>
								
                <tr>
                    <td><b>C.cintura</b></td>
		</tr>
		
                <tr>
                    <td><b>C.Abdominal</b></td>
		</tr>
								
                <tr>
                    <td><b>C.Quadril</b></td>
		</tr>
								
                <tr>
                    <td><b>C.Peito</b></td>
		</tr>
	
                <tr>
                    <td><b>C.Braço D</b></td>
		</tr>
								
                <tr>
                    <td><b>C.Braço E</b></td>
		</tr>
								
                <tr>
                    <td><b>C.Coxa D</b></td>
		</tr>
				
                <tr>
                    <td><b>C.Coxa E</b></td>
		</tr>
								
                <tr>
                    <td><b></h5></b>
		</tr>
								
                <tr>
                    <td><b>DC Triceps</b></td>
		</tr>
								
                <tr>
                    <td><b>DC Escapular</b></td>
		</tr>
								
                <tr>
                    <td><b>DC Supra Iliaca</b></td>
		</tr>
								
                <tr>
                    <td><b>DC Abdominal</b></td>
		</tr>
								
                <tr>
                    <td><b>DC Axilar</b></td>
		</tr>
				
                <tr>
                    <td><b>DC Peitoral</b></td>
		</tr>
								
                <tr>
                    <td><b>DC Coxa</b></td>
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
				
            <td>				
            <div class="divprintavaliacao">
            <?php
            if($Avalicao->getId_Pessoa()):
		$AvaliacaoDao->ListaAvaliacao($Avalicao,1);
            endif;
            ?>
            </div>				
            </td>
            
	</tr>
	</table>
        </div>
        
    </body>
</html>
