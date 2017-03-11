<?php 
	
	$servicio = 'http://localhost:8080/ProyectoGym/registro_personas?WSDL'; //url del servicio
    $client = new SoapClient($servicio);

    $horario = array('id'=>'9999','id_maestro'=>'32331','id_sucursal'=>'321','id_disciplina'=>'321');
    $peticion = array('arg0' => $horario);
    echo $horario['id'];

    $result = $client -> registraHorario($peticion);
    echo get_object_vars($result)['return'];

?>