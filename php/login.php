<?php
    require 'databases.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username'";

    $result = $conn->query($sql);
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
        echo "Rusbel Alejandro Morales Méndez";
    }

    $conn->close();
?>