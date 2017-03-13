<?php
	
	require_once("nusoap/lib/nusoap.php");
	

	// Crear instancia del servidor
	$server = new nusoap_server();
	$server->configureWSDL("Web Service Gym","urn:wsGym");

	//DEFINICIONES DE TIPOS DE DATOS

	// definicion de universidad
	$server->wsdl->addComplexType('universidad','complexType','struct','all','',
		array('id' => array('name'=>'id','type'=>'xds:int')
		, 'nombre' => array('name'=>'nombre', 'type'=>'xsd:string')));


	//definicion de recibo entrante
	$server->wsdl->addComplexType('reciboEntrante','complexType','struct','all','',array(
		'id_recibo' => array('name'=>'id_recibo','type'=>'xds:int'),
		'id_alumno' => array('name'=>'id_alumno', 'type' => 'xds:int'),
		'cantidad' => array('name'=>'cantidad', 'type' => 'xds:int'),
		'fecha'  => array('name'=>'decha', 'type' => 'xds:string')));
		
	//definicion de recibo saliente
	$server->wsdl->addComplexType('reciboSaliente','complexType','struct','all','',array(
		'id_recibo' => array('name'=>'id_recibo','type'=>'xds:int'),
		'id_maestro' => array('name'=>'id_maestro', 'type' => 'xds:int'),
		'cantidad' => array('name'=>'cantidad', 'type' => 'xds:int'),
		'fecha'  => array('name'=>'decha', 'type' => 'xds:string')));
 
	
	// Metodos!!


	//registrar universidad
	$server->register('registrarUniversidad',
		array('universidad'=>'tns:universidad'),
		array('return'=>'xsd:string'),
		'urn:wsGym',
        'urn:wsGym#registrarUniversidad',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);

	//get universidad
	$server->register('getUniversidad',
		array('id'=>'xsd:int'),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#getUniversidad',
        'rpc',
        'encoded',
        'obtiene una universidad por id'
		);

	//get universidades
	$server->register('getUniversidades',
		array(),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#getUniversidades',
        'rpc',
        'encoded',
        'obtiene todas las universidades'
		);

	//registrar reciboEntrante
	$server->register('registrarReciboEntrante',
		array('recibo'=>'tns:reciboEntrante'),
		array('return'=>'xsd:string'),
		'urn:wsGym',
        'urn:wsGym#registrarReciboEntrante',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);

	//get reciboEntrante
	$server->register('getReciboEntrante',
		array('recibo'=>'xsd:int'),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#registrarReciboEntrante',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);

	//get recibosEntrantes
	$server->register('getRecibosEntrantes',
		array(),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#registrarRecibosEntrantes',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);
	//registrar reciboSaliente
	$server->register('registrarReciboSaliente',
		array('recibo'=>'tns:reciboSaliente'),
		array('return'=>'xsd:string'),
		'urn:wsGym',
        'urn:wsGym#registrarReciboSaliente',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);
	
	//get reciboSaliente
	$server->register('getReciboSaliente',
		array('recibo'=>'xsd:int'),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#registrarReciboSaliente',
        'rpc',
        'encoded',
        'Agrega una universidad'
		);

	//get recibosSalientes
	$server->register('getRecibosSalientes',
		array(),
		array('return'=>'xsd:Array'),
		'urn:wsGym',
        'urn:wsGym#registrarRecibosSalientes',
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

    function getUniversidad($entrada){
    	include('conectorsql.php');
    	$sql = "select * from universidades where id_universidad='".$entrada."'";
    	// return $sql;
    	$id = 0;
    	$nom = '0';

    	if($res = $conn->query($sql)){
    		$obj = $res->fetch_assoc();
    		$id = $obj['Id_universidad'];
    		$nom = $obj['Nombre'];
    		// return $obj;
    	}
    	// else
    		// return "neee";

		$solo['id'] = $id;
		$solo['nombre'] = $nom;

    	return $solo;
    }

    function getUniversidades(){
    	include('conectorsql.php');
    	$sql = "select * from universidades";
    	// return $sql;
    	$id = 0;
    	$nom = '0';
    	$lista = array();
    	$i = 0;
    	if($res = $conn->query($sql)){
    		while($obj = $res->fetch_assoc()){
    			$id = $obj['Id_universidad'];
    			$nom = $obj['Nombre'];
    			$uni = array();
    			$uni['id'] = $id;
    			$uni['nombre'] = $nom;
    			$lista[$i++] = $uni;
    		}
    		
    		// return $obj;
    	}
    	// else
    		// return "neee";


    	return $lista;
    }

    function registrarReciboEntrante($recibo){
    	include('conectorsql.php');
    	$idr = $recibo['id_recibo'];
    	$ida = $recibo['id_alumno'];
    	$cant = $recibo['cantidad'];
    	$fecha = $recibo['fecha'];
    	$sql = "insert into recibos_entrante (id_alumno,cantidad,fecha) values("
    			.$ida.",".$cant.",'".$fecha."')";

    	if($conn->query($sql)){
    		return $sql;
    	}

    	return 'nel pastel';
    }

    function getReciboEntrante($id){
    	include('conectorsql.php');
    	$sql = "Select * from recibos_entrante where Id_reciboE=".$id;
    	$recibo = array();

    	if($res = $conn->query($sql)){
    		$obj = $res->fetch_assoc();
    		$recibo['Id_reciboE'] = $obj['Id_reciboE'];
    		$recibo['Id_alumno'] = $obj['Id_alumno'];
    		$recibo['Cantidad'] = $obj['Cantidad'];
    		$recibo['Fecha'] = $obj['Fecha'];
    	}

    	return $recibo;
    }

    function getRecibosEntrantes(){
    	include('conectorsql.php');
    	$sql = "Select * from recibos_entrante";
    	$recibos = array();

    	if($res = $conn->query($sql)){
    		while($obj = $res->fetch_assoc()){
    			$rec['Id_reciboE'] = $obj['Id_reciboE'];
	    		$rec['Id_alumno'] = $obj['Id_alumno'];
	    		$rec['Cantidad'] = $obj['Cantidad'];
	    		$rec['Fecha'] = $obj['Fecha'];
	    		array_push($recibos, $rec);
    		}
    	}

    	return $recibos;
    }

    function registrarReciboSaliente($recibo){
    	include('conectorsql.php');
    	$idr = $recibo['id_recibo'];
    	$ida = $recibo['id_maestro'];
    	$cant = $recibo['cantidad'];
    	$fecha = $recibo['fecha'];
    	$sql = "insert into recibos_saliente (id_maestro,cantidad,fecha) values("
    			.$ida.",".$cant.",'".$fecha."')";

    	if($conn->query($sql))
    		return $sql;

    	return 'nel pastel';
    }

    function getReciboSaliente($id){
    	include('conectorsql.php');
    	$sql = "Select * from recibos_saliente where Id_reciboS=".$id;
    	$recibo = array();

    	if($res = $conn->query($sql)){
    		$obj = $res->fetch_assoc();
    		$recibo['Id_reciboS'] = $obj['Id_reciboS'];
    		$recibo['Id_maestro'] = $obj['Id_maestro'];
    		$recibo['Cantidad'] = $obj['Cantidad'];
    		$recibo['Fecha'] = $obj['Fecha'];
    	}
    	return $recibo;
    }

    function getRecibosSalientes(){
    	include('conectorsql.php');
    	$sql = "Select * from recibos_saliente";
    	$recibos = array();

    	if($res = $conn->query($sql)){
    		while($obj = $res->fetch_assoc()){
    			$rec['Id_reciboS'] = $obj['Id_reciboS'];
	    		$rec['Id_maestro'] = $obj['Id_maestro'];
	    		$rec['Cantidad'] = $obj['Cantidad'];
	    		$rec['Fecha'] = $obj['Fecha'];
	    		array_push($recibos, $rec);
    		}
    	}

    	return $recibos;
    }
?>