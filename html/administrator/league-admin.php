<?php
  require '../../php/cache-control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap tiene su propia librería de JavaScript  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Adminitración de ligas </title>

    <!-- Bootstrap designs-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- External CSS file -->
    <link rel="stylesheet" href="../../css/admin.css">

    <!-- JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!--External JavaScript file-->
    <script src="../../scripts/alerts.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand"> <img src="../../images/MADRIGUERA-LOGO.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> Modo administrador </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"> Ligas </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> Reserva de eventos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> Estadísticas </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid d-flex justify-content-center align-items-center margin">
        <div class="col-md-11 bg-white p-4 text-center"> 
            <h2 class="mb-4"> <b> Ligas disponibles </b></h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered align-middle">
                    <thead>
                        <tr>  
                            <th> # </th>
                            <th> Nombre de liga </th>
                            <th> Fecha de inicio </th>
                            <th> Fecha de término </th>
                            <th> Reglas de liga </th>
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../../php/show-league-table.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>



