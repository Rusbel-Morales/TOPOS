<?php 
    require 'databases.php';

    # Agregar una fila
    $name = $_POST['name'];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $descriptions = $_POST['description'];
    $details = $_POST['details'];

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "INSERT INTO league (name, date_i, date_e) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $date, $date2);

    if ($stmt->execute()) {
        // Obtener el "id" del último registro insertado
        $id_league = $conn->insert_id;
        $stmt->close(); // Cerramos la declaración preparada para la tabla league

        // Preparamos la consulta SQL para league_rule
        $sql = "INSERT INTO league_rule (description, details, id_league) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Comprobamos si la preparación de la declaración fue exitosa
        for ($i = 0; $i < count($descriptions); $i++) { // Cambié <= por < para evitar un índice fuera de rango
            $description = $descriptions[$i];
            $detail = $details[$i];
            $stmt->bind_param("ssi", $description, $detail, $id_league);
            if (!$stmt->execute()) {
                echo "Error al insertar una regla de liga: " . $stmt->error;
            }
        }

        // Cerramos la declaración preparada para la tabla league_rule
        $stmt->close();

        // Redireccionamos después de la inserción exitosa
        header("Location: ../html/administrator/league-admin.php");
        exit();
        
    } 
    else {
        echo "Error al registrar una nueva liga: " . $stmt->error;
    }

    // Cerramos la conexión
    $conn->close();
?>
