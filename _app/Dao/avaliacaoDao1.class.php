<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of avaliacaoDao1
 *
 * @author Birra
 */
class avaliacaoDao1 extends Select{
    private $CodAvaliacao;
    private $CodPac;
    Private $Paciente;
    private $idade;
            
    function getIdade() {
        return $this->idade;
    }

        function getCodAvaliacao() {
        return $this->CodAvaliacao;
    }
    
    function getCodPac() {
        return $this->CodPac;
    }
    
    function getPaciente() {
        return $this->Paciente;
    }

    
    
    public function ListaAvaliacao(Paciente1 $paciente) {
        
        $Coluna = ['id_avalicao' => 'id_avalicao',
            'id_paciente' => 'id_paciente',
            'nome' => 'p.nome',
            'data_nascimento'=>'p.data_nascimento',
            'sexo'=>'s.sexo',
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
            'dc_coxa' => 'dc_coxa'
            ];
        $Termos = "inner join avaliacao_antropometrica a on p.id_paciente=a.paciente
                    inner join sexo s on p.sexo= s.id_sexo 
                    where id_paciente='{$paciente->getIdPessoa()}'";
                    
        $ColumTable5 = [];
        $this->ExRead("pacientes p", $Coluna, $Termos, $ColumTable5, 1);
    }


    public function Syntax() {
        $avaliacao= new Avaliacao();
         while ($linha = $this->Read_22->fetch(PDO::FETCH_ASSOC)):
            $avaliacao->setId_Avaliacao($linha['id_avalicao']);
            $avaliacao->setIdPessoa($linha['id_paciente']);
            $avaliacao->setNome($linha['nome']);
            $avaliacao->setData_Nascimento($linha['data_nascimento']);
            $avaliacao->setIdade($linha['data_nascimento']);
            $avaliacao->setSexo($linha['sexo']);
            $avaliacao->setAvaliacao($linha['consulta']);
            $avaliacao->setDataAvalicao($linha['data_avalicao']);
            $avaliacao->setPeso($linha['peso']);
            $avaliacao->setC_Cintura($linha['c_cintura']);
            $avaliacao->setC_Abdominal($linha['c_abdominal']);
            $avaliacao->setC_Quadril($linha['c_quadril']);
            $avaliacao->setC_Peito($linha['c_peito']);
            $avaliacao->setC_Braco_D($linha['c_braco_d']);
            $avaliacao->setC_Braco_E($linha['c_braco_e']);
            $avaliacao->setC_Coxa_D($linha['c_coxa_d']);
            $avaliacao->setC_Coxa_E($linha['c_coxa_e']);
            $avaliacao->setDc_Triceps($linha['dc_triceps']);
            $avaliacao->setDc_Escapular($linha['dc_escapular']);
            $avaliacao->setDc_Supra_Iliaca($linha['dc_supra_iliaca']);
            $avaliacao->setDc_Abdominal($linha['dc_abdominal']);
            $avaliacao->setDc_Axilar($linha['dc_axilar']);
            $avaliacao->setDc_Peitoral($linha['dc_peitoral']);
            $avaliacao->setDc_Coxa($linha['dc_coxa']);
            $avaliacao->setIdade($linha['data_nascimento']);
            
            $avaliacao->calculos();
            
            $this->CodAvaliacao=$avaliacao->getId_Avaliacao();
            $this->CodPac=$avaliacao->getIdPessoa();
            $this->idade=$avaliacao->getIdade();
        endwhile;
        
       
        if($this->Tipo==1):
        echo"<table border='0'>"
            . "<tr>";
                    while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                        $this->Id_Avaliacao = $linha['id_avalicao'];
                        $linha['id_paciente'];
                        echo "<td id='data'><a href='cadastrarAvaliacao.php?cod_aval={$avaliacao->getId_Avaliacao()}&idpac={$avaliacao->getIdPessoa()}'>{$avaliacao->getAvaliacao()}° Aval</a></td>";
                    }
            echo"<tr>";
                    while ($linha = $this->Read_1->fetch(PDO::FETCH_ASSOC)) {
                        echo "<td id='data'>" . date('d/m/Y', strtotime($avaliacao->getDataAvalicao())) . "</td>";
                    }
            echo"</tr>";
            
            $i = 1;
            echo"<tr>";
                    while ($linha = $this->Read_2->fetch(PDO::FETCH_ASSOC)) {
                        $i++;
                        echo "<td>{$avaliacao->getPeso()}</td>";
                    }
            echo"</tr>";

            echo"<tr>"
                    . "<td colspan='{$i}'><h3>Circunferências</h3></td>"
            . "</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_3->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Cintura()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_4->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Abdominal()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_5->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Quadril()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_6->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Peito()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_7->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Braco_D()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_8->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Braco_E()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_9->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Coxa_D()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_10->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getC_Coxa_E()}</td>";
                    }
            echo"</tr>"
                    
                . "<tr>"
                            . "<td colspan='{$i}'><h3>Dobra Cutânia</h3></td>"
                . "</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_11->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Triceps()}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_12->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Escapular()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_13->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Supra_Iliaca()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_14->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Abdominal()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_15->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Axilar()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_16->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Peitoral()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_17->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$avaliacao->getDc_Coxa()}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_18->fetch(PDO::FETCH_ASSOC)) {
                        $PercGordura=number_format($avaliacao->getPercentual_Gordura(), 1, ',', '');
                        echo"<td>{$PercGordura}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_19->fetch(PDO::FETCH_ASSOC)) {
                        $Mmuscular=number_format($avaliacao->getM_Muscular(), 1, ',', '');
                        echo"<td>{$Mmuscular}</td>";
                    }
            echo"</td>";

            echo"<tr>";
                    while ($linha = $this->Read_20->fetch(PDO::FETCH_ASSOC)) {
                            $Gordura=number_format($avaliacao->getGordura(), 1, ',', '');
                            echo"<td>{$Gordura}</td>";
                    }
            echo"</tr>"
        . "</table>";
            
    
        endif;
         
        
    }

}
