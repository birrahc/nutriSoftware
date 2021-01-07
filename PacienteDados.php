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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/stylo_large.css">
	<title>Dados Pacientes</title>
</head>
<body>
        <div id="geral">
	
        <div id="conteudo-menus">
            <div id="logo-menu">
                <img src="imagens/simbolo.jpg">
            </div>
            <nav>
                <ul>
                    <li><a href="#Pacientes">Pacientes</a></li>
                    <li><a href="#Avaliacao">Avaliação</a></li>
                    <li><a href="#Bioimpedancia">Bioimpedância</a></li>
                    <li><a href="#Anminese">Anminese</a></li>
                    <li><a href="#Consumos">Consumos</a></li>
                    <li><a href="#Relatorios">Relatórios</a></li>
                    <li><a href="cadastrarPaciente.php">Cadastrar Paciente</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
    
        <div id="pagina">
	<main>
            <section>
                <div id="Pacientes" class="conteudo-duplo">

                    <h2>Pacientes</h2>

                    <div class="camada-2">

			<div class="camada-3">
                            <div id="pesquisa">
                                <form action="#" method="POST">
                                    <input type="text" name="pesquisar" placeholder="Pesquisar"><button>Pesquisar</button>
                                </form>
                            </div>
                            <div id="lista-pacientes">

                            <?php
                                $pacDao->listaPaciente($paciente);
                            ?>

                            </div>
			</div>

                    </div>
                    
		</div>

                <div class="conteudo-duplo" style="float:right !important; margin-right:0 !important;">

                    <h2>Dados Pessoais</h2>

                    <div class="camada-2">

                        <div class="camada-3">
                            <?php
                                if(isset($_GET['idpac'])):
                            ?>
                            <div id="conteudo-paciente">
				<div class="dados-pessoais"> <h3>Nome:</h3> </div>
                                <div class="dados-pessoais"> <h3>Profissão:</h3> </div>
				<div class="dados-pessoais"> <h3>Nascimento:</h3> </div>
				<div class="dados-pessoais"> <h3>Idade:</h3> </div>
				<div class="dados-pessoais"> <h3>Altura:</h3></div>
				<div class="dados-pessoais"> <h3>E-Mail:</h3></div>
				<div class="dados-pessoais"> <h3>Telefone:</h3> </div>
                            </div>

                            <div id="cont-valores"> 
                            <?php
			        
			            $pacDao->dadosPacientes($paciente, 2);
			        endif;
			    ?>
                            </div>
                        </div>

                    </div>
                    <?php
                        if(isset($_GET['idpac'])):
                     ?>
                    <div class="menus-camada-2 menu-list">
                        <ul>
                            <li><a href="#">Pagamentos</a></li>
                            <li><a href="cadastrarPaciente.php?paciente=<?php echo $pacDao->getId_Pessoa() ?>">Editar</a></li>
                        </ul>
                    </div>
                    <?php
                        endif;
                    ?>
		</div>
            </section>
            
            <section>
                
            <?php
                $Avalicao->setId_Pessoa($pacDao->getId_Pessoa());
                $AvaliacaoDao->ListaAvaliacao($Avalicao, null);
                
                if(isset($_GET['idpac'])):
                    if($AvaliacaoDao->getId_Avaliacao()):
                    
            ?>
            
                <div id="Avaliacao" class="conteudo">

                    <h2>Avaliações</h2>

                    <div class="camada-2">

                        <div class="camada-3">
                            
                            <div id="titulo-paciente"><p>Paciente: <b><?php echo $AvaliacaoDao->getNome() ?></b> | Idade: <b><?php echo $AvaliacaoDao->getIdade() ?> anos</b> | Altura:<b><?php echo $AvaliacaoDao->getAltura() ?></b></p></div>
                            
                            <div class="div-indice">
                               
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

                            <div class="dados-avaliacao">
                            <?php
                                $AvaliacaoDao->ListaAvaliacao($Avalicao, 1)
                            ?>		
                            </div>

                        </div>
                        
                        <div class="menus-camada-2 menu-list">
                            <ul>
                                <li><a href="cadastrarAvaliacao.php?idpac=<?php echo $Avalicao->getId_Pessoa()?>">Cadastrar Avaliação</a></li>
                                <li><a href="#">Visualizar</a></li>
                            </ul>
                        </div>
                        
                    </div>

		</div>
                <?php
                    else:
                        echo "<div class='inf-a-central'><p> Nenhuma Avaliação cadastrada para esse paciente. <br> <a href='cadastrarAvaliacao.php?idpac={$pacDao->getId_Pessoa()}'>Cadastrar Avaliação</a> </p></div>";
                    endif;
                endif;
                
                
                $Bio->setId_Pessoa($pacDao->getId_Pessoa());
                $BioDao->ListaBioImpedancia($Bio, null);
                
                if($BioDao->getId_bio()):
                ?>
                
                <div id="Bioimpedancia" class="conteudo">

                    <h2>Bioimpedância</h2>

                    <div class="camada-2">

                        <div class="camada-3">
                            
                            <div id="tit-paciente-bio"><p>Paciente: <b><?php echo $BioDao->getNome() ?></b> | Idade: <b><?php echo $BioDao->getIdade() ?> anos</b> | Altura:<b><?php echo $BioDao->getAltura() ?></b></p></div>
                            
                            <div class="div-ind-bio">
                            
                                <div class="indice-bio"><h1>Data</h1></div>
                               
                                <div class="indice-bio"><h1>Peso</h1></div>
                                
                                <div class="indice-bio"><h1>Imc</h1></div>
                               
                                <div class="indice-bio"><h1>%Gord.Corporal</h1></div>
                                
                                <div class="indice-bio"><h1>%Musc.Esquelético</h1></div>
                                
                                <div class="indice-bio"><h1>Met.Basal</h1></div>
                               
                                <div class="indice-bio"><h1>Idade Corporal</h1></div>
                                
                                <div class="indice-bio"><h1>Gord.Veceral</h1></div>
                              
                        </div>

                            <div class="dados-ava-bio">
                            <?php
                                $BioDao->ListaBioImpedancia($Bio, 1)
                            ?>			
                            </div>

			</div>

                    </div>
                    <div class="menus-camada-2 menu-list">
                        <ul>
                            <li><a href="cadastrarBioimpedancia.php?idpac=<?php echo $BioDao->getId_Pessoa() ?>">Cadastrar Bioimpedância</a></li>
                            <li><a href="#">Visualizar</a></li>
                            
                        </ul>
                    </div>

		</div>
                
                <?php
                    endif;
                ?>
            </section>
            
	</main>
        </div>
            <div style="clear:both"></div>    
    </div>
</body>
</html>