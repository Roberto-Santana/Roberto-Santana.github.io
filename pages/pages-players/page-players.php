<?php
setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'Spanish_Spain', 'es', 'es_MX.utf8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forestawebbd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del jugador desde la URL
$id_jugador = isset($_GET['id']) ? $_GET['id'] : 1; // El valor predeterminado es 1 si no se proporciona un ID

// Consulta SQL para obtener los datos del jugador (ajusta la consulta según tu base de datos)
$sql = "SELECT nombre, apellido, fechanac, nacionalidad, altura, imagen, descripcion FROM jugadores WHERE id = $id_jugador";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Variables con los datos del jugador
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $fechanac = $row["fechanac"];
    $fecha_nacimiento = strftime("%e de %B del %Y", strtotime($fechanac));
    $nacionalidad = $row["nacionalidad"];
    $altura = $row["altura"];
    $imagen = $row["imagen"];
    $descripcion = $row["descripcion"];
} else {
    echo "No se encontraron resultados para el ID proporcionado.";
}

$sqledad = "SELECT fechanac FROM jugadores WHERE id = $id_jugador LIMIT 1"; // Ajusta la consulta según tu estructura
$resultedad = $conn->query($sqledad);

if ($resultedad->num_rows > 0) {
    $row = $resultedad->fetch_assoc();

    // Calcular la edad
    $fecha_nacimientoe = new DateTime($fechanac);
    $fecha_actual = new DateTime();
    $diferencia = $fecha_actual->diff($fecha_nacimientoe);
    $edad = $diferencia->y; // Extraer el componente de años
    $fecha_nacimiento_str = $fecha_nacimientoe->format('l j \de F \del Y');
} else {
    $edad = "Edad no disponible";
    $fecha_nacimiento_str = "Fecha no disponible";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/equipos.css">
</head>
<body style="margin: none;">
    <div class="navbarlogo">
        <div class="logo">
            <a href="../../index.php"><img src="../../img/logo.png" alt="logo_cdlaforesta"></a>
        </div>
        <div class="redes-sociales_navbar">
            <a href="#"><img style="width: 50px; margin-right: 10px;" src="../../img/logo_fermall_navbar.png" alt="fermall"></a>
            <div class="separator"></div>
            <a href="#"><img src="../../img/logo_twitter_navbar.png" alt="twitter"></a>
            <a href="#"><img src="../../img/logo_instagram_navbar.png" alt="instagram"></a>
            <a href="#"><img src="../../img/logo_youtube_navbar.png" alt="youtube"></a>
            <a href="#"><img src="../../img/logo_facebook_navbar.png" alt="facebook"></a>
            <a href="#"><img src="../../img/logo_tiktok_navbar.png" alt="tiktok"></a>
            <a href="#"><img style="width: 40px; margin-left: 30px; margin-right: 20px;" src="../../img/logo_user_navbar.png" alt="user"></a>
        </div>
    </div>
    <div class="navbarnavegacion">
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="../equipos.php">Equipos</a></li>
            <li><a href="#servicios">El Club</a></li>
            <li><a href="#contacto">Noticias</a></li>
            <li><a href="#contacto">Partidos</a></li>
            <li><a href="#contacto">Escuelas</a></li>
            <li><a href="#contacto">Tienda</a></li>
        </ul>
    </div>

    <div class="bannerjugador"><img src="<?php echo $imagen; ?>" alt="bannerjugador"></div>

    <div class="barra-informacion">
        <div class="bandera">
            <img style="height: 35px;" src="<?php echo $nacionalidad; ?>" alt="Bandera">
        </div>
        <div class="nombre-apellido">
            <p style="font-size: 30px;"><?php echo $nombre; ?></p>
            <p style="font-size: 30px;"><?php echo $apellido; ?></p>
        </div>
        <div class="fecha-nacimiento">
            <p style="font-size: 28px;">Fecha de nacimiento</p>
            <p style="font-size: 20px;"><?php echo $fecha_nacimiento; ?> / <?php echo $edad; ?> años</p>
        </div>
        <div class="altura">
            <p style="font-size: 30px;">Altura</p>
            <p style="font-size: 30px;"><?php echo $altura; ?> Mt.</p>
        </div>
    </div>

    <div style="margin-top: 0;" class="barraamarillafooter"></div>

    <div class="bloque">
        <p><?php echo $descripcion; ?></p>
    </div>

    <footer class="footer-rojo">
        <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; color: #ecdd00">Auspiciadores del club</div>
        <div class="contenedor-auspiciadores">
            <img style="margin-top: 20px; margin-bottom: 50px; margin-right: 50px;" src="../../img/logo_fermall_navbar.png" alt="Auspiciador 1">
        </div>
        <p style="font-family: Bahnschrift;">Club Deportivo Los Lingues de La Foresta - © 2024, Todos los derechos reservados.</p>
        <p style="font-family: Bahnschrift;">Puente Alto, Chile - +56937563346 - info@cdlaforesta.cl</p>
    </footer>
    <div style="margin-top: 0;" class="barraamarillafooter"></div>

</body>
</html>