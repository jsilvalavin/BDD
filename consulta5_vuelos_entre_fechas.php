<?php include('../template/header.html'); ?>

<body>

<?php 
    require("../config/conexion.php");
    $fecha_1 = $_POST["fecha_1"];
    $fecha_2 = $_POST["fecha_2"];

    $query = " SELECT aeronaves_operaciones.codigo_aeronave, COUNT(aeronaves_operaciones.id_operacion)
    FROM aeronaves_operaciones, operaciones
    WHERE aeronaves_operaciones.operacion_id = operaciones.operacion_id AND date(operaciones.hora_despegue) >=
    $fecha_1 AND date(operaciones.hora_arribo) >= $fecha_2
    GROUP BY aeronaves_operaciones.codigo_aeronave ;";
    $result = $db -> prepare($query);
    $result -> execute();
    $pilotos = $result -> fetchAll();

    #print_r($propuestas);
    ?>

<table>
    <tr>
        <th>codigo_aeronave</th>
        <th>Numero Vuelos</th>
    </tr>

    <?php
    foreach($pilotos as $piloto){
        echo "<tr><td>$propuesta[0]</td><td>$propuesta[1]</td></tr>";
    }
    ?>

</table>

<?php include('../templates/footer.html'); ?>