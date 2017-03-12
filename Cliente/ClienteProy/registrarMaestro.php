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
            if (isset($_GET['rfc'])) {
                    $rfc = $_GET['rfc'];
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

            $maestro = array('id'=>$id,'nombre'=>$nom,'app'=>$app,'apm'=>$apm,
                'rfc'=>$rfc,'domicilio'=>$dom,'telefono'=>$tel,
                'celular'=>$cel);
            $peticion = array('m' => $maestro);
            $result = $client -> registrarMaestro($peticion);
            echo "Registro Insertado";
        }
        ?>
        
        <h2 align="center"><font color="blue">Nuevo Registro</font></h2>
        
        <form action="registrarMaestro.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
                Nombre: <input type="text" name="nombre"><br><br>
		Apellido Paterno: <input type="text" name="app"><br><br>
                Apellido Materno: <input type="text" name="apm"><br><br>
                Domicilio: <input type="text" name="domicilio"><br><br>
                Telefono: <input type="number" name="telefono"><br><br>
                Celular: <input type="number" name="celular"><br><br>
                RFC: <input type="text" name="rfc"><br><br>
		<input type="submit" name="submit" value="Inscribir !!">
	</form>
        <h2 align="right"><a href="maestros.php">Atrás</a></h2>
    </body>
</html>
