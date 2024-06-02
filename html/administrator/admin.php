<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../../css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <li> <img src="../../images/logo.png" alt="Topos FC"></li>
            <span class="admin-name">Administrador</span>
        </div>
        <div class="navbar-center">
            <a href="../../html/administrator/team-admin.php">Equipos</a>
            <a href="../../html/administrator/league-admin.php">Ligas</a>
            <a href="../../html/administrator/team-member-admin">Jugadores</a>
            <a href="#">Reservaciones de Cancha</a>
        </div>
        <div class="navbar-right">
            <form action="logout.php" method="post">
                <button class="logout-button">Cerrar Sesión</button>
            </form>
        </div>
    </nav>
    <main class="main-content">
        <div class="overlay">
            <h1>Soy Admin</h1>
        </div>
    </main>
    <section class="estadisticas">

  <div class="container mt-5">
    <table id="tablaequipo" class="table table-striped" style="width:100%">
        <thead class="bg-warning">
            <tr>
                <th>id_equipo</th>
                <th>Equipo</th>
                <th>PJ</th>
                <th>G</th>
                <th>E</th>
                <th >P</th>
                <th>GF</th>
                <th>GC</th>
                <th>DG</th>
                <th>PTS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once 'conexion.php';

            $objeto = new Conexion();
            $conexion = $objeto->Conectar();

            $consulta = "SELECT * FROM equipo";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $equipo = $resultado->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($equipo as $equipos) {
            ?>
            <tr>
                <td><?php echo $equipos['id_equipo']; ?></td>
                <td><?php echo $equipos['nombre_equipo']; ?></td>
                <td><?php echo $equipos['pj']; ?></td>
                <td><?php echo $equipos['g']; ?></td>
                <td><?php echo $equipos['e']; ?></td>
                <td><?php echo $equipos['p']; ?></td>
                <td><?php echo $equipos['gf']; ?></td>
                <td><?php echo $equipos['gc']; ?></td>
                <td><?php echo $equipos['dg']; ?></td>
                <td><?php echo $equipos['pts']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function(){
        $('#tablaequipo').DataTable();
    });
</script>
</section>

<section class = "ligas">
<div class="container mt-5">
    <table id="tablaliga" class="table table-striped" style="width:100%">
        <thead class="bg-warning">
            <tr>
                <th>id_liga</th>
                <th>Liga</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once 'conexion.php';

            $objeto = new Conexion();
            $conexion = $objeto->Conectar();

            $consulta = "SELECT * FROM league";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $equipo = $resultado->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($league as $ligas) {
            ?>
            <tr>
                <td> <?php echo $ligas['id_league'] ?> </td>
                <td> <?php echo $ligas['name'] ?> </td>
                <td> <?php echo $ligas['date_i'] ?> </td>
                <td> <?php echo $ligas['date_e'] ?> </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function(){
        $('#tablaliga').DataTable();
    });
</script>
</section>
</body>
</html>
