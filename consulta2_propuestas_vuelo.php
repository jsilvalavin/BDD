<?php include('../template/header.html'); ?>

<body>

<?php 
    require("../config/conexion.php");
    $aerodromo = $_POST["aerodromo"];
    $codigo_destino = $_POST["codigo_destino"];

    $query = "SELECT vuelos.id FROM vuelos, aerodromos_salida, aerodromos_llegada 
    WHERE vuelos.propuesta_vuelo_id =  aerodromos_salida.propuesta_vuelo_id AND 
    aerodromos_llegada.propuesta_vuelo_id = vuelos.propuesta_vuelo_id AND vuelos.estado = 'aceptado'
     AND aerodromos_llegada.id_aerodromo = $codigo_destino AND aerodromos_salida.id_aerodromo = $aerodromo; ";
    $result = $db -> prepare($query);
    $result -> execute();
    $propuestas = $result -> fetchAll();

    #print_r($propuestas);
    ?>

<table>
    <tr>
        <th>Id</th>
    </tr>

    <?php
    foreach($propuestas as $propuesta){
        echo "<tr><td>$propuesta[0]</td></tr>";
    }
    ?>

</table>

<?php include('../templates/footer.html'); ?>