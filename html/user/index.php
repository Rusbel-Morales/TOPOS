<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPOS FC</title>
    <link rel="icon" href="../../images/MADRIGUERA-LOGO.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <script src="https://kit.fontawesome.com/564df50bb5.js" crossorigin="anonymous"></script>   

</head>

<header class="pag1">
<nav class="nav-bar">
  <ul id="nav-list">
  <div class="izquierda">
      <li> <img src="../../images/MADRIGUERA-LOGO.png" alt="Topos FC"></li>
      <li> <a href="#Home"> Inicio </a> </li>
      <li> <a href="#News"> Reservas </a> </li>
      <li> <a href="# About Us"> Estadísticas </a> </li>
      <li> <a href="# About Us"> Calendario </a> </li>
      <li> <a href="# About Us"> Ligas </a> </li>
      </div>
      <div id="derecha_b">
        <a class="boton_nav" href="../administrator/login.html">¿Eres administrador?</a>
      </div>
  </ul>
  
</nav>
</header>

<section class="proximos">
    <h2 id="insana4">Proximos partidos!</h2>
<div class="fixtures">
        <div class="fixture">
          <div class="team-logo"></div>
          <div class="vs">VS</div>
          <div class="team-logo"></div>
          <div class="details">
            <p>Sábado / 27 Jul / 2024</p>
            <p>21:00 / Levi's Stadium</p>
          </div>
        </div>
        <!-- Repite el div .fixture para cada partido -->
        <div class="fixture">
            <div class="team-logo"></div>
            <div class="vs">VS</div>
            <div class="team-logo"></div>
            <div class="details">
              <p>Sábado / 27 Jul / 2024</p>
              <p>21:00 / Levi's Stadium</p>
            </div>
          </div>
          <div class="fixture">
            <div class="team-logo"></div>
            <div class="vs">VS</div>
            <div class="team-logo"></div>
            <div class="details">
              <p>Sábado / 27 Jul / 2024</p>
              <p>21:00 / Levi's Stadium</p>
            </div>
          </div>
          
          
      </div>
</section>

<section class="contenedor">
<h1 id="titulo">FUCHO PARA CIEGOS A.C.</h1>
<h3 id="titulo2">El futbol no se ve... se siente,</h3>

</section>

  <h1 id="tit">INICIA LA EMOCION</h1> <!-- PENSAR ALGO DESPUES  -->  

  <section class="Reservas">
  <h1 id="insana">  ¿QUE PUEDES HACER CON TOPOS FC?</h1>
  <div class="cards-grid">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image: url('../../images/DSC_4432.jpg');">

            </div>
            <div class="flip-card-back1">
              <h1>Renta-cancha</h1>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore ratione sapiente sed ut optio
               <a class="botones" id="Registrar"  value="Registrar">Registrar</a>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image: url('../../images/Futbol-Topos-FC.png');">
              

            </div>
            <div class="flip-card-back2">
              <h1>PARTICIPAR EN LIGA</h1>
              Lorem ipsum dolor 
              <a class="botones" id="Registrar" href="form-captain-register.php">Registrar Equipo</a>
            </div>
        </div>
    </div>

    
           
</div>

</section>

<section class="estadisticas">
<h1 id="insana2">  POSICIONES</h1>

  <div class="container mt-5">
    <table id="tablaequipo" class="table table-striped" style="width:100%">
        <thead class="bg-warning">
            <tr>
                <th>Posición</th>
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
            include_once '../../php/conexion.php';

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

<div id="multi">
<a class="boton_esta" href="#">Ver mas</a>
</div>
</section>

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

<section class="cancha">
<div class="wrapper">
<h1 class="section-header"> Conoce sobre nosotros </h1>
<div class ="main-container">
    <div class="box">
        <img src="../../images/3.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
            </div>
        </div>
    </div>
    <div class="box">
        <img src="../../images/4.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
            </div>
        </div>
    </div>
    <div class="box">
        <img src="../../images/11.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
            </div>
        </div>
    </div>
    <div class="box">
        <img src="../../images/DSC_4432.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
            </div>
        </div>
    </div>
    <div class="box">
        <img src="../../images/DSC_4487.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
            </div>
        </div>
    </div>
    <div class="box">
        <img src="../../images/DSC_5009.jpg">
        <div class="img-text">
            <div class="content">
                <h2>Algo que decir</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt quibusdam exceptur</p>
             </div>
            </div>
        </div>
    </div>
</div>

</section>

<footer class="pie-pagina">
    <div class="grupo1">

        <div class="box-footer">
        <figure>
            <a href="#">
                <img src="../../images/MADRIGUERA-LOGO.png" alt="Logo de madriguera">
            </a>
        
        </figure>
    </div>
        <div class="box-footer">
        <h2>SOBRE NOSOTROS</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique?</p>
    </div>
        <div class="box-footer">
            <h2>SIGUENOS</h2>
            <div class="red-social">
                <a href="https://www.facebook.com/ToposFCPuebla/?locale=es_LA" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/toposfcpuebla/" class="fa fa-instagram"></a>
                <a href="https://www.youtube.com/@toposfcpuebla/featured" class="fa fa-youtube"></a>
                <a href="https://twitter.com/ToposFCPuebla" class="fa fa-twitter"></a>
            </div>
    </div>

    <div class="grupo2">
        <small> &copy; 2021 <b>madriguera</b> - Todos los derechos reservados</small>
    </div>
</footer>
</html>