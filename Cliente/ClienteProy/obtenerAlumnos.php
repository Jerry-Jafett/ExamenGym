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
        $servicio = 'http://localhost:8080/ProyectoGym/registro_personas?WSDL'; //url del servicio
        $client = new SoapClient($servicio);
        
        if (isset($_GET['submit'])) {
            if (isset($_GET['id'])) {
                    $id = $_GET['id'];
            }
            $result = $client->getAlumno(array('arg0'=>$id));
            $r = get_object_vars($result); // transforma lo que recibe a un vector
            $r = $r['return']; // asignamos a r el return
            $r = get_object_vars($r); // sacamos las variables de r
            ?>
            <h2 align="center"><font color="blue">Resultado</font></h2>
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
                <td><b>Fecha de Inscripcion</b></td>
                <td><b>Tutor</b></td>
            </tr>
            <?php
            $idAlumno = $r['id'];
            $nom = $r['nombre'];
            $app = $r['ap_pat'];
            $apm = $r['ap_mat'];
            $dom = $r['domicilio'];
            $tel = $r['telefono'];
            $cel = $r['celular'];
            $ed = $r['edad'];
            $fi = $r['fechaInscripcion'];
            $tu = $r['tutor'];
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
            </tr>
                <?php
        }
                ?>
        </table>
        
        <hr>
        <h2 align="center"><font color="blue">Buscar Alumno</font></h2>
        
        <form action="obtenerAlumnos.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
		<input type="submit" name="submit" value="Buscar !!">
	</form>
        <h2 align="right"><a href="alumnos.php">Atrás</a></h2>
    </body>
</html>
