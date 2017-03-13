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
        <h1 align="center"><font color="red">Registros de Salidas</font></h1>
        <?php
        //url del servicio
        $servicio = 'http://localhost/ClienteProy/servicio.php?wsdl'; 
        $client = new SoapClient($servicio);
        
        $parametros = array();
        $lista = $client->getRecibosSalientes($parametros);      
        ?>
        <table border="1" align="center">
            <tr>
                <td><b>ID ReciboS</b></td>
                <td><b>ID Maestro</b></td>
                <td><b>Cantidad</b></td>
                <td><b>Fecha</b></td>
            </tr>
            <?php
                foreach ($lista as $x) {
                    $x = get_object_vars($x);
                    $id_recibo = $x['Id_reciboS'];
                    $id_maestro = $x['Id_maestro'];
                    $cantidad = $x['Cantidad'];
                    $fecha = $x['Fecha'];               
            ?>
            
            <tr>

                <td align="center"><?php echo $id_recibo;?></td>
                <td><?php echo $id_maestro; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $fecha; ?></td>
            </tr>
                <?php
                }
                ?>
        </table>
        <h2 align="right"><a href="contador.php">Atrás</a></h2>
    </body>
</html>
