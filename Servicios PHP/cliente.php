<?php

        //url del servicio
        $servicio = 'http://localhost/gym/servicio.php?wsdl'; 
        $client = new SoapClient($servicio);

        
        // // Ejemplo registrar recibo
        // $parametros = array(
        //         'id_recibo'=>'1',
        //         'id_alumno'=>'2',
        //         'cantidad'=>'3',
        //         'fecha'=>'enero 3',
        //         );

        // $result = $client->registrarReciboEntrante($parametros);

        // //Ejemplo getReciboEntrante

        // $parametros = '1';
        // $result = $client->getReciboEntrante($parametros);
        // $result = get_object_vars($result);
        // echo '<br>ReciboE: '.$result['Id_reciboE'].' '.$result['Cantidad'];

        // // Ejemplo getRecibosEntrantes
        // $parametros = array();
        // $lista = $client->getRecibosEntrantes($parametros);
        // foreach ($lista as $x) {
        //         $x = get_object_vars($x);
        //         echo $x['Id_reciboE'].'<br>';
        //         echo '........'.$x['Id_alumno'].'<br>';
        //         echo '........'.$x['Cantidad'].'<br>';
        //         echo '........'.$x['Fecha'].'<br>';
        // }

        // //Ejemplo getReciboSaliente

        // $parametros = '3';
        // $result = $client->getReciboSaliente($parametros);
        // $result = get_object_vars($result);
        // echo '<br>ReciboS: '.$result['Id_reciboS'].' '.$result['Cantidad'];

        // // Ejemplo registrarUniversidad
        // $parametros = array();
        // $parametros['id'] = 18; // no importa para registrar
        // $parametros['nombre'] = 'unam';
        // $result = $client->registrarUniversidad($parametros);

        // // Ejemplo getUniversidad;
        // $parametros = '18'; // Id universidad
        // $client = new SoapClient($servicio);
        // $result = $client->getUniversidad($parametros);
        // $result = get_object_vars($result);
        // echo '<br>Get uni: '.$result['id'].'-',$result['nombre'];   

        // //Ejemplo getUniversidades
        // $param = array();
        // $lista = $client->getUniversidades($param);

        // foreach ($lista as $x) {
        //         $x = get_object_vars($x);
        //         echo $x['id'].': '.$x['nombre'].'<br>';
        // }

        // Ejemplo getRecibosEntrantes
        // $parametros = array();
        // $lista = $client->getRecibosSalientes($parametros);
        // foreach ($lista as $x) {
        //         $x = get_object_vars($x);
        //         echo $x['Id_reciboS'].'<br>';
        //         echo '........'.$x['Id_maestro'].'<br>';
        //         echo '........'.$x['Cantidad'].'<br>';
        //         echo '........'.$x['Fecha'].'<br>';
        // }
        

?>      