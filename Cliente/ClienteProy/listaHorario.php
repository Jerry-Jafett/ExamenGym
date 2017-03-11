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
        <h1 align="center"><font color="red">Registros de Horarios</font></h1>
        <?php
        $servicio = "http://localhost:8080/ProyectoGym/registro_personas?WSDL"; //url del servicio
        
        $client = new SoapClient($servicio);
        $result = $client->getHorarios();
        $result = get_object_vars($result);
        $r = $result['return'];
        
        ?>
        <table border="1" align="center">
            <tr>
                <td><b>ID</b></td>
                <td><b>ID_Maestro</b></td>
                <td><b>ID_Sucursal</b></td>
                <td><b>ID_Disciplina</b></td>
            </tr>
            <?php
                foreach($r as $al){
                    $al = get_object_vars($al);
                    $idHorario = $al['id'];
                    $id_ma = $al['id_maestro'];
                    $id_su = $al['id_sucursal'];
                    $id_dis = $al['id_disciplina'];                
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
        <h2 align="right"><a href="horarios.php">Atrás</a></h2>
    </body>
</html>
