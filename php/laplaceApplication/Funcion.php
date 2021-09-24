<?php
class Funcion{

    private ?string $expresion ; 

    private ?string $funcion ; 

    private ?string $tipoFuncion ; 

    private ?array $constantes ; 


    function __construct($funcion)
    {
        $this->expresion = "";
        $this->tipoFuncion = "" ;
        $this->funcion = $funcion ; 
        $this->constantes = array() ;   

    }

    public function agregarConstante($tipo, $valor){
        array_push($this->constantes,array('tipo' => $tipo, 'valor' => $valor)); 
    }

    public function getConstantes(){
        return $this->constantes;
    }

    public function setExpresion($expresion){
        $this->expresion = $expresion;
    }

    public function setTipoFuncion($tipo){
        $this->tipoFuncion = $tipo;
    }

    public function getFuncion(){
        return $this->funcion ; 
    }

    public function getExpresion(){
        return $this->expresion ; 
    }

    public function getBodyHtml(){
        return "f(t) = ".$this->funcion."<br>F(s) = ".$this->expresion.'<br>'; 
    }


}