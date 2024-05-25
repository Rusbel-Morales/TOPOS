<?php 
    require 'databases.php';
    $id_league = $_POST['id_league'];

    $team_name = $_POST['team_name'];
    // Nombre de capitán
    $name = $_POST['name'];
    
    $sql = "INSERT INTO team (team_name, id_league) VALUES ('$team_name', $id_league)";
    if ($conn->query($sql) === True) {
        header("Location: ../html/administrator/team-admin.php?id_league=$id_league");
        exit;
    }
    else {
            echo "Error al insertar el nuevo equipo: " . $conn->error;
    }
    $conn->close();
?>