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
            $result = $client->getDisciplina(array('arg0'=>$id));
            $r = get_object_vars($result); // transforma lo que recibe a un vector
            $r = $r['return']; // asignamos a r el return
            $r = get_object_vars($r); // sacamos las variables de r
            ?>
            <h2 align="center"><font color="blue">Resultado</font></h2>
            <table border="1" align="center">
            <tr>
                <td><b>ID</b></td>
                <td><b>Nombre</b></td>
            </tr>
            <?php
            $idDisciplina = $r['id'];
            $nom = $r['nombre'];
            ?>
            <tr>
                <td align="center"><?php echo $idDisciplina;?></td>
                <td><?php echo $nom; ?></td>
            </tr>
                <?php
        }
                ?>
        </table>
            
        <hr>
        <h2 align="center"><font color="blue">Buscar Disciplina</font></h2>
        
        <form action="obtenerDisciplina.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
		<input type="submit" name="submit" value="Buscar !!">
	</form>
        <h2 align="right"><a href="disciplinas.php">Atrás</a></h2>
    </body>
</html>
