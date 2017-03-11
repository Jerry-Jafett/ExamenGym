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
        <h1 align="center"><font color="red">Registros de Disciplinas</font></h1>
        <?php
        $servicio = "http://localhost:8080/ProyectoGym/registro_personas?WSDL"; //url del servicio
        
        $client = new SoapClient($servicio);
        $result = $client->getAlumnos();
        $result = get_object_vars($result);
        $r = $result['return'];
        
        ?>
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
            </tr>
            <?php
                foreach($r as $al){
                    $al = get_object_vars($al);
                    $idAlumno = $al['id'];
                    $nom = $al['nombre'];
                    $app = $al['ap_pat'];
                    $apm = $al['ap_mat'];
                    $dom = $al['domicilio'];
                    $tel = $al['telefono'];
                    $cel = $al['celular'];
                    $ed = $al['edad'];
                    $fi = $al['fechaInscripcion'];
                
            ?>
            
            <tr>

                <td align="center"><?php echo $idAlumno;?></td>
                <td><?php echo $nom; ?></td>
                <td><?php echo $app; ?></td>
                <td><?php echo $apm; ?></td>
                <td><?php echo $dom; ?></td>
                <td><?php echo $tel; ?></td>
                <td><?php echo $cel; ?></td>
                <td><?php echo $ed; ?></td>
                <td><?php echo $fi; ?></td>
            </tr>
                <?php
                }
                ?>
        </table>
        <h2 align="right"><a href="horarios.php">Atrás</a></h2>
    </body>
</html>
