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
            $result = $client->getHorario(array('arg0'=>$id));
            $r = get_object_vars($result); // transforma lo que recibe a un vector
            $r = $r['return']; // asignamos a r el return
            $r = get_object_vars($r); // sacamos las variables de r
            ?>
            <h2 align="center"><font color="blue">Resultado</font></h2>
            <table border="1" align="center">
            <tr>
                <td><b>ID</b></td>
                <td><b>ID_Maestro</b></td>
                <td><b>ID_Sucursal</b></td>
                <td><b>ID_Disciplina</b></td>
            </tr>
            <?php
            $idHorario = $r['id'];
            $id_ma = $r['id_maestro'];
            $id_su = $r['id_sucursal'];
            $id_dis = $r['id_disciplina']; 
            ?>
            <tr>
                <td align="center"><?php echo $idHorario;?></td>
                <td><?php echo $id_ma; ?></td>
                <td><?php echo $id_su; ?></td>
                <td><?php echo $id_dis; ?></td>
            </tr>
                <?php
        }
                ?>
        </table>
        
        <hr>
        <h2 align="center"><font color="blue">Buscar Horario</font></h2>
        
        <form action="obtenerHorario.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
		<input type="submit" name="submit" value="Buscar !!">
	</form>
        <h2 align="right"><a href="horarios.php">Atrás</a></h2>
    </body>
</html>
