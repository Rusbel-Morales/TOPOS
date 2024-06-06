<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración Estadisticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../images/MADRIGUERA-LOGO.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> 
                Modo administrador 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="league-admin.php">Ligas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reserva de eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Estadísticas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Espaciador para evitar que el contenido se solape con la barra de navegación fija -->
    <!-- Botones de acceso para las diferentes tablas  -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <select id="league-select" class="form-select text-center">
                    <?php include '../../php/league-statistics.php'; ?>
                </select>
            </div>

            <div class="col-md-4 mt-3 mt-md-0">
                <button id="btn-position-table" class="btn btn-primary w-100 text-white bg-dark border-dark">Posición</button>
            </div>

            <div class="col-md-4 mt-3 mt-md-0">
                <button id="btn-goalscorer-table" class="btn btn-primary w-100 text-white bg-dark border-dark">Goleo</button>
            </div>
        </div>
    </div>

    <!-- Tabla de goleo (oculta inicialmente) -->
    <div class="container text-center mt-5 goalscorer-table">
        <!-- Tabla de goleo  -->
        <div class="container text-center mt-5">
            <div class="row justify-content-center mx-1">
                <div class="card col-sm-8 col-md-12 col-lg-10 col-xl-8">
                    <div class="card-body">
                        <h2 class="card-title fw-bolder py-3"> Tabla de goleo </h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th> Posición </th>
                                        <th> Jugador </th>
                                        <th> Equipo </th>
                                        <th> Goles </th>
                                    </tr>
                                </thead>
                                <tbody id="goalscorer-table">
                                  <?php include 'goalscorer.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de posición (visible inicialmente) -->
    <div class="container text-center mt-5 position-table">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title fw-bolder mb-4"> Tabla de posición </h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-dark text-light table-bordered align-middle" id="adm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Posición</th>
                                <th>Equipo</th>
                                <th>PJ</th>
                                <th>G</th>
                                <th>E</th>
                                <th>P</th>
                                <th>GF</th>
                                <th>GC</th>
                                <th>DG</th>
                                <th>PTS</th>
                                <th class="text-center"><i class="bi bi-pencil"></i></th>
                            </tr>
                        </thead>
                        <tbody id="position-table">
                            <?php include('separar.php'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="for_adm">
                        <div class="mb-3">
                            <label for="recipient-name" id="id_eli" class="col-form-label">ID:</label>
                            <input type="hidden" class="form-control" id="id_team_" name="id_team_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">PJ:</label>
                            <input type="text" class="form-control" id="pj_" name="pj_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">G:</label>
                            <input type="text" class="form-control" id="g_" name="g_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">E:</label>
                            <input type="text" class="form-control" id="e_" name="e_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">P:</label>
                            <input type="text" class="form-control" id="p_" name="p_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">GF:</label>
                            <input type="text" class="form-control" id="gf_" name="gf_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">GC:</label>
                            <input type="text" class="form-control" id="gc_" name="gc_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">DG:</label>
                            <input type="text" class="form-control" id="dg_" name="dg_">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">PTS:</label>
                            <input type="text" class="form-control" id="pts_" name="pts_">
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="modificar_adm">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center my-5">
    <div class="row justify-content-center">
        <div class="card col-sm-8 col-md-12 col-lg-10 col-xl-8 pb-5">
            <div class="card-body">
                <h2 class="card-title fw-bolder">Registrar partido</h2>
            </div>
            <div class="form-group mt-3">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <label for="select-team-1" class="fw-bold mb-1"> Equipo 1 </label> 
                        <select class="form-select text-center w-100" id="select-team-1">
                            <!-- opciones del equipo 1 -->
                        </select>
                    </div>  
                    <div class="col-auto">
                        <p class="fw-bolder">VS</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <label for="select-team-2" class="fw-bold mb-1"> Equipo 2 </label>
                        <select class="form-select text-center w-100" id="select-team-2">
                            <!-- opciones del equipo 2 -->
                        </select>
                    </div>                                  
                </div>  
                <div class="row justify-content-center align-items-center mt-2">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <label for="select-team-1" class="fw-bold mb-1"> </label> 
                        <select class="form-select text-center w-100" id="select-team-1">
                            <!-- opciones del equipo 1 -->
                        </select>
                    </div>  
                    <div class="col-auto">
                        <p class="fw-bolder">VS</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <label for="select-team-2" class="fw-bold mb-1"> Equipo 2 </label>
                        <select class="form-select text-center w-100" id="select-team-2">
                            <!-- opciones del equipo 2 -->
                        </select>
                    </div>                                  
                </div>                  
            </div>
        </div>
    </div>
</div>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../administrator/funciones.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const btnPosition = document.getElementById("btn-position-table");
        const btnGoalscorer = document.getElementById("btn-goalscorer-table");
        const positionTable = document.querySelector(".position-table");
        const goalscorerTable = document.querySelector(".goalscorer-table");

        // Tablas por defecto
        positionTable.style.display = "block";
        goalscorerTable.style.display = "none";

        btnPosition.addEventListener("click", function () {
            positionTable.style.display = "block";
            goalscorerTable.style.display = "none";
        });

        btnGoalscorer.addEventListener("click", function () {
            goalscorerTable.style.display = "block";
            positionTable.style.display = "none";
        });

        function loadInitialTable() {
            let id_league = document.getElementById('league-select').value;
            changePositionTable(id_league);
            changeGoalscorerTable(id_league);
        }

        loadInitialTable();
        
        function changePositionTable(id_league) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'separar.php?id_league=' + id_league, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('position-table').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        function changeGoalscorerTable(id_league) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'goalscorer.php?id_league=' + id_league, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('goalscorer-table').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        document.getElementById('league-select').addEventListener('change', function () {
            changePositionTable(this.value);
            changeGoalscorerTable(this.value);
        });
      });
    </script>
</body>
</html>
