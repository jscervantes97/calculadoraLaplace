<?php

require './Funcion.php' ; 

class AnalizadorFunciones{

    function __construct()
    {
        
    }

    public function analizarExpresion($expresion){
        $funcionSalida = new Funcion($expresion) ; 
        $resultado = "" ; 
        echo 'Inicio el analisis sintactico de la expresion: '.$expresion . '<br>'; 
        
        
        if(preg_match('/[0-9]*[sen][0-9]*[t]/', $expresion)){
            preg_match("/[0-9]*[sen][0-9]*[t]/", $expresion, $matches);
            var_dump($matches);
            echo '<br>';
            $resultado = "/s^2" ; 
            $funcionSalida->setTipoFuncion("Transformada de t sin potencia");
            $funcionSalida->setExpresion($resultado);
            $funcionSalida->agregarConstante("Constante",$matches[0]);
        }
        else if(preg_match('/[0-9]*[t]/', $expresion)){
            preg_match("/[0-9]*/", $expresion, $matches);
            $resultado = $matches[0]."/s^2" ; 
            $funcionSalida->setTipoFuncion("Transformada de t sin potencia");
            $funcionSalida->setExpresion($resultado);
            $funcionSalida->agregarConstante("Constante",$matches[0]);
        }
        else{
            $resultado = $expresion."/s" ; 
            $funcionSalida->setTipoFuncion("Transformada de una Constante");
            $funcionSalida->setExpresion($resultado);
            $funcionSalida->agregarConstante("Constante",$expresion);
        }

        return $funcionSalida ;
    }

}

$scanner = new AnalizadorFunciones(); 
$prueba = $scanner->analizarExpresion("34");
echo $prueba->getBodyHtml();

$prueba = $scanner->analizarExpresion("33t");
echo $prueba->getBodyHtml();

$prueba = $scanner->analizarExpresion("sen2t");
echo $prueba->getBodyHtml();