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

// Consulta para obtener las últimas 3 noticias ordenadas por fecha
$sql = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 3";
$result = $conn->query($sql);

$sqlpartidos = "SELECT * FROM partidos ORDER BY fechapartidos DESC LIMIT 5";
$resultpartidos = $conn->query($sqlpartidos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        body {
            overflow-x: hidden; /* Evita el desplazamiento horizontal */
            overflow-y: auto;   /* Permite el desplazamiento vertical si es necesario */
        }

        .barra-noticias {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-left: 100px;
            margin-right: 100px;
            margin-top: 30px;
            padding: 10px;
        }

        .noticia {
            width: 500px; /* Tamaño deseado */
            text-align: center;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
        }

        .noticia img {
            width: 100%;
            height: 600px; /* Altura deseada */
            object-fit: cover; /* Recortar la imagen */
            object-position: center; /* Centrar la imagen */
            position: relative;
            overflow: hidden;
        }

        .noticia img::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%; /* Altura del degradado */
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));
        }

        .noticia h3 {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 22px;
            font-family: Bahnschrift;
            color: white;
            text-decoration: none;
        }

        .ultimos-partidos {
            display: inline;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .partido {
            display: inline-block;
            align-items: center;
            margin-bottom: 20px;
            text-align: center;
            margin-inline-end: 0px; /* Añadido un margen entre los partidos */
        }

        .contenedor-partidos {
            display: flex;
            justify-content: flex-start; /* Otra opción: space-around, space-evenly, flex-start, flex-end */
            justify-content: center;
            padding: 10px;
        }

        .resultado {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .equipos img {
            width: 80px; /* Ajusta el tamaño de los logos según sea necesario */
            height: auto;
            margin-bottom: 5px;
            
        }

        .resultado span {
            font-weight: bold;
            font-family: Bahnschrift;
            font-size: 25px;
        }

        .nombre-torneo {
            color: #da0000;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: Bahnschrift;
            font-size: 20px;
        }

        .navbarnavegacion.responsive {
            display: none;
            position: relative;
        }

        .navbarnavegacion.responsive a {
            float: none;
            display: block;
            text-align: left;
            padding: 15px;
        }

        .navbarnavegacion.responsive a.icon {
            position: absolute;
            right: 0;
            top: 0;
        }

    </style>
    <!-- ESTILOS RESPONSIVES -->
    <style>
        @media only screen and (min-width: 601px) {
            .carousel {
                display: none;
            }
            
            .boton-menu {
                display: none;
            }
        }

        @media only screen and (max-width: 600px) {

            body {
                overflow-x: hidden; /* Evita el desplazamiento horizontal */
                overflow-y: auto;   /* Permite el desplazamiento vertical si es necesario */
            }
            /* Estilos responsivos para la barra del logo */
            .navbarlogo {
                padding: 16px 10px; /* Reducir el espacio en los bordes */
            }

            /* Estilos responsivos para el logo de la empresa */
            .logo img {
                max-width: 150px; /* Reducir el tamaño del logo en pantallas más pequeñas */
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

            /* Estilos responsivos para la barra de noticias */
            .barra-noticias {
                margin-left: 10px; /* Reducir el margen izquierdo */
                margin-right: 10px; /* Reducir el margen derecho */
            }

            /* Estilos responsivos para las noticias */
            .noticia {
                width: 100%; /* Ocupar todo el ancho disponible */
                margin-bottom: 20px;
            }

            .noticia img {
                height: auto; /* Hacer que la imagen sea receptiva */
            }

            .noticia h3 {
                font-size: 18px; /* Reducir el tamaño del texto en pantallas más pequeñas */
            }

            /* Estilos responsivos para los últimos partidos */
            .ultimos-partidos {
                margin-inline-start: 10px; /* Reducir el margen izquierdo */
                margin-inline-end: 10px; /* Reducir el margen derecho */
            }

            .partido {
                margin-inline-end: 0; /* Eliminar el margen entre partidos */
            }

            /* Estilos responsivos para los logos de equipos en los partidos */
            .equipos img {
                width: 60px; /* Ajustar el tamaño de los logos en pantallas más pequeñas */
            }

            /* Estilos responsivos para el pie de página */
            .footer-rojo {
                padding: 20px 10px; /* Reducir el espacio en los bordes */
            }

            .contenedor-auspiciadores img {
                width: 80px; /* Ajustar el tamaño de los logos de auspiciadores en pantallas más pequeñas */
                margin: 0 5px; /* Reducir el espacio entre los logos */
            }

            /* Estilos responsivos para la barra amarilla del pie de página */
            .barraamarillafooter {
                padding: 10px 0; /* Reducir el espacio en los bordes */
            }

            .redes-sociales_navbar {
                display: none;
            }

            .partido:not(:first-child) {
                display: none; /* Oculta todos los partidos excepto el último en pantallas más pequeñas */
                justify-content: center;
            }

            .publicidad2{
                padding: 10px;
                display: block;
                box-sizing: border-box;
                width: 100%;
                height: auto;
            }

            .contenedor-noticiasd .noticiad {
                width: 100%; /* Ocupar todo el ancho disponible */
                margin-bottom: 20px; /* Agregar un margen inferior entre noticias */
            }

            .publicidad_partners {
                display: block; /* Cambia a una disposición de bloque en pantallas pequeñas (carrusel vertical) */
                overflow-x: scroll; /* Permite desplazamiento horizontal para el carrusel en dispositivos móviles */
            }

            .publicidad_partners .publicidad {
                width: 80%; /* Asegurar que cada publicidad ocupe todo el ancho del carrusel en dispositivos móviles */
                margin-bottom: 10px; /* Agrega un margen entre las imágenes en dispositivos móviles */
            }

            .publicidad_partners_escritorio{
                display: none;
            }
        }
    </style>
</head>
<body style="margin: none;">
    <div class="navbarlogo">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo_cdlaforesta"></a>
        </div>
        <div class="redes-sociales_navbar">
            <a href="https://www.instagram.com/fermall_/"><img style="width: 50px; margin-right: 10px;" src="img/logo_fermall_navbar.png" alt="fermall"></a>
            <a href="https://www.instagram.com/gymjavofit/"><img style="width: 50px; margin-right: 10px;" src="img/logo_javofit_navbar.png" alt="fermall"></a>
            <div class="separator"></div>
            <a href="https://www.x.com/CDLaForesta"><img src="img/logo_twitter_navbar.png" alt="twitter"></a>
            <a href="https://www.instagram.com/cdlaforesta"><img src="img/logo_instagram_navbar.png" alt="instagram"></a>
            <a href="https://www.youtube.com/@cdlaforesta"><img src="img/logo_youtube_navbar.png" alt="youtube"></a>
            <a href="https://www.facebook.com/CDLaForesta"><img src="img/logo_facebook_navbar.png" alt="facebook"></a>
            <a href="https://www.tiktok.com/@cdlaforestaoficial"><img src="img/logo_tiktok_navbar.png" alt="tiktok"></a>
            <!-- <a href="#"><img style="width: 40px; margin-left: 30px; margin-right: 20px;" src="../img/logo_user_navbar.png" alt="user"></a> !-->
        </div>
        <div class="boton-menu">
            <a style="text-decoration: none; color: white; font-size: 30px;" href="javascript:void(0);" class="icon" onclick="myFunction()">☰</a>
        </div>
    </div>
    <div class="navbarnavegacion">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="pages/equipos.php">Equipos</a></li>
            <li><a href="pages/historia.php">Historia</a></li>
            <li><a href="pages/noticias.php">Noticias</a></li>
            <li><a href="pages/partidos.php">Partidos</a></li>
            <li><a href="pages/escuelas.php">Escuelas</a></li>
        </ul>
    </div>

    <div class="barra-noticias">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="noticia">';
                echo '<a href="pages/noticia-pag.php?titulo=' . urlencode($row['titulo']) . '">';
                echo '<img src="img/' . $row['imagen'] . '" alt="' . $row['titulo'] . '">';
                echo '<h3>' . $row['titulo'] . '</h3>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "No se encontraron noticias";
        }
        ?>
    </div>

    <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; font-weight: bold;">Últimos partidos</div>

    <?php
        if ($resultpartidos->num_rows > 0) {
            echo '<div class="contenedor-partidos">';
            // Mostrar datos de cada partido
            while ($row = $resultpartidos->fetch_assoc()) {
                echo "<div class='partido'>";
                echo "<div class='nombre-torneo'>" . $row["nombre_torneo"] . "</div>";
                echo "<div class='resultado'>";
                echo "<div class='equipos'>";
                echo "<img style='margin-right: 10px;' src='img/" . $row["logo_equipo_1"] . "' alt='Equipo 1'>";
                echo "<img style='margin-left: 10px;' src='img/" . $row["logo_equipo_2"] . "' alt='Equipo 2'>";
                echo "</div>";
                echo "<span>" . $row["resultado"] . "</span>";
                echo "</div>";
                echo "</div>";
            }
            echo '</div>';
        } else {
            echo "No hay partidos disponibles";
        }
    ?>
    <a style="text-decoration:none;" href="pages/partidos.php">
        <button style="justify-content: center;" class="boton-todasnoticias">Todos los partidos</button>
    </a>

    <!-- <div class="publicidad_partners_escritorio">
        <div class="publicidad_escritorio">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 1">
        </div>
        <div class="publicidad_escritorio">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 2">
        </div>
        <div class="publicidad_escritorio">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 3">
        </div>
    </div> -->

    <!-- <div class="publicidad_partners carousel">
        <div class="publicidad">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 1">
        </div>
        <div class="publicidad">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 2">
        </div>
        <div class="publicidad">
            <img src="img/directv-2023-07-28.jpg" alt="Publicidad 3">
        </div>
    </div> !-->

    <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; font-weight: bold;">Noticias</div>

    <div style="text-decoration:none;" class="contenedor-noticiasd">
        <?php
        // Consulta para obtener las últimas 4 noticias
        $sql = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 4";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="noticiad">';
                echo '<a style="text-decoration: none; color: black;" href="pages/noticia-pag.php?titulo=' . urlencode($row['titulo']) . '">';
                echo '<img src="img/' . $row['imagen'] . '" alt="' . $row['titulo'] . '">';
                echo '<div class="categoriad">' . $row['categoria'] . '</div>';
                echo '<p class="titulo-noticia-d">' . $row['titulo'] . '</p>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "No se encontraron noticias";
        }
        ?>
    </div>
    <a style="text-decoration:none;" href="pages/noticias.php">
        <button style="justify-content: center;" class="boton-todasnoticias">Todas las noticias</button>
    </a>

    <!-- <a>
        <img class="publicidad2" src="img/publicidad.gif" alt="publicidad">
    </a> -->


    <footer class="footer-rojo">
        <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; color: #ecdd00">Auspiciadores del club</div>
        <div class="contenedor-auspiciadores">
            <img style="margin-top: 20px; margin-bottom: 50px; justify-content:center;" src="img/logo_fermall_navbar.png" alt="Auspiciador 1">
        </div>
        <p style="font-family: Bahnschrift;">Club Deportivo Los Lingues de La Foresta - © 2024, Todos los derechos reservados.</p>
        <p style="font-family: Bahnschrift;">Puente Alto, Chile - +56937563346 - info@cdlaforesta.cl</p>
    </footer>
    <div style="margin-top: 0;" class="barraamarillafooter"></div>

    <script>
        const noticias = document.querySelectorAll('.noticia');

        noticias.forEach(noticia => {
            noticia.addEventListener('mouseover', () => {
                const titulo = noticia.querySelector('h3');
                titulo.style.display = 'block';
            });

            noticia.addEventListener('mouseout', () => {
                const titulo = noticia.querySelector('h3');
                titulo.style.display = 'block';
            });
        });

        function myFunction() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbarnavegacion") {
                x.className += " responsive";
            } else {
                x.className = "navbarnavegacion";
            }
        }
    </script>
    <!-- Agrega la biblioteca jQuery (requerida por Slick Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Agrega la biblioteca Slick Carousel -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Inicializa el carrusel -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.publicidad_partners').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000, // Configura la velocidad de reproducción
            });
        });

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