<?php
    require 'databases.php';

    # Editar una fila 
    if (isset($_POST['editLeague'])) {
        $editLeague = $_POST['editLeague']; 
        $name = $_POST['name'];
        $date = $_POST['date'];
        $date2 = $_POST['date2'];

        $sql = "UPDATE league SET name='$name', date_i ='$date', date_e = '$date2' WHERE id_league = '$editLeague'"; 
        if ($conn->query($sql) === True) {}
        else echo "Error al actualizar información de la liga seleccionado: ". $conn->error;
    }

    # Eliminar una fila según sea correpondiente 
    if (isset($_POST['deleteLeague'])) {
        $deleteLeague = $_POST['deleteLeague'];
        
        $sql = "DELETE FROM league WHERE id_league = $deleteLeague";
        if ($conn->query($sql) === True) {}
        
        else echo "Error al eliminar la liga: " . $conn->error;
    }
    
    // Mostrar todo el contenido de la base de datos
    $sql = "SELECT * FROM league";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) { 
        while ($row = $result->fetch_assoc()) {
            ?>

            <!-- html -->
            <tr>
                <td> <?php echo $row['id_league'] ?> </td>
                <td> <?php echo $row['name'] ?> </td>
                <td> <?php echo $row['date_i'] ?> </td>
                <td> <?php echo $row['date_e'] ?> </td>
                <td>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#details<?php echo $row['id_league'] ?>"> <i class="bi bi-list-ul"> </i> </button>   
                </td>    
                                                
                <!-- Esta parte está terminado -->
                
                <td> 
                    <!-- Botón para editar -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_league'] ?>"> <i class="bi bi-pencil-fill"> </i> </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id_league'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark w-100" id="exampleModalLabel"> Editar liga:  <?php echo $row['name'] ?> 🏆 </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                </div>

                                <!-- Formulario dentro de la ventana emergente  -->
                                <form class="text-dark" method="post">
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput" class="fw-bold mb-1"> Nombre </label>
                                        <div class="row justify-content-center"> 
                                            <div class="col-8">
                                                <input type="text" class="form-control text-center" id="formGroupExampleInput" name="name" placeholder="Nombre de liga" value="<?php echo $row['name'] ?>" required>
                                            </div>                                
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Fecha de inicio </label>
                                        <div class ="row justify-content-center">
                                            <div class="col-8">
                                                <input type="datetime-local" class="form-control text-center" id="formGroupExampleInput2" name="date" placeholder="Selecciona una fecha" value="<?php echo $row['date_i'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Fecha de término </label>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <input type="datetime-local" class="form-control text-center" id="formGroupExampleInput2" name="date2" placeholder="Selecciona una fecha" value="<?php echo $row['date_e'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput2" class="fw-bold mb-1"> Reglas de liga </label>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-center" id="formGroupExampleInput2" name="details" placeholder="..." value="<?php echo $row['details'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-4">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                                        <input type="hidden" name="editleague" value="<?php echo $row['id_league']?>">
                                        <button type="submit" class="btn btn-success"> Guardar cambios </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                        
                    <!--Botón de eliminación-->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMember<?php echo $row['id_league']?>"> <i class="bi bi-trash3"> </i> </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="deleteMember<?php echo $row['id_league']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-18 text-dark w-100" id="msg-color"> <i class="bi bi-exclamation-circle-fill"></i> <span> ¡Advertencia! </span> </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
        
                                    <!-- Formulario dentro de la ventana emergente  -->
                                    <form class="text-dark" method="post">
                                        <div class="form-group mt-3">
                                            <label for="formGroupExampleInput" class="fw-bold mb-1"> ¿Estás seguro de eliminar a la liga: <?php echo $row['name']?>? </label>
                                            <div class="row justify-content-center">                             
                                            </div>
                                        </div>
        
                                        <!--Botones de cerrar ventana emergente y confirmar eliminación de miembro -->
                                        <div class="modal-footer mt-4 text-center justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar </button>
                                            <input type="hidden" name="deleteLeague" value="<?php echo $row['id_league']?>">
                                            <button type="submit" class="btn btn-success"> Confirmar </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <!-- El signo de ? indica el comienzo de la cadena de consula, es decir, pasa un parámetro a otra página a través de la URL-->
                    <a class="btn btn-warning" href="team-admin.php?id_league=<?php echo $row['id_league'] ?>"> <i class="bi bi-shield-fill"></i> </i> Administrar equipos </a>
                </td>
            </tr>
            <?php
        }
        ?>

        <!-- Ultima botón  -->
        <tr> 
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>
            <td> ... </td>

            <!-- Botón para agregar -->
            <td>
                <a class="btn btn-primary" href="league-register.html"> Agregar liga </a>
            </td>
        <tr>
        <?php
    }
    else {
        ?>
        <tr> 
            <td colspan="5"> No se encontraron ligas para participar  </td>
            <td>
                <a class="btn btn-primary" href="league-register.html"> Agregar liga </a>
            </td>
        </tr>
        <?php
    }

    $conn->close();
?>