<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forestawebbd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre_torneo = $_POST['nombre_torneo'];
$equipo_1 = $_POST['equipo_1'];
$equipo_2 = $_POST['equipo_2'];
$resultado = $_POST['resultado'];
$fechapartidos = $_POST['fechapartidos'];

// Manejo de logos de equipos
$logo_equipo_1 = $_FILES['logo_equipo_1']['name'];
$temp_logo_1 = $_FILES['logo_equipo_1']['tmp_name'];
$carpeta_logo_1 = "../img/logo-equipos/" . $logo_equipo_1;
move_uploaded_file($temp_logo_1, $carpeta_logo_1);

$logo_equipo_2 = $_FILES['logo_equipo_2']['name'];
$temp_logo_2 = $_FILES['logo_equipo_2']['tmp_name'];
$carpeta_logo_2 = "../img/logo-equipos/" . $logo_equipo_2;
move_uploaded_file($temp_logo_2, $carpeta_logo_2);

$sql = "INSERT INTO partidos (nombre_torneo, equipo_1, equipo_2, resultado, fechapartidos, logo_equipo_1, logo_equipo_2)
        VALUES ('$nombre_torneo', '$equipo_1', '$equipo_2', '$resultado', '$fechapartidos', '$carpeta_logo_1', '$carpeta_logo_2')";

if ($conn->query($sql) === TRUE) {
    echo "Partido registrado correctamente";
} else {
    echo "Error al registrar el partido: " . $conn->error;
}

$conn->close();
?>