<?php

        // require_once("nusoap/lib/nusoap.php");
        
        //borrar hasta aqui
        $servicio = 'http://localhost/gym/servicio.php?wsdl'; //url del servicio
        


        $parametros = array(
                'id_recibo'=>'1',
                'id_maestro'=>'2',
                'cantidad'=>'3',
                'fecha'=>'enero 3',
                );
        
        $client = new SoapClient($servicio);

        $result = $client->registrarReciboSaliente($parametros);

        echo $result;        

        // include("conectorsql.php");

        // $sql = "insert into universidades(nombre) values ('UAA')";
        // echo $sql;

        // $conn ->query($sql);

?>      