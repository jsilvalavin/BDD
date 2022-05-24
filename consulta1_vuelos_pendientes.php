<?php include('../template/header.html'); ?>

<body>

<?php 
    require("../config/conexion.php");

    $query = "SELECT * FROM vuelos WHERE estado = 'pendiente' ;";
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