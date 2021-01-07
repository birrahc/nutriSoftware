<!DOCTYPE html>
<?php
//require_once './controle.php';

require('./_app/config.inc.php');

$DescPagina="Cadastro de Anminese";
$BotaoAcao="Cadastrar";

$paciente=new PacienteMold();
$pacienteDao = new PacienteMold();
        
if(isset($_GET['paciente'])):
    isset($_GET['paciente']);
    if($_GET['paciente']>=1):
        $paciente->setId_Pessoa($_GET['paciente']);
        $pacienteDao->dadosPacientes($paciente,3); 
               
        $DescPagina="Editar Anminese";
        $BotaoAcao="Editar";
    endif;
endif;
       
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="Script/validaCamposPaciente.js"></script>
        <script type="text/javascript" src="Script/Js.js"></script>
        <link rel="stylesheet" href="css/stylo_large.css">
        <title>Cadastrar Paciente</title>
    </head>
    <body>
        
        <div id="pagina" style="float:none; margin: auto; margin-top: -21px;">
           
	<main>
            
            <section>
		<div class="conteudo">

                    <h2><?php echo $DescPagina ?></h2>

                    <div class="camada-2">

                        <div class="camada-3">
                                
                                
			</div>

                    </div>

		</div>
                
               
            </section>
            
	</main>
        </div>
            <div style="clear:both"></div>   
    </body>
</html>
