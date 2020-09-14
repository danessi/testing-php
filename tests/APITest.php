<?php

class APITest extends \PHPUnit\Framework\TestCase {

    /** @test **/
    public function podemos_obtener_el_recurso_mediante_el_endpoint_get(){
        $cliente = new GuzzleHttp\Client();

        $res= $cliente->request('GET','https://jsonplaceholder.typicode.com/posts/1');

        $data = json_decode($res->getBody(), true);  
        /* recibe string, json_decode convierte a objeto json, pero al poner true lo convierte a un arreglo */
        /* lo convertimos a arreglo para realizar las pruebas con assertArrayHasKey que funciona con arreglos, buscando
        una key que le indiquemos y busca en todo el arreglo  */

        /* var_dump($data); */
        /* echo "id:". $data->id; */  /* eso funciona con objeto json */


        $this->assertArrayHasKey('userId', $data);     
        /* verifica que algun id del arreglo que nos llega se llame userId */

        $this->assertArrayHasKey('title', $data);
         /* verifica que algun id del arreglo que nos llega se llame title *

        /*  Pasa la prueba si nos llega una key con el nombre userId y otra key con el nombre title     *
         *  si la prueba falla con el primer assertArrayHasKey() el segundo no se corre                 *
        /*                                                                                              */

    }

    /** @test **/
    public function podemos_obtener_el_recurso_mediante_el_endpoint_post(){
        $cliente = new GuzzleHttp\Client();

        $res= $cliente->request('POST','https://jsonplaceholder.typicode.com/posts',[
            "userId" => 1,
            "title" => "Mi titulo",
            "body" => "mi contenido"
        ]);

            $data = json_decode($res->getBody(), true); 
             /* var_dump($data);  */  
             /* vemos que solo nos devuelve el dato id=101
                     array(1) {
                    ["id"]=>
                    int(101)
                    } */

            $this->assertEquals(201, $res->getStatusCode()); /* statusCode=201 "creado", vimos que nos respondia eso en postman */
            $this->assertEquals(101, $data['id']);
            
            /* de esta misma forma podriamos testear el titulo y body, pero la respuesta de la API no nos trae nada y no podemos */
            /* $this->assertEquals(101, $data['title']); */
            /* $this->assertEquals(101, $data['body']) */;
    }


}