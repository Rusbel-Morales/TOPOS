<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPOS FC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

    
</head>


<header class="pag1">
<nav class="nav-bar">
  <ul id="nav-list">
      <li> <img src="../../Images/LOGO-PRINCIPAL.png" alt="Topos FC"></li>
      <li> <a href="#Home"> Inicio </a> </li>
      <li> <a href="#News"> Reservas </a> </li>
      <li> <a href="# About Us"> Estadísticas </a> </li>
      <li> <a href="# About Us"> Calendario </a> </li>
      <li> <a href="# About Us"> Ligas </a> </li>
  </ul>
</nav>
</header>

<section class="contenedor">
<h1 id="titulo">FUCHO PARA CIEGOS A.C.</h1>
<h3 id="titulo2">El futbol no se ve... se siente,</h3>
<button class="button">Conoce más</button>
</section>


  <h1 id="tit">ENCUENTRA LA AVENTURA</h1> <!-- PENSAR ALGO DESPUES  -->  

  

  <section class="Reservas">

  <h1 id="insana">  ¿QUE PUEDES HACER CON TOPOS FC?</h1>




  <div class="cards-grid">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image: url('../../Images/Asistencia.png ');">

            </div>
            <div class="flip-card-back">
              <h1>Renta de cancha</h1>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore ratione sapiente sed ut optio
               <input class="botones" id="enviar" type="submit" value="Enviar">
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image: url('../../Images/EQUIPO.png');">
              

            </div>
            <div class="flip-card-back">
              <h1>TORNEO</h1>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore ratione sapiente sed ut optio
              <input class="botones" id="Registrar" type="submit" value="Enviar">
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image: url('../../Images/topos_noti.png');">

            </div>
            <div class="flip-card-back">
              <h1>Renta de cancha</h1>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore ratione sapiente sed ut optio
              <input class="botones" id="enviar" type="submit" value="Enviar">
            </div>
        </div>
    </div>
</div>

</section>

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




          
      

  

  
 








</html>

