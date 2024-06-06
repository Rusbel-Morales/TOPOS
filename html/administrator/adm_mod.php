<?php
include("c.php");

// Recibir los datos del formulario
$id_team = $_POST['id_team_'];
$pj = $_POST['pj_'];
$g = $_POST['g_'];
$e = $_POST['e_'];
$p = $_POST['p_'];
$gf = $_POST['gf_'];
$gc = $_POST['gc_'];
$dg = $_POST['dg_'];
$pts = $_POST['pts_'];

$cambiar = "UPDATE estadistica_nueva SET 
    pj = '$pj',
    g = '$g', 
    e = '$e', 
    p = '$p', 
    gf = '$gf', 
    gc = '$gc', 
    dg = '$dg', 
    pts = '$pts'
    WHERE id_team = '$id_team'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $cambiar);

// Cerrar la conexión
mysqli_close($conexion);
?>

