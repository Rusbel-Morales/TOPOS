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
    $state = "Inactivo"; 
    $additional = $_POST['additional'];

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "INSERT INTO team (team_name, id_league) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $team_name, $id_league);

    if ($stmt->execute()) {

        // Cerramos la consulta preparada 
        $stmt->close();

        // Obtenemos el ID del último registro insertado de la tabla "team"
        $id_team = $conn->insert_id;

        // Preparamos la consulta SQL para evitar inyecciones
        $sql = "INSERT INTO team_member (full_name, email, age, cologne, telephone_contact, state, additional, id_team) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisissi", $full_name, $email, $age, $cologne, $phone, $state, $additional, $id_team);

        if ($stmt->execute()) {

            // Cerramos la consulta preparada
            $stmt->close();
            header("Location: ../html/user/team-member-user.php?id_team=$id_team");
            exit();
        }
    }
    else {
        echo "Error la insertar un nuevo equipo y miembro: " . $stmt->error;
    }

    // Cerramos la conexión 
    $conn->close();
?>