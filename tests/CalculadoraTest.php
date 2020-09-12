<?php

Use App\Calculadora\Calculadora;

class CalculadoraTest extends \PHPUnit\Framework\TestCase {

    /** @test **/
    public function comprobar_que_la_funcion_suma_es_capaz_de_sumar_dos_numeros(){
        $calculadora = new Calculadora;
        /* Siempre escribimos todo el procedimiento y lo guardamos en una variable */
        $suma = $calculadora->sumar(5,11);

        $this->assertEquals(16, $suma);
    }

    /** @test **/
    public function comprobar_que_la_funcion_sumar_arreglo_es_capaz_de_sumar_los_numeros_de_un_arreglo(){
        $calculadora = new Calculadora;
        /* Siempre escribimos todo el procedimiento y lo guardamos en una variable */
        $arreglo = [2,5,8];
        $suma = $calculadora->sumarArreglo($arreglo);

        $this->assertEquals(15, $suma);
    }

}