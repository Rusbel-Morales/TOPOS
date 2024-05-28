<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/capitan.css">
    <title>Equipos</title>
</head>
<body>
    <section class="formulario">
        <h4> Formulario de registro de "MIEMBROS DE EQUIPO" </h4>
        <form action="../../php/capitan.php" method="POST">
            <h3> Introduce tu nombre </h3>
            <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required>
            <br>
            <h3> Introduce tu correo electrónico </h3>
            <input class="controls" type="email" name="correo" id="correo" placeholder="Ingresa tu correo electrónico" required>
            <br>
            <h3> Introduce tu apellido </h3>
            <input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingresa tu apellido" required>
            <br>
            <h3> Introduce tu edad </h3>
            <input class="controls" type="number" name="edad" id="edad" placeholder="Ingresa tu edad" required>
            <br>
            <h3> Introduce tu colonia </h3>
            <input class="controls" type="text" name="colonia" id="colonia" placeholder="Ingresa tu colonia" required>
            <br>
            <h3> Introduce tu teléfono </h3>
            <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingresa tu teléfono" required>
            <br>
            <h3> Escribe el nombre de tu equipo </h3>
            <select class="controls" name="equipo" id="equipo" required>
                <option value="" disabled selected> Selecciona tu equipo </option>
                
                <!-- Llamado del archivo PHP que genera las opciones -->
                <?php 
                    require '../../show-team-table-user.php';
                ?>
            </select>
            <br>
            <h3>¿Cómo se enteró de la Liga "Madriguera"?</h3>
            <select class="controls" name="descubrimiento" required>
                <option value="" disabled selected> Selecciona una opción </option>
                <option value="redes_sociales_de_la_liga"> Redes Sociales de la Liga </option>
                <option value="redes_sociales_de_Topos_FC"> Redes Sociales de Topos FC </option>
                <option value="invitacion_indirecta"> Invitación Directa </option>
                <option value="publicidad_fisica"> Publicidad Física </option>
            </select>
            <br>
            <input class="botones" id="enviar" type="submit" value="Registrarse">
        </form>
    </section>
</body>
</html>
