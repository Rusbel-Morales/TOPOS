<?php 
    require 'databases.php';

    # Agregar una fila
    $id_team = $_POST['id_team'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $cologne = $_POST['cologne'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $additional = $_POST['additional'];

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "INSERT INTO team_member (full_name, email, age, cologne, telephone_contact, state, additional, id_team) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisissi", $full_name, $email, $age, $cologne, $phone, $state, $additional, $id_team);

    if($stmt->execute()) {
        header("Location: ../html/administrator/team-member-admin.php?id_team=$id_team");
        exit();

        //Cerramos la consulta preparada
        $stmt->close();
    }
    else {
        echo "Error al registrar nuevo miembro: " . $stmt->error;
    }
    
    // Cerramos la conexión
    $conn->close();
?>