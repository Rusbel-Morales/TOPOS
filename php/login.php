<?php
    require 'databases.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $username);

    if ($stmt->execute()) {

        // Obtenemos el resultado de la consulta ejecutada
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $datauser = $result->fetch_assoc();
    
            if ($password === $datauser['password']) {
                header("Location: ../html/administrator/league-admin.php");
                exit;
            }
            else {
                echo "Usuario o contraseña incorrecta";
                exit;
            }
        }
        else {
            echo "Error total";
        }

        // Cerramos la declaración preparada 
        $stmt->close();
    }

    $conn->close();
?>