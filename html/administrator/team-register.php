<?php
    if(isset($_GET['id_league'])) {
        require '../../php/databases.php';
        $id_league = $_GET['id_league'];

        $sql = "SELECT name FROM league WHERE id_league = $id_league";
        $result = $conn->query($sql);
        $league_name = "";

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $league_name = $row['name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registro de equipo:  <?php echo $league_name; ?> </title>

    <!-- Bootstrap designs-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- external CSS file -->
    <link rel="stylesheet" href="../../css/admin.css">

    <!-- JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- external JavaScript file  -->
    <script src="../../scripts/submitForm.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand"> <i class="bi bi-file-text"></i> Registro de equipo </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item mx-2">
                <a class="nav-link btn btn-outline-secondary" aria-current="page" href="#"> <i class="bi bi-eye-fill me-1"></i> Vista previa </a>
              </li>
              <li class="nav-item mx-2">
                <button class="nav-link btn btn-outline-success" href="#" onclick="submitForm()"> <i class="bi bi-check-circle-fill me-1"></i> Enviar registro </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid d-flex justify-content-center align-items-center margin">
        <div class="col-8 bg-white p-4 text-center"> 
            <h2> Crear nuevo equipo ⚽ </h2>
            <form method="post" id="Form" action="../../php/add-team.php">
                <input type="hidden" name="id_league" value="<?php echo $id_league; ?>">
                <div class="form-group mt-3">  
                    <label for="formGroupExampleInput" class="fw-bold mb-1"> Nombre de equipo </label>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <input type="text" class="form-control text-center" name="team_name" id="formGroupExampleInput" placeholder="Escriba un nombre de equipo" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput3" class="fw-bold mb-1"> Nombre de capitán </label>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <input type="text" class="form-control text-center" name="name" id="formGroupExampleInput3" placeholder="Escriba el nombre de un capitan ACTIVO" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5"> 
                    <div class="row justify-content-center"> 
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 text-center">
                            <img src="../../Images/EQUIPO.png" alt="EQUIPO" class="img-fluid" width="400" height="300">
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
</body>
</html>