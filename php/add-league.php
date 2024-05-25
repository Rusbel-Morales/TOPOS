<?php 
    require 'databases.php';

    # Agregar una fila
    $name = $_POST['name'];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];

    $descriptions = $_POST['description'];
    $details = $_POST['details']; 

    $sql = "INSERT INTO league (name, date_i, date_e) VALUES ('$name', '$date', '$date2')";

    if ($conn->query($sql) === True) {
        // Obtener el "id" del último registro insertado
        $id_league = $conn->insert_id;
        for ($i = 0; $i <= count($descriptions); $i++) {
            $description = $descriptions[$i];
            $detail = $details[$i];

            $sql = "INSERT INTO league_rules (description, details, id_league) VALUES ('$description', '$detail', '$id_league')";

            if ($conn->query($sql) === True) {
            }
        }
        header("Location: ../html/administrator/league-admin.php");
        exit();

    }
    else {
        echo "Error al registrar un nuevo liga: " . $conn->error;
    }

    $conn->close();
?>