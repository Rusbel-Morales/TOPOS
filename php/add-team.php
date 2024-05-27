<?php 
    require 'databases.php';
    
    $id_league = $_POST['id_league'];

    $team_name = $_POST['team_name'];

    // $name = $_POST['name'];
    
    //Preparamos la consulta SQL para evitar inyecciones
    $sql = "INSERT INTO team (team_name, id_league) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $team_name, $id_league);
    
    if ($stmt->execute()) {
        header("Location: ../html/administrator/team-admin.php?id_league=$id_league");
        exit();

        // Cerramos la declaración preparada 
        $stmt->close();
    }
    else {
            echo "Error al insertar el nuevo equipo: " . $stmt->error;
    }

    //Cerramos la conexión
    $conn->close();
?>