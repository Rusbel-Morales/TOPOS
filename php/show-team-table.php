<?php
    // Editar equipo
    if (isset($_POST['editTeam'])) {
        $id_team = $_POST['editTeam'];
        $team_name = $_POST['name'];

        $sql = "UPDATE team SET team_name = '$team_name' WHERE id_team = $id_team";

        if ($conn->query($sql) === True) {}
        else echo "Error al eliminar el equipo" . $conn->error;
    }

    // Obtener todos los equipos relacionados con una liga 
    $sql = "SELECT * FROM team WHERE id_league = $id_league";
    $result = $conn->query($sql);
    $cont = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <td><?php echo $row['team_name']; ?></td>
            <td> 
                <!-- Botón para editar -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_team']?>"> <i class="bi bi-pencil-fill"> </i> </button>
                              
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $row['id_team']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark w-100" id="exampleModalLabel"> Editar equipo </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                            </div>

                            <!-- Formulario dentro de la ventana emergente  -->
                            <form class="text-dark" method="post">
                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput" class="fw-bold mb-1"> Nombre de equipo </label>
                                    <div class="row justify-content-center"> 
                                        <div class="col-8">
                                            <input type="text" class="form-control text-center" id="formGroupExampleInput" name="name" placeholder="Nombre de equipo" value="<?php echo $row['team_name']?>" required>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                                    <input type="hidden" name="editTeam" value="<?php echo $row['id_team'] ?>">
                                    <button type="submit" class="btn btn-success"> Guardar cambios </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form method="post" id="form">
                    <input type="hidden" name="deleteTeam" value="<?php echo $row['id_team']?>">
                    <button class="btn btn-danger mx-2" type="submit"> <i class="bi bi-trash3"> </i> </button>
                </form>

                <a class="btn btn-warning" href="team-member-admin.php?id_team=<?php echo $row['id_team'] ?>"> <i class="bi bi-person-fill"> </i> Administrar miembros </a>
                <?php $cont++; ?>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr> 
            <td> ... </td>
            <td> ... </td>
            <td> <a class="btn btn-primary" href="team-register.php?id_league=<?php echo $id_league?>"> Agregar equipo </a> </td>
        </tr>
    <?php
    }

    else {
        ?>
        <tr> 
            <td colspan="2"> No se encontraron equipos para esta liga </td>
            <td>
                <a class="btn btn-primary" href="team-register.php?id_league=<?php echo $id_league?>"> Agregar equipo </a>
            </td>
        </tr>
        <?php
    }
?>