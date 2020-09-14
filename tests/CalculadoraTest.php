<?php

Use App\Calculadora\Calculadora;
Use App\Excepciones\DivisionPorCeroException;
Use App\Excepciones\ArregloException;

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
        $arreglo = [2,5,8];
        $suma = $calculadora->sumarArreglo($arreglo);

        $this->assertEquals(15, $suma);
    }

    /** @test **/
    public function comprobar_que_la_funcion_dividir_es_capaz_de_dividir_dos_numeros(){
        $calculadora = new Calculadora;

        $division = $calculadora->dividir(10, 2);

        $this->assertEquals(5, $division);
    }

    /** @test **/
    public function la_funcion_dividir_arroja_una_excepcion_cuando_se_divide_por_cero(){
        
        $this->expectException(DivisionPorCeroException::class);
        
        $calculadora = new Calculadora;

        $division = $calculadora->dividir(10, 0);

    }

    /** @test **/
    public function comprobar_que_la_funcion_sumar_arreglo_arroja_excepcion_cuando_el_parametro_no_es_un_arreglo(){
        
        $this->expectException(ArregloException::class);
        
        $calculadora = new Calculadora;
        $suma = $calculadora->sumarArreglo("cadena de texto"); /* ver si el string pasa la prueba */
    }

    /** @test **/
    public function comprobar_que_la_funcion_sumar_arreglo_arroja_excepcion_cuando_el_parametro_no_es_un_arreglo_y_es_un_null(){
        
        $this->expectException(ArregloException::class);
        
        $calculadora = new Calculadora;
        $suma = $calculadora->sumarArreglo(NULL); /* ver si el null pasa la prueba */
    }

    /** @test **/
    public function comprobar_que_la_funcion_sumar_arreglo_arroja_excepcion_cuando_el_parametro_no_es_un_arreglo_y_es_un_int(){
        
        $this->expectException(ArregloException::class);
        
        $calculadora = new Calculadora;
        $suma = $calculadora->sumarArreglo(8); /* ver si el int pasa la prueba */
    }

    /** @test **/
    /* Hacer resta  */



    /** @test **/
    /* Hacer multiplicacion */



}
