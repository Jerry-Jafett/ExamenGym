<?php

        // require_once("nusoap/lib/nusoap.php");

        $servicio = 'http://localhost/gym/servicio.php?wsdl'; //url del servicio
        


        $parametros = array();
        
        $client = new SoapClient($servicio);

        $result = $client->saludar($parametros);

        echo $result;

        echo "asdads";
        
        
        // $result = (array)$result;
        // echo $result['return'];
        // $n = count($tamano);
        // //print_r($result);
        // echo '<br>';
        // echo 'Contenido de la respuesta: ' .$result['return'].'<br>';
        // echo 'Tamaño del array: '.$n;
        
        // function obj2array($obj) {
        //     $out = array();
        //     foreach ($obj as $key => $val) {
        //         switch (true) {
        //             case is_object($val):
        //                 $out[$key] = obj2array($val);
        //                 break;
        //             case is_array($val):
        //                 $out[$key] = obj2array($val);
        //                 break;
        //             default:
        //                 $out[$key] = $val;
        //         }
        //     }
        //     return $out;
        // }
        ?>