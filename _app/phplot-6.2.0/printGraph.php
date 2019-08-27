<?php

require_once './phplot.php';
//require_once '../Modelo/AvaliacaoMold.class.php';
require('../config.inc.php');

$paciente = new AvaliacaoMold();
if(isset($_GET['paciente'])):
    $paciente->setId_Pessoa($_GET['paciente']);
endif;
$dados = new AvaliacaoMold();
$dados->ListaAvaliacao($paciente, 0);

    
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura

$plot = new PHPlot(1000 , 500);

$data = array(
             $dados->getPes(),
             $dados->getPerc_Gordura(),
             $dados->getMassa_M(),
             $dados->getGord()
            ); 
   
$plot->SetBackgroundColor("#f5f5f5"); 
// Organiza Gráfico -----------------------------
$plot->SetTitle("Perc.Gordura | Massa Muscular | Gordura");
$plot->SetTitleColor("blue");
$plot->SetTitleFontSize(5);
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");


$plot->SetDataColors(array("#B0E0E6","#FFFF00","#98FB98","#FA8072","#FF83FA","#ADFF2F","#FFA07A"));
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
$plot->SetLegend($dados->getAvaliacoes());


// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
//$plot->SetXLabel("Fonte: Censo Demográfico 2000, Fecundidade e Mortalidade Infantil, Resultados\n Preliminares da Amostra IBGE, 2002");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(5);
$plot->SetAxisFontSize(5);
$plot->SetDataLabelColor("#4F4F4F");
$plot->SetGridColor("#8B0000");
$plot->SetDataValueLabelColor("#1C1C1C");
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------
$plot->SetUseTTF(0);
$plot-> SetFont ('x_label', '3'); 
$plot-> SetFont ('y_label', '2');
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------

