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
    public function podemos_obtener_el_codigo_not_found_404_mediante_el_endpoint_get_si_el_id_es_mayor_o_igual_a_ciento_uno(){
        $cliente = new GuzzleHttp\Client();

        $res= $cliente->request('GET','https://jsonplaceholder.typicode.com/posts/101', ['http_errors' => false]);
        /* Para poder recibir el error "404 Not Found" tengo que deshabilitar el http_errors del get request */
        
        $data = json_decode($res->getBody(), true);
        /* echo 'getStatusCode: '. $res->getStatusCode(); */

        $this->assertEquals(404, $res->getStatusCode());    /* statusCode=404 "Not Found" exito de mi prueba obtener el 404 */

    }


    /** @test **/
    public function podemos_crear_el_recurso_mediante_el_endpoint_post(){
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

    /** @test **/
    public function podemos_eliminar_el_recurso_mediante_el_endpoint_delete(){
        $cliente = new GuzzleHttp\Client();

        $res= $cliente->request('DELETE','https://jsonplaceholder.typicode.com/posts/1');

        $data = json_decode($res->getBody(), true);

        $this->assertEquals(200, $res->getStatusCode()); /* statusCode=200 "OK" se elimino, vimos que nos respondia eso en postman */

        /* solo fallaria la prueba si no se le pone ningun valor al delete satusCode=404 Not Found. */

    }

    /** @test **/
    public function podemos_modificar_el_recurso_mediante_el_endpoint_put(){
        $cliente = new GuzzleHttp\Client();

        $res= $cliente->request('PUT','https://jsonplaceholder.typicode.com/posts/1', [
            "userId" => 1,
            "title" => "TituloPut",
            "body" => "ContenidoPut"
        ]);

        $data = json_decode($res->getBody(), true);

        $this->assertEquals(200, $res->getStatusCode());    /* statusCode=200 "OK" se hizo la modificacion */

        $this->assertArrayHasKey('id', $data);     
        /* verifica que alguna key del arreglo que nos devuelve se llame id */

        $this->assertEquals(1, $data['id']);
        /* verifica que el id que nos trae es el id= 1 */

        /* de esta misma forma podriamos testear el titulo y body, pero la respuesta de la API solo trae el id y no podemos */
        /* en postman si trae los datos pero via api por php solo trae el id */
        /* $this->assertEquals("TituloPut", $data['title']); */
        /* $this->assertEquals("ContenidoPut", $data['body']) */;        

    }


}