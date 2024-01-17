<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/equipos.css">
    <style>

        .bloque-info {
            flex: 1; /* Ocupa el espacio restante en el contenedor */
            padding: 20px;
            border: 1px solid #ccc;
        }

        .bloque-mapa {
            flex: 1; /* Ocupa el espacio restante en el contenedor */
            padding: 20px;
            border: 1px solid #ccc;
        }

        .negrita {
            font-weight: bold;
        }

        .contenedor {
            display: flex;
            flex-wrap: wrap; /* Permitir que los bloques se envuelvan en pantallas más pequeñas */
            justify-content: space-between;
            align-items: flex-start; /* Alinear los bloques en la parte superior */
            max-width: 1000px; /* Ancho máximo para evitar que se extienda demasiado en pantallas grandes */
            margin: 20px auto; /* Centrar el contenido en pantallas más grandes */
        }

        .bloque-info,
        .bloque-mapa {
            box-sizing: border-box; /* Asegurarse de que el tamaño del bloque incluya el relleno y el borde */
            width: 400px; /* Ancho del bloque en pantallas grandes */
            margin-bottom: 20px; /* Espacio entre bloques */
        }
    </style>
        <style>
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
        .bloque-info {
            width: 90%;
        }

        .bloque-mapa {
            width: 300px;
            height: auto;
            display: flex;
        }

        .titulo {
            font-size: 35px;
            margin: 5px
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

    <div class="titulo" style="margin-top: 20px; margin-left:50px; font-family: Bahnschrift; color: #da0000; font-size: 50px;">Conoce nuestras escuelas</div>

    <div class="contenedor">
        <div class="bloque-info">
            <h2 style="font-family: Bahnschrift; color: #da0000; font-size: 25px">La Foresta Puente Alto</h2>
            <p style="font-family: Bahnschrift; font-size: 20px;"><span class="negrita">Director: </span>Miguel Araneda</p>
            <p style="font-family: Bahnschrift; font-size: 20px;"><span class="negrita">Dirección: </span>Av. Gabriela 3915, Puente Alto.</p>
            <p style="font-family: Bahnschrift; font-size: 20px;"><span class="negrita">Horarios: </span>Consultar con director.</p>
            <p style="font-family: Bahnschrift; font-size: 20px;"><span class="negrita">Mail: </span>laforestapuentealto@gmail.com</p>
            <p style="font-family: Bahnschrift; font-size: 20px;"><span class="negrita">Contacto: </span>+56 9 8183 0282</p>
        </div>
        <div class="bloque-mapa">
            <!-- Aquí puedes insertar tu mapa o una imagen del mapa -->
            <!-- Ejemplo con una imagen -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.3903512761187!2d-70.60966956989127!3d-33.58248758715587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d7445d19cc7d%3A0x5944afee7358ce2e!2sMundo%20Joven%20Futbolito%20Y%20Padel!5e0!3m2!1ses!2scl!4v1703601071037!5m2!1ses!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
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