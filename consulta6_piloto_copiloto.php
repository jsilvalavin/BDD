<?php include('../template/header.html'); ?>

<body>

<?php 
    require("../config/conexion.php");

    $query = "SELECT A.pasaporte, B.pasaporte
    FROM aviadores as A, aviadores as B
    WHERE A.pasaporte != B.pasaporte AND (A.pasaporte, B.pasaporte) NOT IN (
        SELECT personal_fpl.pasaporte_piloto, personal_fpl.pasaporte_copiloto
        FROM personal_fpl
        WHERE personal_fpl.fpl_id IN (
            SELECT operaciones_fpl.fpl_id
            FROM operaciones_fpl))
         ;";
    $result = $db -> prepare($query);
    $result -> execute();
    $pilotos = $result -> fetchAll();

    #print_r($propuestas);
    ?>

<table>
    <tr>
        <th>Pasaporte Piloto</th>
        <th>Pasaporte Copiloto</th>
    </tr>

    <?php
    foreach($pilotos as $piloto){
        echo "<tr><td>$propuesta[0]</td><td>$propuesta[1]</td></tr>";
    }
    ?>

</table>


<?php include('../templates/footer.html'); ?>