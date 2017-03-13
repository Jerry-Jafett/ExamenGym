<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $servicio = "http://localhost:8080/ProyectoGym/registro_personas?WSDL"; //url del servicio
        $client = new SoapClient($servicio);
        
        if (isset($_GET['submit'])) {
            if (isset($_GET['id'])) {
                    $id = $_GET['id'];
            }
            if (isset($_GET['nombre'])) {
                    $nom = $_GET['nombre'];
            }
            if (isset($_GET['app'])) {
                    $app = $_GET['app'];
            }
            if (isset($_GET['apm'])) {
                    $apm = $_GET['apm'];
            }
            if (isset($_GET['edad'])) {
                    $ed = $_GET['edad'];
            }
            if (isset($_GET['domicilio'])) {
                    $dom = $_GET['domicilio'];
            }
            if (isset($_GET['telefono'])) {
                    $tel = $_GET['telefono'];
            }
            if (isset($_GET['celular'])) {
                    $cel = $_GET['celular'];
            }
            if (isset($_GET['fecha'])) {
                    $fecha = $_GET['fecha'];
            }
            if (isset($_GET['tutor'])) {
                    $tuto = $_GET['tutor'];
            }
            if (isset($_GET['costo'])) {
                    $costo = $_GET['costo'];
            }
            $alumno = array('id'=>$id,'nombre'=>$nom,'ap_pat'=>$app,'ap_mat'=>$apm,
                'edad'=>$ed,'domicilio'=>$dom,'telefono'=>$tel,
                'celular'=>$cel, 'tutor'=>$tuto, 'fechaInscripcion'=>$fecha);
            $peticion = array('al' => $alumno);
            $result = $client -> registrarAlumno($peticion);
            echo "Registro Insertado";
            
            //url del servicio
            $servicio = 'http://localhost/ClienteProy/servicio.php?wsdl'; 
            $client = new SoapClient($servicio);
            $parametros = array(
                 'id_recibo'=>'1',
                 'id_alumno'=>$id,
                 'cantidad'=>$costo,
                 'fecha'=>$fecha,
                 );

            $result = $client->registrarReciboEntrante($parametros);
            echo 'Pago Efectuado !!';
        }
        $servicio = "http://localhost:8080/ProyectoGym/registro_personas?WSDL"; //url del servicio
        $client = new SoapClient($servicio);
        $result = $client->getAlumnos();
        $result = get_object_vars($result);
        $r = $result['return'];
        foreach($r as $al){
            $al = get_object_vars($al);
            $idAlumno = $al['id'];
        }
        ?>
        
        <h2 align="center"><font color="blue">Nuevo Registro</font></h2>
	
        <form action="registrarAlumno.php" method="get" align="center">
            ID: <input type="number" name="id" value="<?php echo $idAlumno + 1;?>"><br><br>
                Nombre: <input type="text" name="nombre"><br><br>
		Apellido Paterno: <input type="text" name="app"><br><br>
                Apellido Materno: <input type="text" name="apm"><br><br>
                Edad: <input type="number" name="edad"><br><br>
                Domicilio: <input type="text" name="domicilio"><br><br>
                Telefono: <input type="number" name="telefono"><br><br>
                Celular: <input type="number" name="celular"><br><br>
                Fecha de Inscripcion: <input type="date" name="fecha"><br><br>
                Tutor: <input type="text" name="tutor"><br><br>
                Inscripcion($): <input type="number" name="costo"><br><br>
		<input type="submit" name="submit" value="Inscribir !!">
	</form>
        <h2 align="right"><a href="alumnos.php">Atrás</a></h2>
    </body>
</html>
