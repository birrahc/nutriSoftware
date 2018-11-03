<?php

/**
 * <b>Read.class:</b>
 * Classe responsavel por leituras genericas no banco de dados
 * 
 * @copyright (c) 2017, Júnior César
 */
abstract class Select extends Conexao{
    private $Select;
    private $Termos;
    private $Tabela;
    public $Colunas;
    private $ColumTable;
    public $Tipo;
    private $Result;
    /** @var PDOStatement */
    public $Read;
    public $Read_1;
    public $Read_2;
    public $Read_3;
    public $Read_4;
    public $Read_5;
    public $Read_6;
    public $Read_7;
    public $Read_8;
    public $Read_9;
    public $Read_10;
    public $Read_11;
    public $Read_12;
    public $Read_13;
    public $Read_14;
    public $Read_15;
    public $Read_16;
    public $Read_17;
    public $Read_18;
    public $Read_19;
    public $Read_20;
    public $Read_21;
    public $Read_22;
    public $Read_23;


    /** @var PDO */
    private $Conn;
    
    public function ExRead($Tabela, array $Colunas, $Termos = null, array $ColumTable=null,$Tipo=null) {
        $this->Tabela = (string) $Tabela;
        $this->Colunas = $Colunas;
        $this->Termos = $Termos;
        $this->ColumTable = $ColumTable;
        $this->Tipo = (int)$Tipo;
        
        $this->Execute();
    }
    
    public function getResult() {
     return $this->Result;
    }
    
    public function getRunCount() {
        return $this->Read->rowCount();
    }
    
   
     /**
     ****************************************
     ************* PRIVATE METHODS **********
     **************************************** 
     */
    abstract function Syntax();
    
    private function Connect(){
        $Coluna= implode(' ,', array_merge($this->Colunas));
        $this->Select = "SELECT {$Coluna} FROM {$this->Tabela} {$this->Termos}";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->query($this->Select);
        $this->Read_1 = $this->Conn->query($this->Select);
        $this->Read_2 = $this->Conn->query($this->Select);
        $this->Read_3 = $this->Conn->query($this->Select);
        $this->Read_4 = $this->Conn->query($this->Select);
        $this->Read_5 = $this->Conn->query($this->Select);
        $this->Read_6 = $this->Conn->query($this->Select);
        $this->Read_7 = $this->Conn->query($this->Select);
        $this->Read_8 = $this->Conn->query($this->Select);
        $this->Read_9 = $this->Conn->query($this->Select);
        $this->Read_10 = $this->Conn->query($this->Select);
        $this->Read_11 = $this->Conn->query($this->Select);
        $this->Read_12 = $this->Conn->query($this->Select);
        $this->Read_13 = $this->Conn->query($this->Select);
        $this->Read_14 = $this->Conn->query($this->Select);
        $this->Read_15 = $this->Conn->query($this->Select);
        $this->Read_16 = $this->Conn->query($this->Select);
        $this->Read_17 = $this->Conn->query($this->Select);
        $this->Read_18 = $this->Conn->query($this->Select);
        $this->Read_19 = $this->Conn->query($this->Select);
        $this->Read_20 = $this->Conn->query($this->Select);
        $this->Read_21 = $this->Conn->query($this->Select);
        $this->Read_22 = $this->Conn->query($this->Select);
        $this->Read_23 = $this->Conn->query($this->Select);
        
        
    }
    
   
    
    private function Execute(){
        $this->Connect();
        $this->Syntax();
            
        try {
            $this->Read->execute();
            $this->Read_1->execute();
            $this->Read_2->execute();
            $this->Read_3->execute();
            $this->Read_4->execute();
            $this->Read_5->execute();
            $this->Read_6->execute();
            $this->Read_7->execute();
            $this->Read_8->execute();
            $this->Read_9->execute();
            $this->Read_10->execute();
            $this->Read_11->execute();
            $this->Read_12->execute();
            $this->Read_13->execute();
            $this->Read_14->execute();
            $this->Read_15->execute();
            $this->Read_16->execute();
            $this->Read_17->execute();
            $this->Read_18->execute();
            $this->Read_19->execute();
            $this->Read_20->execute();
            $this->Read_21->execute();
            $this->Read_22->execute();
            $this->Read_23->execute();
            $this->Result = $this->Read->fetchAll();
            
        } catch (PDOException $e) {
            $this->Read=null;
            Error("<br>Erro ao Ler dados {$e->getMessage()}</b>", $e->getCode());
            
        }
    }
}
