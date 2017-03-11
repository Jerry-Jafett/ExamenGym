<?php
	
	require_once("nusoap/lib/nusoap.php");

	// Crear instancia del servidor
	$server = new nusoap_server();
	$server->configureWSDL("Web Service Gym","urn:wsGym");


	$server->register('saludar',array(),
            array('return' => 'xsd:string'),
            'urn:wsGym',
            'urn:wsGym#saludar',
            'rpc',
            'encoded',
            'Te saludara');

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);

    function saludar($in){
    	// global $server;
    	$saludo = array('return'=>'Hola weon');

    	return "que pedo!";
    }
?>