<?php
    require 'databases.php';

    // Seleccionar todos los equipos disponibles
    $sql = "SELECT * FROM team";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <option > <?php echo $row['team_name']; ?></option>
            <?php
        }
    } 
    // Cerramos la conexión
    $conn->close();

?> 