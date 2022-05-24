<?php include('../template/header.html'); ?>

<body>

<?php 
    require("../config/conexion.php");
    $fecha = $_POST["fecha"];

    $query = "SELECT licencias_aviadores.pasaporte  FROM licencias, licencias_aviadores WHERE 
    licencias.certificado_id = licencias_aviadores.certificado_id AND licencias.fecha_habilitacion <= $fecha 
    AND licencia.fecha_termino >= $fecha ;" ;
    $result = $db -> prepare($query);
    $result -> execute();
    $pilotos = $result -> fetchAll();

    #print_r($propuestas);
    ?>

<table>
    <tr>
        <th>Pasaporte Piloto</th>
    </tr>

    <?php
    foreach($pilotos as $piloto){
        echo "<tr><td>$propuesta[0]</td></tr>";
    }
    ?>

</table>

<?php include('../templates/footer.html'); ?>