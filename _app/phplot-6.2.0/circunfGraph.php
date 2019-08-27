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

$plot = new PHPlot(768 , 600);

$data = array(
             $dados->getCintura_c(),
             $dados->getAbdominal_c(),
             $dados->getQuadril_c(),
             $dados->getPeito_c(),
             $dados->getBraco_cd(),
             $dados->getBraco_ce(),
             $dados->getCoxa_cd(),
             $dados->getCoxa_ce()
            ); 
   
$plot->SetBackgroundColor("#f5f5f5"); 
// Organiza Gráfico -----------------------------
$plot->SetTitle("Circunferencias");
$plot->SetTitleColor("blue");
$plot->SetTitleFontSize(5);
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");


$plot->SetDataColors(array("#B0E0E6","#FFFF00","#98FB98","#FA8072","#FF83FA","#ADFF2F","#FFA07A"));
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
$plot-> data_value_label_angle = 45; // Posicione os rótulos a 45 graus
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
$plot->SetLegend($dados->getAvaliacoes());
$plot->SetLegendPosition(1, 0, 'image', 1, 0, -5, 5);
# Adiciona bordas no grafico
//$plot->SetDrawDataBorders(TRUE);


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

