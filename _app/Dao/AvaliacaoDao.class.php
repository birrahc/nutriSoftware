<?php

/**
 * Description of AvaliacaoDao
 *
 * @author Birra
 */
class AvaliacaoDao extends Select {
    Private $Ultimo_id;
    
    private $Id_Avaliacao;
    Private $Avaliacao;
    private $Consulta;
    private $Data_Aval;
    
    private $Peso;
    private $C_cintura;
    private $C_abdominal;
    private $C_quadril;
    private $C_peito;
    private $C_braco_d;
    private $C_braco_e;
    private $Coxa_d;
    private $Coxa_e;
    private $Dc_Triceps;
    private $Dc_Escapular;
    private $Dc_Supra_Iliaca;
    private $Dc_Abdominal;
    private $Dc_Axilar;
    private $Dc_Peitoral;
    private $Dc_Coxa;
    private $p_Gordura;
    private $M_Muscular;
    private $Gordura;
    
            
     
    function getUltimo_id() {
        return $this->Ultimo_id;
    }
    
    function getId_Avaliacao() {
        return $this->Id_Avaliacao;
    }

    function getAvaliacao() {
        return $this->Avaliacao;
    }

    function getConsulta() {
        return $this->Consulta;
    }

    function getData_Aval() {
        return $this->Data_Aval;
    }

    function getPeso() {
        return $this->Peso;
    }

    function getC_cintura() {
        return $this->C_cintura;
    }

    function getC_abdominal() {
        return $this->C_abdominal;
    }

    function getC_quadril() {
        return $this->C_quadril;
    }

    function getC_peito() {
        return $this->C_peito;
    }

    function getC_braco_d() {
        return $this->C_braco_d;
    }

    function getC_braco_e() {
        return $this->C_braco_e;
    }

    function getCoxa_d() {
        return $this->Coxa_d;
    }

    function getCoxa_e() {
        return $this->Coxa_e;
    }

    function getDc_Triceps() {
        return $this->Dc_Triceps;
    }

    function getDc_Escapular() {
        return $this->Dc_Escapular;
    }

    function getDc_Supra_Iliaca() {
        return $this->Dc_Supra_Iliaca;
    }

    function getDc_Abdominal() {
        return $this->Dc_Abdominal;
    }

    function getDc_Axilar() {
        return $this->Dc_Axilar;
    }

    function getDc_Peitoral() {
        return $this->Dc_Peitoral;
    }

    function getDc_Coxa() {
        return $this->Dc_Coxa;
    }

    function getP_Gordura() {
        return $this->p_Gordura;
    }

    function getM_Muscular() {
        return $this->M_Muscular;
    }

    function getGordura() {
        return $this->Gordura;
    }

    
        
    public function CadAvalAntropometrica(AvaliacaoAntrometrica $Avaliacao){
       
        $DadosAvalAntro=['paciente'=>$Avaliacao->getId_Paciente(),
                         'consulta'=>$Avaliacao->getAvaliacao(),
                         'data_avalicao'=>$Avaliacao->getDataAvalicao(),
                         'peso'=>$Avaliacao->getPeso(),
                         'c_cintura'=>$Avaliacao->getC_Cintura(), 
                         'c_abdominal'=>$Avaliacao->getC_Abdominal(), 
                         'c_quadril'=>$Avaliacao->getC_Quadril(),
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
                         'dc_coxa'=>$Avaliacao->getDc_Coxa()];
        
        $CadAvalAnt = new InsercaoBanco();
        $CadAvalAnt->ExecutInserir("avaliacao_antropometrica", $DadosAvalAntro);
        echo $CadAvalAnt->getMensagem();
        $this->Ultimo_id = $CadAvalAnt->getResult();
    }
    
     public function VerificaConsulta($CodPaciente) {
        
        $Coluna = ['id_avalicao' => 'id_avalicao',
            'paciente' => 'paciente',
            'nome' => 'nome',
            'consulta' => 'consulta',
            'data_avalicao' => 'data_avalicao'
            ];
        $Termos = "inner join pacientes p on a.paciente = p.id_paciente where paciente='{$CodPaciente}'";
        $ColumTable5 = [];
        $this->ExRead("avalicao_antropometrica a", $Coluna, $Termos, $ColumTable5, 7);
    }


    //==============================================================================================
    //--------------------- ATUALIZAR AVALIAÇÃO ANTROMETRICA --------------------------
    //==============================================================================================
    public function AtualizarAvaliacao(AvaliacaoAntrometrica $Aval) {

        $DadosAvalAntro = ['consulta' => $Aval->getAvaliacao(),
            'data_avalicao' => $Aval->getDataAvalicao(),
            'peso' => $Aval->getPeso(),
            'c_cintura' => $Aval->getC_Cintura(),
            'c_abdominal' => $Aval->getC_Abdominal(),
            'c_quadril' => $Aval->getC_Quadril(),
            'c_peito' => $Aval->getC_Peito(),
            'c_braco_d' => $Aval->getC_Braco_D(),
            'c_braco_e' => $Aval->getC_Braco_E(),
            'c_coxa_d' => $Aval->getC_Coxa_D(),
            'c_coxa_e' => $Aval->getC_Coxa_E(),
            'dc_triceps' => $Aval->getDc_Triceps(),
            'dc_escapular' => $Aval->getDc_Escapular(),
            'dc_supra_iliaca' => $Aval->getDc_Supra_Iliaca(),
            'dc_abdominal' => $Aval->getDc_Abdominal(),
            'dc_axilar' => $Aval->getDc_Axilar(),
            'dc_peitoral' => $Aval->getDc_Peitoral(),
            'dc_coxa' => $Aval->getDc_Coxa(),
            'percentual_gordura' => $Aval->getPercentual_Gordura(),
            'massa_muscular' => $Aval->getM_Muscular(),
            'gordura' => $Aval->getGordura()];

        $AtualAval = new Update();
        $AtualAval->ExUpdate('avalicao_antropometrica', $DadosAvalAntro, "WHERE id_avalicao =:id", 'id=' . $Aval->getId_Avaliacao());

        if ($AtualAval->getResult()):
            echo"{$AtualAval->getRunCount()} dados Atualizados <br>";
        endif;
    }
    
    

    public function ListapacAval($idpac) {
        $Coluna = ['nome' => 'nome'];
        $ColumTable = [];
        $Termos = "where id_paciente='{$idpac}'";
        $this->ExRead("pacientes p", $Coluna, $Termos, $ColumTable, 1);
    }

    public function ListaAvaliacao($idPac,$Tipo) {
        $this->Tipo=$Tipo;
        $Coluna = ['id_avalicao' => 'id_avalicao',
            'id_paciente' => 'id_paciente',
            'nome' => 'nome',
            'consulta' => 'consulta',
            'data_avalicao' => 'data_avalicao',
            'peso' => 'peso',
            'c_cintura' => 'c_cintura',
            'c_abdominal' => 'c_abdominal',
            'c_quadril' => 'c_quadril',
            'c_peito' => 'c_peito',
            'c_braco_d' => 'c_braco_d',
            'c_braco_e' => 'c_braco_e',
            'c_coxa_d' => 'c_coxa_d',
            'c_coxa_e' => 'c_coxa_e',
            'dc_triceps' => 'dc_triceps',
            'dc_escapular' => 'dc_escapular',
            'dc_supra_iliaca' => 'dc_supra_iliaca',
            'dc_abdominal' => 'dc_abdominal',
            'dc_axilar' => 'dc_axilar',
            'dc_peitoral' => 'dc_peitoral',
            'dc_coxa' => 'dc_coxa',
            'percentual_gordura' => 'percentual_gordura',
            'massa_muscular' => 'massa_muscular',
            'gordura' => 'gordura'];
        $Termos = "inner join avalicao_antropometrica a on id_paciente = a.paciente where id_paciente='{$idPac}'";
        $ColumTable5 = [];
        $this->ExRead("pacientes p", $Coluna, $Termos, $ColumTable5, $this->Tipo);
    }

    public function AvalEspecifica($IdAval) {

        $Coluna =
            ['id_avalicao' => 'id_avalicao',
            'id_paciente' => 'id_paciente',
            'nome' => 'nome',
            'consulta' => 'consulta',
            'data_avalicao' => 'data_avalicao',
            'peso' => 'peso',
            'c_cintura' => 'c_cintura',
            'c_abdominal' => 'c_abdominal',
            'c_quadril' => 'c_quadril',
            'c_peito' => 'c_peito',
            'c_braco_d' => 'c_braco_d',
            'c_braco_e' => 'c_braco_e',
            'c_coxa_d' => 'c_coxa_d',
            'c_coxa_e' => 'c_coxa_e',
            'dc_triceps' => 'dc_triceps',
            'dc_escapular' => 'dc_escapular',
            'dc_supra_iliaca' => 'dc_supra_iliaca',
            'dc_abdominal' => 'dc_abdominal',
            'dc_axilar' => 'dc_axilar',
            'dc_peitoral' => 'dc_peitoral',
            'dc_coxa' => 'dc_coxa',
            'percentual_gordura' => 'percentual_gordura',
            'massa_muscular' => 'massa_muscular',
            'gordura' => 'gordura'];
        $Termos = "inner join pacientes p on a.paciente = p.id_paciente where id_avalicao='{$IdAval}'";
        $ColumTable5 = [];
        $this->ExRead("avalicao_antropometrica a", $Coluna, $Termos, $ColumTable5, 3);

       
    }
    
     //==================================================================================================
    //---------------------- DELETA AVALIAÇÃO ----------------------
    //==================================================================================================
    public function DeletaAvaliacao(AvaliacaoAntrometrica $aval){
        
        
        $DeletaAvaliacao = new Delete();
        $DeletaAvaliacao->ExeDelete('avalicao_antropometrica', "WHERE id_avalicao = :id", 'id='.$aval->getId_Avaliacao());
        
        if($DeletaAvaliacao->getResult()):
            echo"{$DeletaAvaliacao->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
   
    public function Syntax() {

        if ($this->Tipo == 1):

          
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                echo "<h2>{$linha['nome']}</h2>";
                
            }
            
       
       elseif ($this->Tipo == 2):
            
            echo"<table border='0'>"
            . "<tr>";
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                $this->Id_Avaliacao = $linha['id_avalicao'];
                $linha['id_paciente'];
                echo "<td id='data'><a href='cadastrarAvaliacao.php?cod_aval={$this->Id_Avaliacao}&idpac={$linha['id_paciente']}'>{$linha['consulta']}° Aval</a></td>";
            }
            echo"</tr>"
            . "<tr>";
            while ($linha = $this->Read_1->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['data_avalicao'] == '' || !$linha['data_avalicao'] == NULL) {
                    echo "<td id='data'>" . date('d/m/Y', strtotime($linha['data_avalicao'])) . "</td>";
                }
            }
            echo"</tr>";
            $i = 1;
            echo"<tr>";
            $peso = 0;
            while ($linha = $this->Read_2->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                if (!$linha['peso'] == '' || !$linha['peso'] == NULL) {
                    echo "<td>{$linha['peso']}</td>";
                }

                $peso = $peso-($peso-$linha['peso']);
            }
            echo"</tr>";

            echo"<tr>"
            . "<td colspan='{$i}'><h3>Circunferências</h3></td>"
            . "</tr>";

            echo"<tr>";
            $C_Cintura = 0;
            while ($linha = $this->Read_3->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_cintura'] == '' || !$linha['c_cintura'] == NULL) {
                    echo"<td>{$linha['c_cintura']}</td>";
                }
                $C_Cintura = $linha['c_cintura'] - $C_Cintura;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Abdominal = 0;
            while ($linha = $this->Read_4->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_abdominal'] == '' || !$linha['c_abdominal'] == NULL) {
                    echo"<td>{$linha['c_abdominal']}</td>";
                }
                $C_Abdominal = $linha['c_abdominal'] - $C_Abdominal;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Quadril = 0;
            while ($linha = $this->Read_5->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_quadril'] == '' || !$linha['c_quadril'] == NULL) {
                    echo"<td>{$linha['c_quadril']}</td>";
                }
                $C_Quadril = $linha['c_quadril'] - $C_Quadril;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Peito = 0;
            while ($linha = $this->Read_6->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_peito'] == '' || !$linha['c_peito'] == NULL) {
                    echo"<td>{$linha['c_peito']}</td>";
                }
                $C_Peito = $linha['c_peito'] - $C_Peito;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Braco_D = 0;
            while ($linha = $this->Read_7->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_braco_d'] == '' || !$linha['c_braco_d'] == NULL) {
                    echo"<td>{$linha['c_braco_d']}</td>";
                }
                $C_Braco_D = $linha['c_braco_d'] - $C_Braco_D;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Braco_E = 0;
            while ($linha = $this->Read_8->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_braco_e'] == '' || !$linha['c_braco_e'] == NULL) {
                    echo"<td>{$linha['c_braco_e']}</td>";
                }
                $C_Braco_E = $linha['c_braco_e'] - $C_Braco_E;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Coxa_D = 0;
            while ($linha = $this->Read_9->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_coxa_d'] == '' || !$linha['c_coxa_d'] == NULL) {
                    echo"<td>{$linha['c_coxa_d']}</td>";
                }
                $C_Coxa_D = $linha['c_coxa_d'] - $C_Coxa_D;
            }
            echo"</tr>";

            echo"<tr>";
            $C_Coxa_E = 0;
            while ($linha = $this->Read_10->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['c_coxa_e'] == '' || !$linha['c_coxa_e'] == NULL) {
                    echo"<td>{$linha['c_coxa_e']}</td>";
                }
                $C_Coxa_E = $linha['c_coxa_e'] - $C_Coxa_E;
            }
            echo"</tr>"
            . "<tr>"
            . "<td colspan='{$i}'><h3>Dobra Cutânia</h3></td>"
            . "</tr>";

            echo"<tr>";
            $DC_Triceps = 0;
            while ($linha = $this->Read_11->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_triceps'] == '' || !$linha['dc_triceps'] == NULL) {
                    echo"<td>{$linha['dc_triceps']}</td>";
                }
                $DC_Triceps = $linha['dc_triceps'] - $DC_Triceps;
            }
            echo"</tr>";

            echo"<tr>";
            $Dc_Escapular = 0;
            while ($linha = $this->Read_12->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_escapular'] == '' || !$linha['dc_escapular'] == NULL) {
                    echo"<td>{$linha['dc_escapular']}</td>";
                }
                $Dc_Escapular = $linha['dc_escapular'] - $Dc_Escapular;
            }
            echo"</td>";

            echo"<tr>";
            $Dc_Supra_Iliaca = 0;
            while ($linha = $this->Read_13->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_supra_iliaca'] == '' || !$linha['dc_supra_iliaca'] == NULL) {
                    echo"<td>{$linha['dc_supra_iliaca']}</td>";
                }
                $Dc_Supra_Iliaca = $linha['dc_supra_iliaca'] - $Dc_Supra_Iliaca;
            }
            echo"</td>";

            echo"<tr>";
            $Dc_Abdominal = 0;
            while ($linha = $this->Read_14->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_abdominal'] == '' || !$linha['dc_abdominal'] == NULL) {
                    echo"<td>{$linha['dc_abdominal']}</td>";
                }
                $Dc_Abdominal = $linha['dc_abdominal'] - $Dc_Abdominal;
            }
            echo"</td>";

            echo"<tr>";
            $Dc_Axilar = 0;
            while ($linha = $this->Read_15->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_axilar'] == '' || !$linha['dc_axilar'] == NULL) {
                    echo"<td>{$linha['dc_axilar']}</td>";
                }
                $Dc_Axilar = $linha['dc_axilar'] - $Dc_Axilar;
            }
            echo"</td>";

            echo"<tr>";
            $Dc_Peitoral = 0;
            while ($linha = $this->Read_16->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_peitoral'] == '' || !$linha['dc_peitoral'] == NULL) {
                    echo"<td>{$linha['dc_peitoral']}</td>";
                }
                $Dc_Peitoral = $linha['dc_peitoral'] - $Dc_Peitoral;
            }
            echo"</td>";

            echo"<tr>";
            $Dc_Coxa = 0;
            while ($linha = $this->Read_17->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_coxa'] == '' || !$linha['dc_coxa'] == NULL) {
                    echo"<td>{$linha['dc_coxa']}</td>";
                }
                $Dc_Coxa = $linha['dc_coxa'] - $Dc_Coxa;
            }
            echo"</td>";

            echo"<tr>";
            $P_Gordura = 0;
            $somatoria=0;
            while ($linha = $this->Read_18->fetch(PDO::FETCH_ASSOC)) {
                 $SomatoriaDC = ($linha['dc_triceps']+$linha['dc_escapular']+$linha['dc_supra_iliaca']+
                        $linha['dc_abdominal']+$linha['dc_axilar']+$linha['dc_peitoral']+$linha['dc_coxa']); 
                 
                 
                $DensidadeHomem = 1.11200000 - (0.00043499 * ($SomatoriaDC)) + (0.00000055 * (pow($SomatoriaDC, 2))) - (0.0002882 * (20));
               
                
                $PercGord = ((4.95 / $DensidadeHomem) - 4.5) * 100;
                $PerForm = number_format($PercGord, 2, '.', '');
                $DensidadeMulher = 1.097 - (0.00046971 * ($SomatoriaDC)) + (0.00000056 * ($SomatoriaDC)^2) - (0.00012828 * (20));
                
             echo"<td>{$PerForm}</td>";
                
                
               
                $P_Gordura = $linha['percentual_gordura'] - $P_Gordura;
            }
            echo"</td>";

            echo"<tr>";
            $M_Muscular = 0;
            while ($linha = $this->Read_19->fetch(PDO::FETCH_ASSOC)) {
                $M_Muscular = number_format($linha['peso'] - (($PercGord/100)*$linha['peso']), 2, '.', '');
                
                    echo"<td>{$M_Muscular}</td>";
                
                
            }
            echo"</td>";

            echo"<tr>";
            $Gordura = 0;
            while ($linha = $this->Read_20->fetch(PDO::FETCH_ASSOC)) {
                $Gordura = number_format(($PercGord/100)*$linha['peso'], 2, '.', '');
                
                    echo"<td>{$Gordura}</td>";
                    
                
            }
            echo"</tr>"
            . "</table>";
            
            
            
            elseif($this->Tipo==11):
           ///////
           $peso = 0;
           $C_Cintura = 0;
           $C_Abdominal = 0;
           $C_Quadril = 0;
           $C_Peito = 0;
           $C_Braco_D = 0;
           $C_Braco_E = 0;
           $C_Coxa_D = 0;
           $C_Coxa_E = 0;
           $DC_Triceps = 0;
           $Dc_Escapular = 0;
           $Dc_Supra_Iliaca = 0;
           $Dc_Abdominal = 0;
           $Dc_Axilar = 0;
           $Dc_Peitoral = 0;
           $Dc_Coxa = 0;
           $P_Gordura = 0;
           $M_Muscular = 0;
           $PercGord=0;
           $Gordura = 0;
           $SomatoriaDC=0;
           $DensidadeHomem=0;
           $DensidadeMulher=0;
            while ($linha = $this->Read_20->fetch(PDO::FETCH_ASSOC)) {
                $linha['id_paciente'];
                $peso =($linha['peso']-$peso);
                
                $C_Cintura = $linha['c_cintura'] - $C_Cintura ;
                $C_Abdominal = $linha['c_abdominal']- $C_Abdominal ;
                $C_Quadril = $linha['c_quadril'] - $C_Quadril;
                $C_Peito =$linha['c_peito'] - $C_Peito;
                $C_Braco_D = $linha['c_braco_d'] - $C_Braco_D;
                $C_Braco_E = $linha['c_braco_e'] - $C_Braco_E;
                $C_Coxa_D = $linha['c_coxa_d'] - $C_Coxa_D ;
                $C_Coxa_E = $linha['c_coxa_e'] - $C_Coxa_E;
                $DC_Triceps =$linha['dc_triceps'] - $DC_Triceps;
                $Dc_Escapular = $linha['dc_escapular'] - $Dc_Escapular;
                $Dc_Supra_Iliaca = $linha['dc_supra_iliaca'] - $Dc_Supra_Iliaca;
                $Dc_Abdominal = $linha['dc_abdominal'] - $Dc_Abdominal;
                $Dc_Axilar = $linha['dc_axilar'] - $Dc_Axilar;
                $Dc_Peitoral = $linha['dc_peitoral'] - $Dc_Peitoral;
                $Dc_Coxa = $linha['dc_coxa'] - $Dc_Coxa;
                $P_Gordura = $linha['percentual_gordura'] - $P_Gordura;
                $M_Muscular = $linha['massa_muscular'] - $M_Muscular;
                $Gordura = $linha['gordura'] - $Gordura;
                
                $SomatoriaDC = $linha['dc_triceps']+$linha['dc_escapular']+$linha['dc_supra_iliaca']+
                        $linha['dc_abdominal']+$linha['dc_axilar']+$linha['dc_peitoral']+$linha['dc_coxa'];            
                $DensidadeHomem = 1.11200000 - (0.00043499 * ($SomatoriaDC)) + (0.00000055 * ($SomatoriaDC)^2) - (0.0002882 * (20));
                $PercGord = (4.95 / ($DensidadeHomem) - 4.5) * 100;
                $DensidadeMulher = 1.097 - (0.00046971 * ($SomatoriaDC)) + (0.00000056 * ($SomatoriaDC)^2) - (0.00012828 * (20));
            }     
                
            echo"<table border='0'>"
            
            . "<tr>"
            . "<td colspan='10' height='10'><h3>Circuferências</h3></td>"
            . "</tr>"
            . "<tr>"
            . "<td><h5>Peso</h5></td>"
            . "<td><h5>Cintura</h5></td>"
            . "<td><h5>Abdominal</h5></td>"
            . "<td><h5>Quadril</h5></td>"
            . "<td><h5>Peito</h5></td>"
            . "<td><h5>Braço D</h5></td>"
            . "<td><h5>Braço E</h5></td>"
            . "<td><h5>Coxa D</h5></td>"
            . "<td colspan='2'><h5>Coxa E</h5></td>"
            . "</tr>"
            . "<tr>";
            if ($peso < 0):
                echo"<td> <font color='blue'><b>{$peso}</b></font></td>";
            elseif ($peso > 0):
                echo"<td ><font color='red'><b>{$peso}</b></font></td>";
            else:
                echo"<td>{$peso}</td>";
            endif;

            if ($C_Cintura < 0):
                echo"<td> <font color='blue'><b>{$C_Cintura}</b></font></td>";
            elseif ($C_Cintura > 0):
                echo"<td ><font color='red'><b>{$C_Cintura}</b></font></td>";
            else:
                echo"<td>{$C_Cintura}</td>";
            endif;

            if ($C_Abdominal < 0):
                echo"<td> <font color='blue'><b>{$C_Abdominal}</b></font></td>";
            elseif ($C_Abdominal > 0):
                echo"<td ><font color='red'><b>{$C_Abdominal}</b></font></td>";
            else:
                echo"<td>{$C_Abdominal}</td>";
            endif;

            if ($C_Quadril < 0):
                echo"<td> <font color='blue'><b>{$C_Quadril}</b></font></td>";
            elseif ($C_Quadril > 0):
                echo"<td ><font color='red'><b>{$C_Quadril}</b></font></td>";
            else:
                echo"<td>{$C_Quadril}</td>";
            endif;

            if ($C_Peito < 0):
                echo"<td> <font color='blue'><b>{$C_Peito}</b></font></td>";
            elseif ($C_Peito > 0):
                echo"<td ><font color='red'><b>{$C_Quadril}</b></font></td>";
            else:
                echo"<td>{$C_Peito}</td>";
            endif;

            if ($C_Braco_D < 0):
                echo"<td> <font color='blue'><b>{$C_Braco_D}</b></font></td>";
            elseif ($C_Braco_D > 0):
                echo"<td ><font color='red'><b>{$C_Braco_D}</b></font></td>";
            else:
                echo"<td>{$C_Braco_D}</td>";
            endif;

            if ($C_Braco_E < 0):
                echo"<td> <font color='blue'><b>{$C_Braco_E}</b></font></td>";
            elseif ($C_Braco_E > 0):
                echo"<td ><font color='red'><b>{$C_Braco_E}</b></font></td>";
            else:
                echo"<td>{$C_Braco_E}</td>";
            endif;

            if ($C_Coxa_D < 0):
                echo"<td> <font color='blue'><b>{$C_Coxa_D}</b></font></td>";
            elseif ($C_Coxa_D > 0):
                echo"<td ><font color='red'><b>{$C_Coxa_D}</b></font></td>";
            else:
                echo"<td>{$C_Coxa_D}</td>";
            endif;

            if ($C_Coxa_E < 0):
                echo"<td colspan='2'> <font color='blue'><b>{$C_Coxa_E}</b></font></td>";
            elseif ($C_Coxa_E > 0):
                echo"<td colspan='2'><font color='red'><b>{$C_Coxa_E}</b></font></td>";
            else:
                echo"<td>{$C_Coxa_E}</td>";
            endif;

            echo"</tr>"
            . "<tr>"
            . "<td colspan='10' height='10'><h3>Dobra Cutânea</h3></td>"
            . "</tr>"
            . "<tr>"
            . "<td><h5>Triceps</h5></td>"
            . "<td><h5>Escapular</h5></td>"
            . "<td><h5>Supra Iliaca</h5></td>"
            . "<td><h5>Abdominal</h5></td>"
            . "<td><h5>Axilar</h5></td>"
            . "<td><h5>Peitoral</h5></td>"
            . "<td><h5>Coxa</h5></td>"
            . "<td><h5>% Gordura</h5></td>"
            . "<td><h5>M.Muscular</h5></td>"
            . "<td><h5>Gordura</h5></td>"
            . "</tr>"
            . "<tr>"
            . "<td>{$DC_Triceps}</td>"
            . "<td>{$Dc_Escapular}</td>"
            . "<td>{$Dc_Supra_Iliaca}</td>"
            . "<td>{$Dc_Abdominal}</td>"
            . "<td>{$Dc_Axilar}</td>"
            . "<td>{$Dc_Peitoral}</td>"
            . "<td>{$Dc_Coxa}</td>"
            . "<td>{$PercGord}</td>"
            . "<td>{$M_Muscular}</td>"
            . "<td>{$Gordura}</td>"
            . "</tr>"
            . "</table>";
            
////////////////////////////////////////////////////
         //Dados para atualizaçao//
        elseif ($this->Tipo == 3):
            
        while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
            $this->Id_Avaliacao = $linha['id_avalicao'];
            $this->Data_Aval = $linha['data_avalicao'];
            $this->Avaliacao = $linha['consulta'];
            $this->Peso = $linha['peso'];
            $this->C_cintura = $linha['c_cintura'];
            $this->C_abdominal = $linha['c_abdominal'];
            $this->C_quadril = $linha['c_quadril'];
            $this->C_peito = $linha['c_peito'];
            $this->C_braco_d = $linha['c_braco_d'];
            $this->C_braco_e = $linha['c_braco_e'];
            $this->Coxa_d = $linha['c_coxa_d'];
            $this->Coxa_e = $linha['c_coxa_e'];
            $this->Dc_Triceps = $linha['dc_triceps'];
            $this->Dc_Escapular = $linha['dc_escapular'];
            $this->Dc_Supra_Iliaca = $linha['dc_supra_iliaca'];
            $this->Dc_Abdominal = $linha['dc_abdominal'];
            $this->Dc_Axilar = $linha['dc_axilar'];
            $this->Dc_Peitoral = $linha['dc_peitoral'];
            $this->Dc_Coxa = $linha['dc_coxa'];
            $this->p_Gordura = $linha['percentual_gordura'];
            $this->M_Muscular = $linha['massa_muscular'];
            $this->Gordura = $linha['gordura'];
            
        }
            
        elseif ($this->Tipo == 22):
            $i = 1;
            $td = 1;
            
         echo"<tr>";
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                echo"<td colspan='2'>"
                    . "<h3>{$linha['nome']}</h3>"
                    . "<input type='hidden' name='id_pacup' value='{$linha['id_paciente']}'/>"
                    . "<input type='hidden' name='id_avaliacaoup' value='{$linha['id_avalicao']}'/>"
                    . "</td>"
                . "</tr>"
                        
                . "<tr>";
                echo "<th>Avaliações</th>"
                . "<td id='data'><input type='text' name='n_consulta' value='{$linha['consulta']}'/></td>"
                . "</tr>"
                . "<tr>";

                echo "<th>Data</th>"
                . "<td id='data'><input type='date' name='dataup' value='{$linha['data_avalicao']}'/></td>";

                echo"</tr>"
                . "<tr>";


                echo "<td><h5>Peso</h5></td>"
                . "<td><input type='text' name='pesoup' value='{$linha['peso']}'/></td>";

                echo"</tr>";

                if ($td = 1) {

                    echo"<tr>"
                    . "<td colspan='{$i}'><h3>Circunferências</h3></td>"
                    . "</tr>";
                }


                echo"<tr>"
                . "<td><h5>C.cintura</h5></td>"
                . "<td><input type='text' name='c_cinturaup' value='{$linha['c_cintura']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Abdominal</h5></td>"
                . "<td><input type='text' name='c_abdominalup' value='{$linha['c_abdominal']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Quadril</h5></td>"
                . "<td><input type='text' name='c_quadrilup' value='{$linha['c_quadril']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Peito</h5></td>"
                . "<td><input type='text' name='c_peitoup' value='{$linha['c_peito']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Braço D</h5></td>"
                . "<td><input type='text' name='c_braco_dup' value='{$linha['c_braco_d']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Braço E</h5></td>"
                . "<td><input type='text' name='c_braco_eup' value='{$linha['c_braco_e']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Coxa D</h5></td>"
                . "<td><input type='text' name='c_coxa_dup' value='{$linha['c_coxa_d']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>C.Coxa E</h5></td>"
                . "<td><input type='text' name='c_coxa_eup' value='{$linha['c_coxa_e']}'/></td>"
                . "</tr>";


                if ($td == 1) {

                    echo"<tr>"
                    . "<td colspan='{$i}'><h3>Dobra Cutânia</h3></td>"
                    . "</tr>";
                }


                echo"<tr>"
                . "<td><h5>DC Triceps</h5></td>"
                . "<td><input type='text' name='dc_tricepsup' value='{$linha['dc_triceps']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Escapular</h5></td>"
                . "<td><input type='text' name='dc_escapularup' value='{$linha['dc_escapular']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Supra Iliaca</h5></td>"
                . "<td><input type='text' name='dc_supra_iliacaup' value='{$linha['dc_supra_iliaca']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Abdominal</h5></td>"
                . "<td><input type='text' name='dc_abdominalup' value='{$linha['dc_abdominal']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Axilar</h5></td>"
                . "<td><input type='text' name='dc_axilarup' value='{$linha['dc_axilar']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Peitoral</h5></td>"
                . "<td><input type='text' name='dc_peitoralup' value='{$linha['dc_peitoral']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>DC Coxa</h5></td>"
                . "<td><input type='text' name='dc_coxaup' value='{$linha['dc_coxa']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>% Gordura</h5></td>"
                . "<td><input type='text' name='perc_gorduraup' value='{$linha['percentual_gordura']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>M.Muscular</h5></td>"
                . "<td><input type='text' name='m_muscularup' value='{$linha['massa_muscular']}'/></td>"
                . "</tr>";



                echo"<tr>"
                . "<td><h5>Gordura</h5></td>"
                . "<td><input type='text' name='gorduraup' value='{$linha['gordura']}'/></td>"
                . "</tr>";
            }

            
            

            elseif($this->Tipo==4):
             
            echo "<table border='0'>"
            . "<tr>"
            . "<td id='itens'><h5>Avaliações</h5></td>";
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                $this->Id_Avaliacao = $linha['id_avalicao'];
                $linha['id_paciente'];
                echo "<td id='data'><a href='cadastrarAvaliacao.php?cod_aval={$this->Id_Avaliacao}&idpac={$linha['id_paciente']}'>{$linha['consulta']}° Aval</a></td>";
            }
            echo"</tr>"
            . "<tr>"
            . "<td id='itens'><h5>Data</h5></td>";
            while ($linha = $this->Read_1->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['data_avalicao'] == '' || !$linha['data_avalicao'] == NULL) {
                    echo "<td id='data'>" . date('d/m/Y', strtotime($linha['data_avalicao'])) . "</td>";
                }
            }
            echo"</tr>";
            $i = 1;
            echo"<tr>"
            . "<td id='itens'><h5>Peso</h5></td>";
            $peso = 0;
            while ($linha = $this->Read_2->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                if (!$linha['peso'] == '' || !$linha['peso'] == NULL) {
                    echo "<td>{$linha['peso']}</td>";
                }

                $peso = $peso-$linha['peso'];
            }
            echo"</tr>";

            echo"<tr>"
            . "<td colspan='{$i}'><h3>Circunferências</h3></td>"
            . "</tr>";

            echo"<tr>"
            . "<td id='itens'><h5>C.cintura</h5></td>";
            $C_Cintura = 0;
            while ($linha = $this->Read_3->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_cintura'] == '' || !$linha['c_cintura'] == NULL) {
                    echo"<td>{$linha['c_cintura']}</td>";
                }
                $C_Cintura = $linha['c_cintura'] - $C_Cintura;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Abdominal</h5></td>";
            $C_Abdominal = 0;
            while ($linha = $this->Read_4->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_abdominal'] == '' || !$linha['c_abdominal'] == NULL) {
                    echo"<td>{$linha['c_abdominal']}</td>";
                }
                $C_Abdominal = $linha['c_abdominal'] - $C_Abdominal;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Quadril</h5></td>";
            $C_Quadril = 0;
            while ($linha = $this->Read_5->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_quadril'] == '' || !$linha['c_quadril'] == NULL) {
                    echo"<td>{$linha['c_quadril']}</td>";
                }
                $C_Quadril = $linha['c_quadril'] - $C_Quadril;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Peito</h5></td>";
            $C_Peito = 0;
            while ($linha = $this->Read_6->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_peito'] == '' || !$linha['c_peito'] == NULL) {
                    echo"<td>{$linha['c_peito']}</td>";
                }
                $C_Peito = $linha['c_peito'] - $C_Peito;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Braço D</h5></td>";
            $C_Braco_D = 0;
            while ($linha = $this->Read_7->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_braco_d'] == '' || !$linha['c_braco_d'] == NULL) {
                    echo"<td>{$linha['c_braco_d']}</td>";
                }
                $C_Braco_D = $linha['c_braco_d'] - $C_Braco_D;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Braço E</h5></td>";
            $C_Braco_E = 0;
            while ($linha = $this->Read_8->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_braco_e'] == '' || !$linha['c_braco_e'] == NULL) {
                    echo"<td>{$linha['c_braco_e']}</td>";
                }
                $C_Braco_E = $linha['c_braco_e'] - $C_Braco_E;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Coxa D</h5></td>";
            $C_Coxa_D = 0;
            while ($linha = $this->Read_9->fetch(PDO::FETCH_ASSOC)) {
                if (!$linha['c_coxa_d'] == '' || !$linha['c_coxa_d'] == NULL) {
                    echo"<td>{$linha['c_coxa_d']}</td>";
                }
                $C_Coxa_D = $linha['c_coxa_d'] - $C_Coxa_D;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>C.Coxa E</h5></td>";
            $C_Coxa_E = 0;
            while ($linha = $this->Read_10->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['c_coxa_e'] == '' || !$linha['c_coxa_e'] == NULL) {
                    echo"<td>{$linha['c_coxa_e']}</td>";
                }
                $C_Coxa_E = $linha['c_coxa_e'] - $C_Coxa_E;
            }
            echo"</tr>"
            . "<tr>"
            . "<td colspan='{$i}'><h3>Dobra Cutânia</h3></td>"
            . "</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Triceps</h5></td>";
            $DC_Triceps = 0;
            while ($linha = $this->Read_11->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_triceps'] == '' || !$linha['dc_triceps'] == NULL) {
                    echo"<td>{$linha['dc_triceps']}</td>";
                }
                $DC_Triceps = $linha['dc_triceps'] - $DC_Triceps;
            }
            echo"</tr>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Escapular</h5></td>";
            $Dc_Escapular = 0;
            while ($linha = $this->Read_12->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_escapular'] == '' || !$linha['dc_escapular'] == NULL) {
                    echo"<td>{$linha['dc_escapular']}</td>";
                }
                $Dc_Escapular = $linha['dc_escapular'] - $Dc_Escapular;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Supra Iliaca</h5></td>";
            $Dc_Supra_Iliaca = 0;
            while ($linha = $this->Read_13->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_supra_iliaca'] == '' || !$linha['dc_supra_iliaca'] == NULL) {
                    echo"<td>{$linha['dc_supra_iliaca']}</td>";
                }
                $Dc_Supra_Iliaca = $linha['dc_supra_iliaca'] - $Dc_Supra_Iliaca;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Abdominal</h5></td>";
            $Dc_Abdominal = 0;
            while ($linha = $this->Read_14->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_abdominal'] == '' || !$linha['dc_abdominal'] == NULL) {
                    echo"<td>{$linha['dc_abdominal']}</td>";
                }
                $Dc_Abdominal = $linha['dc_abdominal'] - $Dc_Abdominal;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Axilar</h5></td>";
            $Dc_Axilar = 0;
            while ($linha = $this->Read_15->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_axilar'] == '' || !$linha['dc_axilar'] == NULL) {
                    echo"<td>{$linha['dc_axilar']}</td>";
                }
                $Dc_Axilar = $linha['dc_axilar'] - $Dc_Axilar;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Peitoral</h5></td>";
            $Dc_Peitoral = 0;
            while ($linha = $this->Read_16->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_peitoral'] == '' || !$linha['dc_peitoral'] == NULL) {
                    echo"<td>{$linha['dc_peitoral']}</td>";
                }
                $Dc_Peitoral = $linha['dc_peitoral'] - $Dc_Peitoral;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>DC Coxa</h5></td>";
            $Dc_Coxa = 0;
            while ($linha = $this->Read_17->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['dc_coxa'] == '' || !$linha['dc_coxa'] == NULL) {
                    echo"<td>{$linha['dc_coxa']}</td>";
                }
                $Dc_Coxa = $linha['dc_coxa'] - $Dc_Coxa;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>% Gordura</h5></td>";
            $P_Gordura = 0;
            while ($linha = $this->Read_18->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['percentual_gordura'] == '' || !$linha['percentual_gordura'] == NULL) {
                    echo"<td>{$linha['percentual_gordura']}</td>";
                }
                $P_Gordura = $linha['percentual_gordura'] - $P_Gordura;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>M.Muscular</h5></td>";
            $M_Muscular = 0;
            while ($linha = $this->Read_19->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['massa_muscular'] == '' || !$linha['massa_muscular'] == NULL) {
                    echo"<td>{$linha['massa_muscular']}</td>";
                }
                $M_Muscular = $linha['massa_muscular'] - $M_Muscular;
            }
            echo"</td>";

            echo"<tr>"
            . "<td id='Itens'><h5>Gordura</h5></td>";
            $Gordura = 0;
            while ($linha = $this->Read_20->fetch(PDO::FETCH_ASSOC)) {
                //$id=(int)$linha['id_consulta'];
                if (!$linha['gordura'] == '' || !$linha['gordura'] == NULL) {
                    echo"<td>{$linha['gordura']}</td>";
                }
                $Gordura = $linha['gordura'] - $Gordura;
            }
            echo"</tr>"
            . "</table>";
            
           elseif($this->Tipo==6):
             $this->Consulta=1;           
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                
            $linha['consulta'];
            $linha['paciente'];

                if($linha['paciente']>0){
                    $this->Consulta=$linha['consulta']+1;
                }
        
            }
            
            elseif($this->Tipo==7):
                    $this->Consulta=1;           
                    while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                
                        $linha['consulta'];
                        $linha['paciente'];

                        if($linha['paciente']>0){
                            $this->Consulta=$linha['consulta']+1;
                        }
                    }
                $this->getConsulta();
        endif;
    }

}
