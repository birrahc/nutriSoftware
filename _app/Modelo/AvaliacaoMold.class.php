<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AvaliacaoMold
 *
 * @author Birra
 */
class AvaliacaoMold extends PessoaMold{
    private $Ultimo_Registro;
    private $Id_Avaliacao;
    private $Avaliacao;
    private $DataAvalicao;
    private $Peso;
    private $C_Cintura;
    private $C_Abdominal;
    private $C_Quadril;
    private $C_Peito;
    private $C_Braco_D;
    private $C_Braco_E;
    private $C_Coxa_D;
    private $C_Coxa_E;
    private $Dc_Triceps;
    private $Dc_Escapular;
    private $Dc_Supra_Iliaca;
    private $Dc_Abdominal;
    private $Dc_Axilar;
    private $Dc_Peitoral;
    private $Dc_Coxa;
    private $Percentual_Gordura;
    private $M_Muscular;
    private $Gordura;
    private $Obs_Avalicao;
    Private $Densidade;
    private $SomatoriaDc;
    
    private $Mc_graf;
    private $PesoResidual;
    


    private $Consulta;
    
    private $Coluna;
    private $Table;
     
    function __construct() {
        $this->Coluna = [
                    'id_avalicao' => 'id_avalicao',
                    'id_paciente' => 'id_paciente',
                    'paciente'=>'paciente',
                    'nome' => 'p.nome',
                    'altura'=>'altura',
                    'data_nascimento'=>'p.data_nascimento',
                    's.sexo'=>'s.sexo as sexo',
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
            
            ];
        
            $this->Table = [];
    }
    
    function getUltimo_Registro() {
        return $this->Ultimo_Registro;
    }

        
    function getId_Avaliacao() {
        return $this->Id_Avaliacao;
    }
    function getAvaliacao() {
        return $this->Avaliacao;
    }

    
    function getDataAvalicao() {
        return $this->DataAvalicao;
    }

    function getPeso() {
        return $this->Peso;
    }

    function getC_Cintura() {
        return $this->C_Cintura;
    }

    function getC_Abdominal() {
        return $this->C_Abdominal;
    }

    function getC_Quadril() {
        return $this->C_Quadril;
    }

    function getC_Peito() {
        return $this->C_Peito;
    }

    function getC_Braco_D() {
        return $this->C_Braco_D;
    }

    function getC_Braco_E() {
        return $this->C_Braco_E;
    }

    function getC_Coxa_D() {
        return $this->C_Coxa_D;
    }

    function getC_Coxa_E() {
        return $this->C_Coxa_E;
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

    function getPercentual_Gordura() {
        return $this->Percentual_Gordura;
    }

    function getM_Muscular() {
        return $this->M_Muscular;
    }

    function getGordura() {
        return $this->Gordura;
    }
    
    function getObs_Avalicao() {
        return $this->Obs_Avalicao;
    }

    
                function getMc_graf() {
        return $this->Mc_graf;
    }

    function getPesoResidual() {
        return $this->PesoResidual;
    }

        
    function getConsulta() {
        return $this->Consulta;
    }

    function getColunas() {
        return $this->Colunas;
    }

    function getTable() {
        return $this->Table;
    }
    
            
    function setId_Avaliacao($Id_Avaliacao) {
        $this->Id_Avaliacao = $Id_Avaliacao;
    }

    
    
    
    function setAvaliacao($Avaliacao) {
        $this->Avaliacao = ((int) $Avaliacao ? $Avaliacao:'Somente Numeros');
    }

    
    function setDataAvalicao($DataAvalicao) {
        $this->DataAvalicao = $DataAvalicao;
    }

    function setPeso($Peso) {
        $this->Peso = str_replace(",", ".", $Peso);
        /*$this->Cpf = str_replace("-","", $limpa);
        $this->Peso = ((float) $Peso ? $Peso:'Somente Numeros');*/
    }

    function setC_Cintura($C_Cintura) {
        $this->C_Cintura = str_replace(",", ".", $C_Cintura);;
    }

    function setC_Abdominal($C_Abdominal) {
        $this->C_Abdominal = str_replace(",", ".", $C_Abdominal);
    }

    function setC_Quadril($C_Quadril) {
        $this->C_Quadril = str_replace(",", ".", $C_Quadril);
    }

    function setC_Peito($C_Peito) {
        $this->C_Peito = str_replace(",", ".", $C_Peito);
    }

    function setC_Braco_D($C_Braco_D) {
        $this->C_Braco_D = str_replace(",", ".", $C_Braco_D);
    }

    function setC_Braco_E($C_Braco_E) {
        $this->C_Braco_E = str_replace(",", ".", $C_Braco_E);
    }

    function setC_Coxa_D($C_Coxa_D) {
        $this->C_Coxa_D = str_replace(",", ".", $C_Coxa_D);
    }

    function setC_Coxa_E($C_Coxa_E) {
        $this->C_Coxa_E = str_replace(",", ".", $C_Coxa_E);
    }

    function setDc_Triceps($Dc_Triceps) {
        $this->Dc_Triceps = str_replace(",", ".", $Dc_Triceps);
    }

    function setDc_Escapular($Dc_Escapular) {
        $this->Dc_Escapular = str_replace(",", ".", $Dc_Escapular);
    }

    function setDc_Supra_Iliaca($Dc_Supra_Iliaca) {
        $this->Dc_Supra_Iliaca = str_replace(",", ".", $Dc_Supra_Iliaca);
    }

    function setDc_Abdominal($Dc_Abdominal) {
        $this->Dc_Abdominal = str_replace(",", ".", $Dc_Abdominal);
    }

    function setDc_Axilar($Dc_Axilar) {
        $this->Dc_Axilar = str_replace(",", ".", $Dc_Axilar);
    }

    function setDc_Peitoral($Dc_Peitoral) {
        $this->Dc_Peitoral = str_replace(",", ".", $Dc_Peitoral);
    }

    function setDc_Coxa($Dc_Coxa) {
        $this->Dc_Coxa = str_replace(",", ".", $Dc_Coxa);
    }
    
    function setObs_Avalicao($Obs_Avalicao) {
        $this->Obs_Avalicao = $Obs_Avalicao;
    }

        
    public function VerificaConsulta(AvaliacaoMold $paciente) {
        
        $Termos = "inner join pacientes p on a.paciente = p.id_paciente "
                . "inner join sexo s on p.sexo= s.id_sexo where paciente='{$paciente->getId_Pessoa()}'";
        $this->ExRead("avaliacao_antropometrica a", $this->Coluna, $Termos, $this->Table,8);
    }
    
    function calculos(){
        if($this->Dc_Triceps !== '' && $this->Dc_Triceps ==!null 
          && $this->Dc_Escapular !=='' && $this->Dc_Escapular !== null
          && $this->Dc_Supra_Iliaca !== '' && $this->Dc_Supra_Iliaca !== null
          && $this->Dc_Abdominal !== '' && $this->Dc_Abdominal !== null
          && $this->Dc_Axilar !== '' && $this->Dc_Axilar !== null
          && $this->Dc_Peitoral !== '' && $this->Dc_Peitoral !== null
          && $this->Dc_Coxa !== '' && $this->Dc_Coxa !== null):
            $this->SomatoriaDc = ($this->getDc_Triceps()+
                                  $this->getDc_Escapular()+
                                  $this->getDc_Supra_Iliaca()+
                                  $this->getDc_Abdominal()+
                                  $this->getDc_Axilar()+
                                  $this->getDc_Peitoral()+
                                  $this->getDc_Coxa()); 
                                 
        
            $DensidadeHomem = 1.11200000 - 
                           (0.00043499 * ($this->SomatoriaDc)) + 
                           (0.00000055 * (pow($this->SomatoriaDc,2))) - 
                           (0.0002882 * ($this->getIdade()));

            $DensidadeMulher = 1.097 - 
                              (0.00046971 * ($this->SomatoriaDc)) + 
                              (0.00000056 * (pow($this->SomatoriaDc, 2))) - 
                              (0.00012828 * ($this->getIdade()));

            if($this->getSexo()=="M"):
                 $this->Densidade=$DensidadeHomem;

             elseif($this->getSexo()=="F"):
                 $this->Densidade=$DensidadeMulher;
            endif;

            $this->Percentual_Gordura = ((4.95 / $this->Densidade) - 4.5) * 100;

            $this->M_Muscular = $this->Peso - (($this->Percentual_Gordura/100)*$this->Peso);

            $this->Gordura =($this->Percentual_Gordura/100)*$this->Peso;
            
        else:
        $this->Percentual_Gordura=0;
        $this->M_Muscular=0;
        $this->Gordura=0;
        endif;
    }
   
    public function CalcGrafico(){
        if($this->getSexo()=="M"):
            $this->PesoResidual = $this->getPeso() * 0.241;
        elseif($this->getSexo()=="F"):
            $this->PesoResidual = $this->getPeso() * 0.209; 
        endif;
        
        $this->Mc_graf = $this->getM_Muscular() - $this->PesoResidual;
    }

    public function ListaAvaliacao(AvaliacaoMold $paciente,$tipo) {
        $this->Tipo=$tipo;
        $Termos = "inner join avaliacao_antropometrica a on p.id_paciente=a.paciente
                    inner join sexo s on p.sexo= s.id_sexo 
                    where id_paciente='{$paciente->getId_Pessoa()}'
					ORDER BY data_avalicao ASC";
                    
        $this->ExRead("pacientes p", $this->Coluna, $Termos, $this->Table, $this->Tipo);
    }
    
    public function AvalEspecifica(AvaliacaoMold $Aval) {
        $Termos = "inner join pacientes p on a.paciente= p.id_paciente "
                . "inner join sexo s on p.sexo = s.id_sexo where id_avalicao='{$Aval->getId_Avaliacao()}'
				ORDER BY data_avalicao ASC";
        $this->ExRead("avaliacao_antropometrica a", $this->Coluna, $Termos, $this->Table);
    }

    
    public function Syntax() {
        while ($linha = $this->Read_22->fetch(PDO::FETCH_ASSOC)):
            $this->Id_Avaliacao = $linha['id_avalicao'];
            $this->setId_Pessoa($linha['paciente']);
            $this->setNome($linha['nome']);
            $this->setData_Nascimento($linha['data_nascimento']);
            $this->setIdade($linha['data_nascimento']);
            $this->setAltura($linha['altura']);
            $this->setSexo($linha['sexo']);
            $this->Avaliacao = $linha['consulta'];
            $this->DataAvalicao = $linha['data_avalicao'];
            $this->Peso = $linha['peso'];
            $this->C_Cintura = $linha['c_cintura'];
            $this->C_Abdominal = $linha['c_abdominal'];
            $this->C_Quadril = $linha['c_quadril'];
            $this->C_Peito = $linha['c_peito'];
            $this->C_Braco_D = $linha['c_braco_d'];
            $this->C_Braco_E = $linha['c_braco_e'];
            $this->C_Coxa_D = $linha['c_coxa_d'];
            $this->C_Coxa_E = $linha['c_coxa_e'];
            $this->Dc_Triceps = $linha['dc_triceps'];
            $this->Dc_Escapular = $linha['dc_escapular'];
            $this->Dc_Supra_Iliaca = $linha['dc_supra_iliaca'];
            $this->Dc_Abdominal = $linha['dc_abdominal'];
            $this->Dc_Axilar = $linha['dc_axilar'];
            $this->Dc_Peitoral = $linha['dc_peitoral'];
            $this->Dc_Coxa = $linha['dc_coxa'];
            
            
            $this->calculos();
        endwhile;
        
       
        if($this->Tipo==1):
            
              $conta_largura="0"; 
            while ($linha = $this->Read_21->fetch(PDO::FETCH_ASSOC)) {
                $conta_largura++;
            }
            
            //Aumentando a div conforme o conteudo
            $conta_largura = $conta_largura*81;
           echo"<div style='width:{$conta_largura}px; height:auto;' class='tableCadAval'>";
        
            while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                $this->setId_Avaliacao($linha['id_avalicao']);
                    $this->setId_Pessoa($linha['paciente']);
                echo "<div class='dados-aval conta-avaliacao' ><p><a href='CadastraAvaliacao3.php?cod_aval={$this->getId_Avaliacao()}&idpac={$this->getId_Pessoa()}'>{$linha['consulta']}°Aval</a> </p> </div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_1->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='dados-aval'><p>" . date('d/m/Y', strtotime($linha['data_avalicao'])) . "</p></div>";
            }
                    
            echo"<div style='clear: both;'></div>";
                   
            $i=0.9;// Variavel para almentar div
                    
            while ($linha = $this->Read_2->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='dados-aval'><p>{$linha['peso']}</p></div>";
                        
                $i++;
                //arrendondando variavel        
                if($i > 2 && $i < 3):
                    $i=2;   
                endif;
            }
                    
                    
            $i = $i * 81;// calculando largura da div
                   
            echo"<div style='clear: both'></div>";

           
            echo"<div class='tit-circ-dc' style='width: {$i}px; border-radius:5px;'><h4 class='text-light m-0 ptb2px fs-15'>Circunferências</h4></div>";
          
            while ($linha = $this->Read_3->fetch(PDO::FETCH_ASSOC)) {
                        echo"<div class='dados-aval'><p>{$linha['c_cintura']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";

           
            while ($linha = $this->Read_4->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval' style='margin-top:2px'><p>{$linha['c_abdominal']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";

           
            while ($linha = $this->Read_5->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_quadril']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";

           
            while ($linha = $this->Read_6->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_peito']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_7->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_braco_d']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
           
            while ($linha = $this->Read_8->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_braco_e']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_9->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_coxa_d']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_10->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['c_coxa_e']}</p></div>";
            }
            
            echo"<div style='clear: both'></div>";
            
            echo"<div class='tit-circ-dc' style='width: {$i}px; border-radius:5px;'><h4 class='text-light m-0 ptb2px fs-15'>Dobra Cutânia</h4></div>";
              
            while ($linha = $this->Read_11->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_triceps']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_12->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_escapular']}</p></div>";
            }
                    
           echo"<div style='clear: both'></div>";
           
            while ($linha = $this->Read_13->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_supra_iliaca']}</p></div>";
            }
                    
           echo"<div style='clear: both'></div>";
           
            while ($linha = $this->Read_14->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_abdominal']}</p></div>";
            }
                    
           echo"<div style='clear: both'></div>";
           
            while ($linha = $this->Read_15->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_axilar']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_16->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_peitoral']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
           
            while ($linha = $this->Read_17->fetch(PDO::FETCH_ASSOC)) {
                echo"<div class='dados-aval'><p>{$linha['dc_coxa']}</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_18->fetch(PDO::FETCH_ASSOC)) {
                        
                $this->setDc_Triceps($linha['dc_triceps']);
                $this->setDc_Escapular($linha['dc_escapular']);
                $this->setDc_Supra_Iliaca($linha['dc_supra_iliaca']);
                $this->setDc_Abdominal($linha['dc_abdominal']);
                $this->setDc_Axilar($linha['dc_axilar']);
                $this->setDc_Peitoral($linha['dc_peitoral']);
                $this->setDc_Coxa($linha['dc_coxa']);
                $this->setSexo($linha['sexo']);
                $this->setIdade($linha['data_nascimento']);
                $this->setPeso($linha['peso']);
                $this->calculos();
                $PercGordura=number_format($this->getPercentual_Gordura(), 1, ',', '');
                
                if($PercGordura>25):
                    echo"<div class='dados-aval' style='color:red;'><p>{$PercGordura } %</p></div>";
                elseif($PercGordura>=23 && $PercGordura<=25):
                    echo"<div class='dados-aval' style='color:orange;'><p>{$PercGordura } %</p></div>";
                else:
                    echo"<div class='dados-aval' style='color:green;'><p>{$PercGordura } %</p></div>";
                endif;
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_19->fetch(PDO::FETCH_ASSOC)) {
                        
                $this->setDc_Triceps($linha['dc_triceps']);
                $this->setDc_Escapular($linha['dc_escapular']);
                $this->setDc_Supra_Iliaca($linha['dc_supra_iliaca']);
                $this->setDc_Abdominal($linha['dc_abdominal']);
                $this->setDc_Axilar($linha['dc_axilar']);
                $this->setDc_Peitoral($linha['dc_peitoral']);
                $this->setDc_Coxa($linha['dc_coxa']);
                $this->setSexo($linha['sexo']);
                $this->setIdade($linha['data_nascimento']);
                $this->setPeso($linha['peso']);
                $this->calculos();
                $Mmuscular=number_format($this->getM_Muscular(), 1, ',', '');
                
                echo"<div class='dados-aval'><p>{$Mmuscular } Kg</p></div>";
            }
                    
            echo"<div style='clear: both'></div>";
            
            while ($linha = $this->Read_20->fetch(PDO::FETCH_ASSOC)) {
                        
                $this->setDc_Triceps($linha['dc_triceps']);
                $this->setDc_Escapular($linha['dc_escapular']);
                $this->setDc_Supra_Iliaca($linha['dc_supra_iliaca']);
                $this->setDc_Abdominal($linha['dc_abdominal']);
                $this->setDc_Axilar($linha['dc_axilar']);
                $this->setDc_Peitoral($linha['dc_peitoral']);
                $this->setDc_Coxa($linha['dc_coxa']);
                $this->setSexo($linha['sexo']);
                $this->setIdade($linha['data_nascimento']);
                $this->setPeso($linha['peso']);
                $this->calculos();
                $Gordura=number_format($this->getGordura(), 1, ',', '');
                
                echo"<div class='dados-aval'><p>{$Gordura } Kg</p></div>";
                
            }
            echo"<div style='clear: both'></div>";
            
           while ($linha = $this->Read_23->fetch(PDO::FETCH_ASSOC)) {
               $this->setId_Avaliacao($linha['id_avalicao']);
               echo"<div class='dados-aval bg-none'>"
                    //. "<form id='excluirAvaliacao' action='excluirdados.php' method='POST'>"
                       ."<input type='hidden' name='ex_idav' value='{$this->getId_Avaliacao()}'/>"
                        ."<input type='hidden' name='tipoexc' value='4'/>"
                         ."<input type='hidden' id='paciente' name='pac' value='{$this->getId_Pessoa()}'/>"
                        . "<button type='submit' class='text-center w-100 delete-aval'><img src='icons-main/icons/x-circle-fill.svg' alt='Deletar' width='15' height='15' title='Deletar'></a></button>"
                    //. "</form>"
                . "</div>";
           }
                        
        echo"</div>";
        
        elseif($this->Tipo==8):
                       
            $this->Consulta=1;           
            while ($linha = $this->Read_23->fetch(PDO::FETCH_ASSOC)) {
                
                $linha['consulta'];
                $linha['paciente'];
                
                if($this->getId_Pessoa()>0):
                    $this->Consulta= $linha['consulta']+1;
                else:
                      
                
                endif;
                    }
                 $this->getConsulta();
        elseif($this->Tipo==2):
            echo"<table border='1'>"
                . "<tr>";
                    while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                        $this->setId_Avaliacao($linha['id_avalicao']);
                        $this->setId_Pessoa($linha['paciente']);
                        echo "<td><a href='Grafico.php?cod_aval={$this->getId_Avaliacao()}&idpac={$this->getId_Pessoa()}'>{$linha['consulta']}° Aval</a></td>";
                    }
            echo"</tr>"
              . "</table>";
                 
        endif;
         
    }
    
    
}
