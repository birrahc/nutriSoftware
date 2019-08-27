<?php

require_once './phplot.php';
//require_once '../Modelo/AvaliacaoMold.class.php';
require('../config.inc.php');

$Dados = new AvaliacaoMold();
$Avaliacao = new AvaliacaoMold();
//if(isset($_GET['avaliacao'])):
    $Dados->setId_Avaliacao(34);
    $Avaliacao->AvalEspecifica($Dados);
//endif;


    
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura

$plot = new PHPlot(350 , 250);

$data = array(
  array('', $Avaliacao->getMc_graf()),
  array('', $Avaliacao->getGordura()),
  array('', $Avaliacao->getPesoResidual())
  
);

$plot->SetImageBorderType('plain');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
$plot->SetPlotType('pie');

$colors = array('blue', 'red', 'yellow');
$plot->SetDataColors($colors);
$plot->SetLegend(array('Massa Muscular','Gordura','Residual'));
$plot->SetShading(0);
$plot->SetLabelScalePosition(0.2);

$plot->DrawGraph();