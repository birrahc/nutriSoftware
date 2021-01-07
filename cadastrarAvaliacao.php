<!DOCTYPE html>

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
            $avaliacao->setObs_Avalicao($avaliacaoDados->getObs_Avalicao());
            
            $acaoTitulo = "Editar Avaliação";
            $botaoAcao = "Editar";
        endif;
     endif;
    ?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="Script/validaCamposAvaliacao.js"></script>
        <script type="text/javascript" src="Script/Js.js"></script>
        <link rel="stylesheet" href="css/stylo_large.css">
        <title><?php echo $acaoTitulo ?></title>
    </head>
    <body>
        
        <div id="pagina" style="float:none; margin: auto; margin-top: -21px;">
           
	<main>
            
            <section>
		<div class="conteudo">

                    <h2><?php echo $acaoTitulo ?></h2>

                    <div class="camada-2">

                        <div class="camada-3">
                            
                            <div id="titulo-paciente"><p>Paciente: <b><?php echo $pacienteDados->getNome() ?></b> | Idade: <b><?php echo $pacienteDados->getIdade() ?> anos</b> | Altura:<b><?php echo $pacienteDados->getAltura() ?></b></p></div>
                                
                            <div class="dados-avaliacao div-ajuste-dados">
                            <?php
                                if($avaliacao->getId_Pessoa()):
                                   $avaliacaoDados->ListaAvaliacao($avaliacao,1); 
                                endif;
                                //$avaliacaoDados->ListaAvaliacao($avaliacao,1);
                            ?>		
                            </div>
                            <div class="div-indice div-ajut-ind">
                               
                                <div class="indice-aval"><h4>Avaliações</h4></div>
                               
                                <div class="indice-aval"><h4 class="p-h4-bio">Data</h4></div>
                               
                                <div class="indice-aval"><h4>Peso</h4></div>
                                
                                <div class="indice-aval"><h4>--------------------</h4></div>
                               
                                <div class="indice-aval"><h4>C.cintura</h4></div>
                                
                                <div class="indice-aval"><h4>C.Abdominal</h4></div>
                                
                                <div class="indice-aval"><h4>C.Quadril</h4></div>
                               
                                <div class="indice-aval"><h4>C.Peito</h4></div>
                               
                                <div class="indice-aval"><h4>C.Braço D</h4></div>
                                
                                <div class="indice-aval"><h4>C.Braço E</h4></div>
                                
                                <div class="indice-aval"><h4>C.Coxa D</h4></div>
                               
                                <div class="indice-aval"><h4>C.Coxa E</h4></div>
                                
                                <div class="indice-aval"><h4>--------------------</h4></div>
                                
                                <div class="indice-aval"><h4>DC Triceps</h4></div>
                                
                                <div class="indice-aval"><h4>DC Escapular</h4></div>
                               
                                <div class="indice-aval"><h4>DC Supra Iliaca</h4></div>
                                
                                <div class="indice-aval"><h4>DC Abdominal</h4></div>
                               
                                <div class="indice-aval"><h4>DC Axilar</h4></div>
                                
                                <div class="indice-aval"><h4>DC Peitoral</h4></div>
                                
                                <div class="indice-aval"><h4>DC Coxa</h4></div>
                                
                                <div class="indice-aval"><h4>% Gordura</h4></div>
                                
                                <div class="indice-aval"><h4>M.Muscular</h4></div>
                               
                                <div class="indice-aval"><h4>Gordura</h4></div>
                            
                            </div>
                            
                                <div class="div-indice div-ajut-ind div-ajut-form input-date-13">
                                    <form name="cadastrarAvaliacao" action="dadosAvaliacao.php" method="POST" onsubmit=" return validAvaliacao();">    
                                    <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao->getId_Avaliacao() ?>"/>
                                    <input type="hidden" name="id_paciente" value="<?php echo $pacienteDados->getId_Pessoa()?>"/>
                                    <input type="text" name="consulta" value="<?php echo $avaliacao->getAvaliacao()?>">
                                    <input type="text" name="data_avalicao" value="<?php echo date("d/m/Y", strtotime($avaliacao->getDataAvalicao())) ?>">
                                    <input type="text" name="peso" value="<?php echo $avaliacao->getPeso() ?>">
                                    <div class="indice-aval"><h4>--------</h4></div>
                                    <input type="text" name="c_cintura" value="<?php echo $avaliacao->getC_Cintura() ?>">
                                    <input type="text" name="c_abdominal" value="<?php echo $avaliacao->getC_Abdominal() ?>">
                                    <input type="text" name="c_quadril" value="<?php echo $avaliacao->getC_Quadril() ?>">
                                    <input type="text" name="c_peito" value="<?php echo $avaliacao->getC_Peito() ?>">
                                    <input type="text" name="c_braco_d" value="<?php echo $avaliacao->getC_Braco_D() ?>">
                                    <input type="text" name="c_braco_e" value="<?php echo $avaliacao->getC_Braco_E() ?>">
                                    <input type="text" name="c_coxa_d" value="<?php echo $avaliacao->getC_Coxa_D() ?>">
                                    <input type="text" name="c_coxa_e" value="<?php echo $avaliacao->getC_Coxa_E() ?>">
                                    <div class="indice-aval"><h4>--------</h4></div>
                                    <input type="text" name="dc_triceps" value="<?php echo $avaliacao->getDc_Triceps() ?>">
                                    <input type="text" name="dc_escapular" value="<?php echo $avaliacao->getDc_Escapular() ?>">
                                    <input type="text" name="dc_supra_iliaca" value="<?php echo $avaliacao->getDc_Supra_Iliaca() ?>">
                                    <input type="text" name="dc_abdominal" value="<?php echo $avaliacao->getDc_Abdominal() ?>">
                                    <input type="text" name="dc_axilar" value="<?php echo $avaliacao->getDc_Axilar() ?>">
                                    <input type="text" name="dc_peitoral" value="<?php echo $avaliacao->getDc_Peitoral() ?>">
                                    <input type="text" name="dc_coxa" value="<?php echo $avaliacao->getDc_Coxa() ?>">
                                    <div class="botaoAvaliacao"> <button type="submit">Cadastrar</button></div>
                                    </form>
                                    <div class="botaoAvaliacao">
                                        <form action="excluirdados.php" method="POST">
                                            <input type="hidden" name="tipoexc" value="4" >
                                            <input type="hidden" name="ex_idav" value="<?php echo $avaliacao->getId_Avaliacao()?>" >
                                            <button type="submit">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                                
                            
			</div>

                    </div>
                    <a href="#">Voltar</a>
                    </div>

		</div>
                
               
            </section>
            
	</main>
        </div>
            <div style="clear:both"></div>   
    </body>
</html>

