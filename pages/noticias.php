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

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$noticiasPorPagina = 12;
$inicio = ($paginaActual - 1) * $noticiasPorPagina;

// Consulta para obtener todas las noticias
$sql = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT $inicio, $noticiasPorPagina";
$result = $conn->query($sql);

$noticias = array(); // Array para almacenar todas las noticias

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $noticias[] = $row; // Agregar cada noticia al array de noticias
    }
} else {
    echo "No se encontraron noticias";
}

function fechaEnEspañol($fecha) {
    $dias_semana = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    $fecha_timestamp = strtotime($fecha);
    $dia_semana = $dias_semana[date('w', $fecha_timestamp)];
    $dia_mes = date('d', $fecha_timestamp);
    $mes = $meses[date('n', $fecha_timestamp) - 1];
    $año = date('Y', $fecha_timestamp);

    return "$dia_semana $dia_mes de $mes del $año";
}

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
        .galeria-noticiaspag {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 noticias por fila */
            gap: 20px; /* Espacio entre las noticias */
        }

        .noticiapag {
            padding: 0;
            text-align: center;
            margin: 30px;
        }

        .noticiapag img {
            width: auto;
            height: 250px;
        }

        .paginacion {
            margin-top: 20px;
            text-align: center;
            font-family: Bahnschrift;
            font-size: 23px;
        }

        .paginacion a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #da0000;
            color: #da0000;
            cursor: pointer;
        }

        .paginacion a.active {
            background-color: #ccc;
            color: #fff;
            font-weight: bold;
        }

        .categoriapag {
            text-align: left;
            color: #da0000;
            font-family: Bahnschrift;
            font-size: 17px;
            font-weight: bold;
        }

        .titulopag {
            text-align: left;
            font-family: Bahnschrift;
            font-size: 20px;
            font-weight: bold;
        }

        .fechapag {
            text-align: left;
            color: #555555;
            font-family: Bahnschrift;
            font-size: 16px;
        }

        .noticiapag:hover {
            transform: scale(0.97); /* Agranda la imagen al pasar el mouse */
        }

        @media only screen and (min-width: 601px) {
            .boton-menu {
                display: none;
            }
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

            .footer-rojo {
                padding: 20px 10px; /* Reducir el espacio en los bordes */
            }

            .galeria-noticiaspag {
                display: block; /* Cambia a display block */
            }

            .noticiapag {
                width: 90%; /* Ocupa todo el ancho disponible en pantallas pequeñas */
                margin-bottom: 20px; /* Ajusta según tu preferencia */
            }

            .footer-rojo {
                padding: 20px 10px; /* Reducir el espacio en los bordes */
            }

            .noticiapag img {
                width: 90%;
                height: auto;
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
            <a href="https://www.instagram.com/fermall_/"><img style="width: 50px; margin-right: 10px;" src="../img/logo_fermall_navbar.png" alt="fermall"></a>
            <a href="https://www.instagram.com/gymjavofit/"><img style="width: 50px; margin-right: 10px;" src="../img/logo_javofit_navbar.png" alt="fermall"></a>
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

    <div style="margin-top: 20px; margin-left:50px; margin-bottom:50px; font-family: Bahnschrift; color: #da0000; font-size: 50px;">Noticias</div>


    <div class="galeria-noticiaspag">
        <?php foreach ($noticias as $index => $noticia) { ?>
            <div class="noticiapag">
                <!-- Contenido de la noticia -->
                <img src="<?php echo $noticia['imagen']; ?>" alt="Imagen Noticia">
                <div class="categoriapag"><?php echo $noticia['categoria']; ?></div>
                <div class="titulopag"><?php echo $noticia['titulo']; ?></div>
                <!-- Formato de la fecha utilizando la función fechaEnEspañol -->
                <p class="fechapag"><?php echo fechaEnEspañol($noticia['fecha']); ?></p>
                <!-- Agregar enlace a la página individual de la noticia -->
                <a href="noticia-pag.php?titulo=<?php echo $noticia['titulo']; ?>" style="text-decoration: none; color: #da0000; font-weight: bold; font-family: Bahnschrift;">Ver más</a>
            </div>
            <?php
            // Agregar un salto de línea después de mostrar 3 noticias
            if (($index + 1) % 3 === 0) {
                echo '<br>';
            }
            ?>
        <?php } ?>
    </div>

    <div class="paginacion">
        <?php
        $sql = "SELECT COUNT(*) AS total FROM noticias";
        $result = $conn->query($sql);
        $fila = $result->fetch_assoc();
        $totalNoticias = $fila['total'];
        $totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo "<a href='?pagina=$i'>$i</a>";
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