<!DOCTYPE html>

    <?php
    require_once './controle.php';
    require('./_app/config.inc.php');
    
    $paciente= new PacienteMold();
    $pacDao= new PacienteMold();
    $Bio = new BioImpedancia();
    $BioDao = new BioImpedancia();
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
            $Bio->setId_Pessoa($_GET['paciente']);
            $BioDao->ListaBioImpedancia($Bio, null);
            echo"Nome: <b>{$BioDao->getNome()}</b> <b>|</b> Sexo: <b>{$BioDao->getSexo()}</b> <b>|</b>  Idade: <b>{$BioDao->getIdade()} anos</b> <b>|</b> Altura: <b>{$BioDao->getAltura()}</b>";
        endif;
        ?>
        </div>
        <div class="contBioimp">
	<table border='0'>
	<tr>
            <td>
		<div class="divconteudoprintBio">
		<table border="0">			
								
                <tr>
                    <td><b>Data:</b></td>
		</tr>
		
                <tr>
                    <td><b>Peso</b></td>
		</tr>
					
                <tr>
                    <td><b>Imc</b></td>
		</tr>
		
                <tr>
                    <td><b>% Gord.Corporal</b></td>
		</tr>
								
                <tr>
                    <td><b>% Musc.Esquelético</b></td>
		</tr>
								
                <tr>
                    <td><b>Met.Basal</b></td>
		</tr>
	
                <tr>
                    <td><b>Idade Corporal</b></td>
		</tr>
								
                <tr>
                    <td><b>Gord.Viceral</b></td>
		</tr>
                
                </table>
							
		</div>
            </td>
				
            <td>				
            <div class="divprintavaBio">
            <?php
            if($Bio->getId_Pessoa()):
		$BioDao->ListaBioImpedancia($Bio,1);
            endif;
            ?>
            </div>				
            </td>
            
	</tr>
	</table>
        </div>
        
    </body>
</html>
