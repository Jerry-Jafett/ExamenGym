<?php

        // require_once("nusoap/lib/nusoap.php");
        
        //borrar hasta aqui
        $servicio = 'http://localhost/gym/servicio.php?wsdl'; //url del servicio
        


        $parametros = array('id'=>'1','nombre'=>'UAA2');
        
        $client = new SoapClient($servicio);

        $result = $client->registrarUniversidad($parametros);

        echo $result;        

        // include("conectorsql.php");

        // $sql = "insert into universidades(nombre) values ('UAA')";
        // echo $sql;

        // $conn ->query($sql);

?>      