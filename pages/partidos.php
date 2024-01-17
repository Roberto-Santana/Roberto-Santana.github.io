<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/equipos.css">
    <style>
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 80%;
            max-width: 800px;
        }

        .list {
            list-style-type: none;
            padding: 0;
        }

        .list-item {
            background-color: #f9f9f9;
            border-radius: 5px;
            margin: 10px 0;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .team-logo {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }

        .title {
            color: #333;
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
        .container {
            width: 90%; /* Ajustar el ancho del contenedor en pantallas más pequeñas */
        }

        .list-item {
            text-align: center; /* Centrar el contenido en pantallas más pequeñas */
            margin: 20px
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

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "forestawebbd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM partidos";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            // Formatear la fecha
            $fechaFormateada = date("d-m-Y", strtotime($row['fechapartidos']));
    
            echo '<li class="list-item">' .
                '<div class="team-logo-container"><img src="' . $row['logo_equipo_1'] . '" alt="Equipo 1" class="team-logo"></div>' .
                '<strong class="tournament-name">' . $row['nombre_torneo'] . '</strong>' .
                ' - ' . $row['equipo_1'] . ' vs ' . $row['equipo_2'] .
                ' - Resultado: ' . $row['resultado'] .
                ' - Fecha: ' . $fechaFormateada . // Mostrar la fecha formateada
                '<div class="team-logo-container"><img src="' . $row['logo_equipo_2'] . '" alt="Equipo 2" class="team-logo"></div>' .
                '</li>';
        }

        $conn->close();
    ?>

    <footer class="footer-rojo">
        <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; color: #ecdd00">Auspiciadores del club</div>
        <div class="contenedor-auspiciadores">
            <img style="margin-top: 20px; margin-bottom: 50px; margin-right: 50px;" src="../img/logo_fermall_navbar.png" alt="Auspiciador 1">
            <img style="margin-top: 20px; margin-bottom: 50px; margin-right: 50px;" src="../img/logo_javofit_navbar.png" alt="Auspiciador 2">
        </div>
        <p style="font-family: Bahnschrift;">Club Deportivo Los Lingues de La Foresta - © 2024, Todos los derechos reservados.</p>
        <p style="font-family: Bahnschrift;">Puente Alto, Chile - +56937563346 - info@cdlaforesta.cl</p>
    </footer>
    <div style="margin-top: 0;" class="barraamarillafooter"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app.js"></script>
    <script>
        function myFunction() {
            var x = document.querySelector(".navbarnavegacion ul");
            if (x.className === "responsive") {
                x.className = "";
            } else {
                x.className = "responsive";
            }
        }

        $(document).ready(function() {
        // Obtener datos de partidos mediante AJAX
        $.ajax({
            url: 'obtener_partidos.php',
            type: 'GET',
            dataType: 'json',
            success: function(partidos) {
            // Procesar e imprimir partidos
            var fixtureList = $('#fixture-list');

            $.each(partidos, function(index, partido) {
                fixtureList.append('<li>' +
                '<strong>' + partido.nombre_torneo + '</strong>' +
                ' - ' + partido.equipo_1 + ' vs ' + partido.equipo_2 +
                ' - Resultado: ' + partido.resultado +
                ' - Fecha: ' + partido.fechapartidos +
                '</li>');
            });
            }
        });
        });
    </script>
</body>
</html>