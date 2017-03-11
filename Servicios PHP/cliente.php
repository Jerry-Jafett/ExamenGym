<?php

        //url del servicio
        $servicio = 'http://localhost/gym/servicio.php?wsdl'; 
        $client = new SoapClient($servicio);

        

        // Ejemplo registrar recibo
        $parametros = array(
                'id_recibo'=>'1',
                'id_alumno'=>'2',
                'cantidad'=>'3',
                'fecha'=>'enero 3',
                );

        $result = $client->registrarReciboEntrante($parametros);

        //Ejemplo getReciboEntrante

        $parametros = '1';
        $result = $client->getReciboEntrante($parametros);
        $result = get_object_vars($result);
        echo '<br>ReciboE: '.$result['Id_reciboE'].' '.$result['Cantidad'];

        //Ejemplo getReciboSaliente

        $parametros = '3';
        $result = $client->getReciboSaliente($parametros);
        $result = get_object_vars($result);
        echo '<br>ReciboS: '.$result['Id_reciboS'].' '.$result['Cantidad'];

        // Ejemplo registrarUniversidad
        $parametros = array();
        $parametros['id'] = 3; // no importa para registrar
        $parametros['nombre'] = 'unam';
        $result = $client->registrarUniversidad($parametros);

        // Ejemplo getUniversidad;
        $parametros = '1'; // Id universidad
        $client = new SoapClient($servicio);
        $result = $client->getUniversidad($parametros);
        $result = get_object_vars($result);
        echo '<br>Get uni: '.$result['id'].'-',$result['nombre'];   

?>      