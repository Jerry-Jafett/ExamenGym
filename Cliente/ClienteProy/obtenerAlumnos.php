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

        $idAlumno = '5';

        $result = $client->getAlumno(array('arg0'=>$idAlumno));
        // echo var_dump($result->return);

        $r = get_object_vars($result); // transforma lo que recibe a un vector
        $r = $r['return']; // asignamos a r el return
        $r = get_object_vars($r); // sacamos las variables de r

        $idAlumno = $r['id'];
        $nom = $r['nombre'];
        $app = $r['ap_pat'];

        // $vec = json_decode($r,true);
        // echo $r[0];

        echo "<br><br>Info: ". $idAlumno . " " . $nom . " " . $app;
       
        ?>
        
        <hr>
        Todos los alumnos:

        <?php 
                $result = $client->getAlumnos();

                $result = get_object_vars($result);

                $r = $result['return'];

                foreach($r as $al){
                        $al = get_object_vars($al);
                        $idAlumno = $al['id'];
                        $nom = $al['nombre'];
                        $app = $al['ap_pat'];
                        echo "<br>Info: ". $idAlumno . " " . $nom . " " . $app . "<br>";      
                }

        ?>
        <h2 align="right"><a href="alumnos.php">Atrás</a></h2>
    </body>
</html>
