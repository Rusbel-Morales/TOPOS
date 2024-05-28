<?php
  require '../../php/cache-control.php';

  if(isset($_GET['id_team'])) {
      require '../../php/databases.php';
      $id_team = $_GET['id_team'];

      // Preparamos la consulta SQL para evitar inyecciones
      $sql = "SELECT team_name FROM team WHERE id_team = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id_team);

      if ($stmt->execute()) {
        // Obtenemos el resultado de la declaración preparada
        $result = $stmt->get_result();
        $team_name = "";
        if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $team_name = $row['team_name'];
        }

        // Cerramos la declaración preparada
        $stmt->close();
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $team_name; ?></title>
    <!-- Bootstrap designs-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- External CSS file -->
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/alerts.css">
    
    <!-- JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center margin">
        <div class="col-md-11 bg-white p-4 text-center"> 
            <h2 class="mb-4"> <b> Miembros de equipo </b></h2>
            <p class="fw-bolder"  style="text-align: left; margin-left: 25px"> <i class="bi bi-star-fill fs-5" style="color: #ffbf00;"> </i> - Left aligned text on all viewport sizes</p>
            <div class="table-responsive">
                <table class="table table-dark table-bordered align-middle">
                    <thead>
                        <tr>  
                            <th> # </th>
                            <th> Nombre completo </th>
                            <th> Correo electrónico </th>
                            <th> Edad </th>
                            <th> Colonia </th>
                            <th> Telefono <br> de contacto </th>
                            <th> Estado </th> 
                            <th> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../../php/show-team-member-table.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- div en el que se insertan las alertas  -->
    <div id="toastBox" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>

    <!-- Notificaciones JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notification = '<?php echo $notification; ?>';
            var notificationType = '<?php echo $notificationType; ?>';

            if (notification) {
                showToast(notification, notificationType);
            }
        });

        function showToast(message, type) {
            var toastContainer = document.getElementById('toastBox');
            var toast = document.createElement('div');
            toast.className = 'toast';
            toast.classList.add('show', type);
            toast.setAttribute('role', 'alert');
            toast.innerHTML = message;

            toastContainer.appendChild(toast);

            setTimeout(function() {
                toast.classList.remove('show');
                toastContainer.removeChild(toast);
            }, 5000);
        }
    </script>
</body>
</html>
