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
        
        <h1 align="center"><font color="red">Registros de Alumnos</font></h1>
        <?php
        $servicio = "http://localhost:8080/ProyectoGym/registro_personas?WSDL"; //url del servicio
        
        $client = new SoapClient($servicio);
        $result = $client->getAlumnos();
        $result = get_object_vars($result);
        $r = $result['return'];
        
        if (isset($_GET['submit'])) {
            if (isset($_GET['id'])) {
                    $idAlumno = $_GET['id'];
            }
            if (isset($_GET['costo'])) {
                    $costo = $_GET['costo'];
            }
            if (isset($_GET['fecha'])) {
                    $fecha = $_GET['fecha'];
            }
            
            //url del servicio
            $servicio = 'http://localhost/ClienteProy/servicio.php?wsdl'; 
            $client = new SoapClient($servicio);
            $parametros = array(
                 'id_recibo'=>'1',
                 'id_alumno'=>$idAlumno,
                 'cantidad'=>$costo,
                 'fecha'=>$fecha,
                 );

            $result = $client->registrarReciboEntrante($parametros);
            echo 'Pago Efectuado !!';
        }
        ?>
        <h2 align="right"><a href="alumnos.php">Atrás</a></h2>
        <table border="1" align="center">
            <tr>
                <td><b>ID</b></td>
                <td><b>Nombre</b></td>
                <td><b>Apellido Paterno</b></td>
                <td><b>Apellido Materno</b></td>
                <td><b>Edad</b></td>
                <td><b>Domicilio</b></td>
                <td><b>Telefono</b></td>
                <td><b>Celular</b></td>
                <td align="center"><b>Fecha de Inscripcion</b></td>
                <td><b>Tutor</b></td>
                <td><b>Disciplina</b></td>
                <td align="center"><b>Pagar Colegiatura</b></td>
            </tr>
            <?php
                foreach($r as $al){
                    $al = get_object_vars($al);
                    $idAlumno = $al['id'];
                    $nom = $al['nombre'];
                    $app = $al['ap_pat'];
                    $apm = $al['ap_mat'];
                    $ed = $al['edad'];
                    $dom = $al['domicilio'];
                    $tel = $al['telefono'];
                    $cel = $al['celular'];
                    $fi = $al['fechaInscripcion'];
                    $dis = $al['disciplina'];
                    $tu = $al['tutor'];
            ?>
            
            <tr>

                <td align="center"><?php echo $idAlumno;?></td>
                <td><?php echo $nom; ?></td>
                <td><?php echo $app; ?></td>
                <td><?php echo $apm; ?></td>
                <td><?php echo $ed; ?></td>
                <td><?php echo $dom; ?></td>
                <td><?php echo $tel; ?></td>
                <td><?php echo $cel; ?></td>
                <td><?php echo $fi; ?></td>
                <td><?php echo $tu; ?></td>
                <td><?php echo $dis; ?></td>
                <td>
                    <form action="listaAlumnos.php" method="get" align="center">
                    <input type="hidden" name="id" value="<?php echo $idAlumno;?>">
                    Monto($): <input type="number" name="costo"><br><br>
                    Fecha: <input type="date" name="fecha"><br><br>
                    <input type="submit" name="submit" value="Pagar !!">
                    </form>
                </td>
            </tr>
                <?php
                }
                ?>
        </table>

	<h2 align="right"><a href="alumnos.php">Atrás</a></h2>
    </body>
</html>
