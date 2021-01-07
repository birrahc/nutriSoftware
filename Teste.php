<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require ('./_app/config.inc.php');
            
            $dieta = new Dietas();
            $cadastrar = new InsercaoBanco();
            $Avalicao = new AvaliacaoMold();
            $Avalicao->setId_Pessoa(2);
            $Avalicao->setAvaliacao(4);
            $Avalicao->setDataAvalicao('2020-07-27');
            $Avalicao->setPeso(99);
            $Avalicao->setC_Cintura(66);
            $Avalicao->setC_Abdominal(44);
           /* $Dados=[
               
               'linha'=>1,
               'dieta_numero'=>1,
               'plano_alimentar'=>'Dieta',
               'paciente'=>11,
               'data_dieta'=>date('Y-m-d'),
               'horario'=>1,
               'alimento'=>2,
               'quantidade'=>4
               'substituicao'=>2,
               'qtd_substituicao'=>1,
               'intervalos'=>2,
               'qtd_intervalo'=>6,
               'anotacoes'=>'Manter Regrada'
              ]; */
                          $Dados=['paciente'=>$Avalicao->getId_Pessoa(),
                         'consulta'=>$Avalicao->getAvaliacao(),
                         'data_avalicao'=>$Avalicao->getDataAvalicao(),
                         'peso'=>$Avalicao->getPeso(),
                         'c_cintura'=>$Avalicao->getC_Cintura(), 
                         'c_abdominal'=>$Avalicao->getC_Abdominal(), 
                         /*'c_quadril'=>$Avaliacao->getC_Quadril(),
                         'c_peito'=>$Avaliacao->getC_Peito(), 
                         'c_braco_d'=>$Avaliacao->getC_Braco_D(), 
                         'c_braco_e'=>$Avaliacao->getC_Braco_E(),
                         'c_coxa_d'=>$Avaliacao->getC_Coxa_D(), 
                         'c_coxa_e'=>$Avaliacao->getC_Coxa_E(), 
                         'dc_triceps'=>$Avaliacao->getDc_Triceps(),
                         'dc_escapular'=>$Avaliacao->getDc_Escapular(), 
                         'dc_supra_iliaca'=>$Avaliacao->getDc_Supra_Iliaca(),
                         'dc_abdominal'=>$Avaliacao->getDc_Abdominal(), 
                         'dc_axilar'=>$Avaliacao->getDc_Axilar(),
                         'dc_peitoral'=>$Avaliacao->getDc_Peitoral(),
                         'dc_coxa'=>$Avaliacao->getDc_Coxa()*/
                        ];
            $cadastrar->ExecutInserir("avaliacao_antropometrica", $Dados);
            var_dump($cadastrar);
        ?>
    </body>
</html>
