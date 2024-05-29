<?php 
    require 'databases.php';

    // Agregar datos de equipo a la tabla "team"
    $id_league = $_POST['id_league'];
    $team_name = $_POST['team_name'];

    // Agregar datos de capitán a la tabla "team-member"
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $cologne = $_POST['cologne'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $additional = $_POST['additional'];
    
    //Preparamos la consulta SQL para evitar inyecciones (tabla "team")
    $sql = "INSERT INTO team (team_name, id_league) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $team_name, $id_league);
    
    if ($stmt->execute()) {
        
        // Cerramos la declaración preparada para la tabla "team"
        $stmt->close();

        // Extraemos el ID del último registro insertado en la tabla "team"
        $id_team = $conn->insert_id;

        // Preparamos la consulta SQL para evitar inyecciones (tabla "team-member")
        $sql = "INSERT INTO team_member (full_name, email, age, cologne, telephone_contact, state, additional, id_team) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisissi", $full_name, $email, $age, $cologne, $phone, $state, $additional, $id_team);

        if ($stmt->execute()) {
            
            // Cerramos la declaración preparada para la tabla "team-member"
            $stmt->close();
            header("Location: ../html/administrator/team-admin.php?id_league=$id_league");
            exit();
        }
    }
    else {
        echo "Error al insertar el nuevo equipo: " . $stmt->error;
    }

    //Cerramos la conexión
    $conn->close();
?>