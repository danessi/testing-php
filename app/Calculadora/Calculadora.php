<?php

namespace App\Calculadora;

class Calculadora {
    public function sumar($a, $b){
        return $a + $b;
    }
    public function sumarArreglo($arreglo =[]){
        return array_sum($arreglo);  /* fn suma elem de un array */
    }
    public function dividir($a, $b){
        return $a / $b; 
    }
}