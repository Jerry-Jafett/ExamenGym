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
            if (isset($_GET['id_ma'])) {
                    $id_ma = $_GET['id_ma'];
            }
            if (isset($_GET['id_su'])) {
                    $id_su = $_GET['id_su'];
            }
            if (isset($_GET['id_dis'])) {
                    $id_dis = $_GET['id_dis'];
            }
            if (isset($_GET['id'])) {
                    $id = $_GET['id'];
            }
            $horario = array('id'=>$id,'id_maestro'=>$id_ma,'id_sucursal'=>$id_su,'id_disciplina'=>$id_dis);
            $peticion = array('arg0' => $horario);
            $result = $client -> registraHorario($peticion);
            echo "Registro Insertado";
        }
        ?>
        
        <h2 align="center"><font color="blue">Nuevo Registro</font></h2>
	
        <form action="registrarHorario.php" method="get" align="center">
                ID: <input type="number" name="id"><br><br>
                ID_Maestro: <input type="number" name="id_ma"><br><br>
		ID_Sucursal: <input type="number" name="id_su"><br><br>
                ID_Disciplina: <input type="number" name="id_dis"><br><br>
		<input type="submit" name="submit" value="Inscribir !!">
	</form>
        <h2 align="right"><a href="horarios.php">Atrás</a></h2>
    </body>
</html>
