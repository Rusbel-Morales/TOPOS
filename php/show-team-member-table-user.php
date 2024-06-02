<?php

// Variables para notificaciones
$notification = '';
$notificationType = '';

// Editar miembro de equipo 
if (isset($_POST['editMember'])) {
    $editMember = $_POST['editMember'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $cologne = $_POST['cologne'];
    $phone = $_POST['phone'];
    $state = $_POST['state']; 

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "UPDATE team_member SET full_name = ?, email = ?, age = ?, cologne = ?, telephone_contact = ?, state = ? WHERE id_team_member = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisisi", $full_name, $email, $age, $cologne, $phone, $state, $editMember);
    
    if ($stmt->execute()) {
        $notification = '<i class="bi bi-check-circle-fill"></i> ¡Actualizado correctamente!';
        $notificationType = 'success';

        // Cerramos la consulta preparada
        $stmt->close();
    } 
    else {
        $notification = 'Error al actualizar información del miembro seleccionado: ' . $stmt->error;
        $notificationType = 'error';
    }
}

// Eliminar miembro de equipo
if (isset($_POST['deleteMember'])) {
    $deleteMember = $_POST['deleteMember'];

    // Preparamos la consulta SQL para evitar inyecciones
    $sql = "DELETE FROM team_member WHERE id_team_member = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteMember);

    if ($stmt->execute()) {
        $notification = '<i class="bi bi-check-circle-fill"></i> ¡Eliminado correctamente!';
        $notificationType = 'success';

        // Cerramos la consulta preparada
        $stmt->close();
    } 
    else {
        $notification = 'Error al eliminar un miembro: ' . $stmt->error;
        $notificationType = 'error';
    }
}

// Mostrar todos los datos disponibles de la tabla correspondiente y preparamos la consulta SQL para evitar inyecciones
$sql = "SELECT * FROM team_member WHERE id_team = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_team);

if ($stmt->execute()) {

    // Obtiene el resultado de la consulta ejecutada
    $result = $stmt->get_result();
    $cont = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr> 
                <td> <?php echo $cont   ?> </td>
                <td> <?php echo $row['full_name'] ?> <?php echo ($cont == 1) ? "<i class='bi bi-star-fill fs-5' style='color: #ffbf00; margin-left: 5px'>" : '' ?> </i> </td>
                <td> <?php echo $row['email'] ?> </td>
                <td> <?php echo $row['age'] ?> </td>
                <td> <?php echo $row['cologne'] ?> </td>
                <td> <?php echo $row['telephone_contact'] ?> </td>
                <td> 
                    <!-- Botón para editar -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_team_member']?>"> <i class="bi bi-pencil-fill"> </i> </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id_team_member']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark w-100" id="exampleModalLabel"> Editar miembro </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                </div>

                                <!-- Formulario dentro de la ventana emergente  -->
                                <form class="text-dark" name="form" method="post" >
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput" class="fw-bold mb-1"> Nombre completo </label>
                                        <div class="row justify-content-center"> 
                                            <div class="col-8">
                                                <input type="text" class="form-control text-center" id="formGroupExampleInput" name="full_name" placeholder="Inserte un nombre completo" value="<?php echo $row['full_name']?>" required>
                                            </div>                                
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Correo electrónico </label>
                                        <div class ="row justify-content-center">
                                            <div class="col-8">
                                                <input type="email" class="form-control text-center" id="formGroupExampleInput2" name="email" placeholder="russebel15@example.com" value="<?php echo $row['email']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Edad </label>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <input type="number" class="form-control text-center" id="formGroupExampleInput2" name="age" placeholder="Inserte una edad" value="<?php echo $row['age']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Colonia </label>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-center" id="formGroupExampleInput2" name="cologne" placeholder="Inserte una colonia" value="<?php echo $row['cologne']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Teléfono de contacto </label>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-center" id="formGroupExampleInput2" name="phone" placeholder="Inserte un telefono de contacto" value="<?php echo $row['telephone_contact'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-4">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                                        <input type="hidden" name="editMember" value="<?php echo $row['id_team_member']?>">
                                        <button type="submit" class="btn btn-success"> Guardar cambios </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Botón de eliminación-->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMember<?php echo $row['id_team_member']?>"> <i class="bi bi-trash3"> </i> </button>
                        
                    <!-- Modal -->
                    <div class="modal fade" id="deleteMember<?php echo $row['id_team_member']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-18 text-dark w-100" id="msg-color"> <i class="bi bi-exclamation-circle-fill"></i> <span> ¡Advertencia! </span> </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                </div>

                                <!-- Formulario dentro de la ventana emergente  -->
                                <form class="text-dark" method="post">
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput" class="fw-bold mb-1"> ¿Estás seguro de eliminar al miembro: <?php echo $row['full_name']?>? </label>
                                        <div class="row justify-content-center">                             
                                        </div>
                                    </div>

                                    <!--Botones de cerrar ventana emergente y confirmar eliminación de miembro -->
                                    <div class="modal-footer mt-4 text-center justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar </button>
                                        <input type="hidden" name="deleteMember" value="<?php echo $row['id_team_member']?>">
                                        <button type="submit" class="btn btn-success"> Confirmar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            $cont++;
        }
        ?>
        <tr>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td>                 
                <a class="btn btn-primary" href="member-register-user.php?id_team=<?php echo $id_team; ?>"> Agregar jugador </a>
            </td>
        </tr>
        <?php
    } 
    else {
        ?>
        <tr> 
            <td colspan="6"> No se encontraron jugadores para este equipo </td>
            <td>
                <a class="btn btn-primary" href="member-register-user.php?id_team=<?php echo $id_team; ?>"> Agregar jugador </a>
            </td>
        </tr>
        <?php
    }

    // Cerramos la declaración preparada
    $stmt->close();
}

    // Cerramos la conexión
    $conn->close();
?>
