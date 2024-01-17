<?php
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

// Tu código de conexión y verificación de conexión permanece igual

$id_noticia = isset($_GET['titulo']) ? $_GET['titulo'] : null;

// Consulta para obtener la noticia por su ID
$sql = "SELECT * FROM noticias WHERE titulo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_noticia); // 's' indica que es una cadena de texto
$stmt->execute();
$result = $stmt->get_result();

$id_noticia = isset($_GET['titulo']) ? $_GET['titulo'] : null;

// Consulta para obtener la noticia por su ID
$sql = "SELECT * FROM noticias WHERE titulo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_noticia); // 's' indica que es una cadena de texto
$stmt->execute();
$result = $stmt->get_result();

$fecha_formateada = 'Fecha no disponible'; // Valor predeterminado

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/equipos.css">
    <style>
        .noticia-completa {
            margin-top: 50px;
            margin-left: 200px;
            font-family: Bahnschrift;
            margin-bottom:200px;
        }

        .imagen-noticia{
            height: auto;
            width: 1440px;
            margin-bottom: 30px;
        }

        .titulo_responsive {
            font-size: 50px;
        }

        .contenido_noticia {
            font-size: 22px;
            color: #555555;
        }

        @media only screen and (min-width: 601px) {
            .boton-menu {
                display: none;
            }
        }
        .contenido_noticia {
            font-size: 22px;
            color: #555555;
        }

        @media only screen and (max-width: 600px) {

        body {
            overflow-x: hidden; /* Evita el desplazamiento horizontal */
            overflow-y: auto;   /* Permite el desplazamiento vertical si es necesario */
            font-family: Bahnschrift;
        }
        /* Estilos responsivos para la barra del logo */
        .navbarlogo {
            padding: 16px 10px; /* Reducir el espacio en los bordes */
        }

        /* Estilos responsivos para el logo de la empresa */
        .logo img {
            max-width: 150px; /* Reducir el tamaño del logo en pantallas más pequeñas */
        }

        .redes-sociales_navbar {
            display: none;
        }

        .navbarnavegacion ul {
            display: none;
            justify-content: center;
        }

        .navbarnavegacion.responsive a {
            float: none;
            display: block;
            text-align: left;
        }

        .navbarnavegacion ul.responsive {
            display: block;
            position: absolute;
            justify-content: center;
            background-color: #f1f1f1;
            width: 100%;
            text-align: center;
            z-index: 1;
        }

        .navbarnavegacion ul.responsive li {
            display: block;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Tamaño del título en dispositivos pequeños */
        .titulo_responsive {
            font-size: 30px;
        }

        /* Tamaño de la fecha en dispositivos pequeños */
        .fecha_noticia {
            font-size: 16px;
            color: #da0000;
            margin-bottom: 15px;
        }

        /* Tamaño de la imagen en dispositivos pequeños */
        .imagen_noticia {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Tamaño del contenido en dispositivos pequeños */
        .contenido_noticia {
            font-size: 18px;
            color: #555555;
        }

        .footer-rojo {
            padding: 20px 10px; /* Reducir el espacio en los bordes */
        }

        .noticia-completa {
            margin: 20px;
        }

        .imagen-noticia{
            height: auto;
            width: 100%;
            border: 5%;
            margin-bottom: 30px;
        }

        .titulo_responsive{
            font-size: 30px;
        }

        .contenido_noticia {
            font-size: 18px;
        }
    }
    </style>
</head>
<body style="margin: none;">
    <div class="navbarlogo">
        <div class="logo">
            <a href="../index.php"><img src="../img/logo.png" alt="logo_cdlaforesta"></a>
        </div>
        <div class="redes-sociales_navbar">
            <a href="#"><img style="width: 50px; margin-right: 10px;" src="../img/logo_fermall_navbar.png" alt="fermall"></a>
            <div class="separator"></div>
            <a href="https://www.x.com/CDLaForesta"><img src="../img/logo_twitter_navbar.png" alt="twitter"></a>
            <a href="https://www.instagram.com/cdlaforesta"><img src="../img/logo_instagram_navbar.png" alt="instagram"></a>
            <a href="https://www.youtube.com/@cdlaforesta"><img src="../img/logo_youtube_navbar.png" alt="youtube"></a>
            <a href="https://www.facebook.com/CDLaForesta"><img src="../img/logo_facebook_navbar.png" alt="facebook"></a>
            <a href="https://www.tiktok.com/@cdlaforestaoficial"><img src="../img/logo_tiktok_navbar.png" alt="tiktok"></a>
            <!-- <a href="#"><img style="width: 40px; margin-left: 30px; margin-right: 20px;" src="../img/logo_user_navbar.png" alt="user"></a> !-->
        </div>
        <div class="boton-menu">
            <a style="text-decoration: none; color: white; font-size: 30px;" href="javascript:void(0);" class="icon" onclick="myFunction()">☰</a>
        </div>
    </div>
    <div class="navbarnavegacion">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../pages/equipos.php">Equipos</a></li>
            <li><a href="../pages/historia.php">Historia</a></li>
            <li><a href="../pages/noticias.php">Noticias</a></li>
            <li><a href="../pages/partidos.php">Partidos</a></li>
            <li><a href="../pages/escuelas.php">Escuelas</a></li>
        </ul>
    </div>

    <div class="bloque-noticia">
        <?php
            if ($result->num_rows > 0) {
                $noticia = $result->fetch_assoc();

                // Configurar idioma para strftime
                setlocale(LC_ALL, 'es_ES', 'spanish');

                // Verificar y formatear la fecha si está disponible
                if (isset($noticia['fecha']) && strtotime($noticia['fecha']) !== false) {
                    $fecha_timestamp = strtotime($noticia['fecha']);
                    $fecha_formateada = strftime("%A %e de %B del %Y", $fecha_timestamp);
                }

                // Mostrar la noticia
                echo '<div class="noticia-completa">';
                echo '<h2 class="titulo_responsive">' . $noticia['titulo'] . '</h2>';
                echo '<h2 style="font-size: 20px; color: #da0000; margin-bottom: 25px;">' . $fecha_formateada . '</h2>';
                echo '<img class="imagen-noticia" src="' . $noticia['imagen'] . '" alt="Imagen de la noticia">';
                echo '<p class="contenido-noticia" style="font-size: 22px;">' . $noticia['contenido'] . '</p>';
                echo '</div>';
            } else {
                echo "No se encontró la noticia";
                echo "Valor de id_noticia: " . $id_noticia;
            }
        ?>
    </div>

    <footer class="footer-rojo">
        <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; color: #ecdd00">Auspiciadores del club</div>
        <div class="contenedor-auspiciadores">
            <img style="margin-top: 20px; margin-bottom: 50px; margin-right: 50px;" src="../img/logo_fermall_navbar.png" alt="Auspiciador 1">
        </div>
        <p style="font-family: Bahnschrift;">Club Deportivo Los Lingues de La Foresta - © 2024, Todos los derechos reservados.</p>
        <p style="font-family: Bahnschrift;">Puente Alto, Chile - +56937563346 - info@cdlaforesta.cl</p>
    </footer>
    <div style="margin-top: 0;" class="barraamarillafooter"></div>

    <script>
        function myFunction() {
            var x = document.querySelector(".navbarnavegacion ul");
            if (x.className === "responsive") {
                x.className = "";
            } else {
                x.className = "responsive";
            }
        }
    </script>
</body>
</html>