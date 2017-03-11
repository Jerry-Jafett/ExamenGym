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
        $result = $client->getDisciplinas();
        $result = get_object_vars($result);
        $r = $result['return'];
        
        ?>
        <table border="1" align="center">
            <tr>
                <td><b>ID</b></td>
                <td><b>Nombre</b></td>
            </tr>
            <?php
                foreach($r as $al){
                    $al = get_object_vars($al);
                    $idDisciplina = $al['id'];
                    $nom = $al['nombre'];                
            ?>
            
            <tr>

                <td align="center"><?php echo $idDisciplina;?></td>
                <td><?php echo $nom; ?></td>
            </tr>
                <?php
                }
                ?>
        </table>
        <h2 align="right"><a href="disciplinas.php">Atrás</a></h2>
    </body>
</html>
