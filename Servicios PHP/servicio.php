<?php
	
	require_once("nusoap/lib/nusoap.php");
	

	// Crear instancia del servidor
	$server = new nusoap_server();
	$server->configureWSDL("Web Service Gym","urn:wsGym");

	//DEFINICIONES DE TIPOS DE DATOS
	
	// definicion de universidad
	$server->wsdl->addComplexType('universidad','complexType','struct','all','',
		array('id' => array('name'=>'ID','type'=>'xds:int')
		, 'nombre' => array('name'=>'nombre', 'type'=>'xsd:string')));

	
	// Metodos!!

	$server->register('registrarUniversidad',
		array('universidad'=>'tns:universidad'),
		array('return'=>'xsd:string'),
		'urn:wsGym',
        'urn:wsGym#registrarUniversidad',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);

	

	

	// montar el WS
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);


    //Funciones
    function registrarUniversidad($uni){
    	include('conectorsql.php');
    	$sql = "insert into universidades (nombre) values('" . $uni['nombre'] . "')";
    	$conn->query($sql);
    	return $sql;
    }


?>