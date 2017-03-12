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

            $peticion = array('arg0' => $nom);
            $result = $client -> registraDisciplina($peticion);
            echo "Registro Insertado";
        }
        ?>
        
        <h2 align="center"><font color="blue">Nuevo Registro</font></h2>
        
        <form action="registrarDisciplina.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
                Nombre: <input type="text" name="nombre"><br><br>
		<input type="submit" name="submit" value="Inscribir !!">
	</form>
        
        <h2 align="right"><a href="disciplinas.php">Atrás</a></h2>
    </body>
</html>
