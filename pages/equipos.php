<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/equipos.css">
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

    <div class="fotoequipo"><img src="../img/MASCULINO-2023-05-25.jpg" alt="plantel-primerequipo"></div>

    <div class="barra-opcionesequipo">
        <div class="opcionequipo">Primer Equipo</div>
        <!--<div class="separador2"></div>
        <div class="opcionequipo">Proyección Sub 18</div>-->
    </div>

    <div style="text-align: center; font-size: 40px; font-weight: bold; font-family: Bahnschrift; margin: 40px">Plantel Primer Equipo</div>

    <div style="margin-left: 40px; margin-top: 20px; font-size: 40px; font-family: Bahnschrift; font-weight: bold; color: black;">Arqueros</div>
    <div class="galeria">
        <div class="jugador">
            <!-- href="pages-players/page-players.php?id=1" ESTE ES EL CÓDIGO DONDE SOLO HAY QUE EDITAR EL ID PARA QUE LO LLEVE DONDE DEBE -->
            <a><img src="../img/jugadores/perfil-lukasmolina.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Lukas</p>
                <p>Molina</p>
            </div>
        </div>
        <!-- Repite este bloque para cada jugador -->
    </div>

    <div style="margin-left: 40px; margin-top: 80px; font-size: 40px; font-family: Bahnschrift; font-weight: bold; color: black;">Defensas</div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Ignacio</p>
                <p>González</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Ian</p>
                <p>Rojas</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Matías</p>
                <p>Moya</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Cristhoper</p>
                <p>Álvarez</p>
            </div>
        </div>
    </div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Maykol</p>
                <p>Eyzaguirre</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Jorge</p>
                <p>Espinoza</p>
            </div>
        </div>
    </div>

    <div style="margin-left: 40px; margin-top: 80px; font-size: 40px; font-family: Bahnschrift; font-weight: bold; color: black;">Mediocampistas</div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Martín</p>
                <p>Aliste</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Martín</p>
                <p>Leiva</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Jaime</p>
                <p>Luco</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Benjamín</p>
                <p>Illanes</p>
            </div>
        </div>
    </div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>José</p>
                <p>Mella</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Jesús</p>
                <p>Huerta</p>
            </div>
        </div>
    </div>


    <div style="margin-left: 40px; margin-top: 80px; font-size: 40px; font-family: Bahnschrift; font-weight: bold; color: black;">Delanteros</div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Rafael</p>
                <p>Ortíz</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Gabriel</p>
                <p>Cuadros</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Cristian</p>
                <p>Arce</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Martín</p>
                <p>Guzmán</p>
            </div>
        </div>
    </div>

    <div style="margin-left: 40px; margin-top: 80px; font-size: 40px; font-family: Bahnschrift; font-weight: bold; color: black;">Cuerpo Técnico</div>
    <div class="galeria">
        <div class="jugador">
            <a><img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido"></a>
            <div class="texto">
                <p>Javier</p>
                <p>Torres</p>
                <p style="font-size: 25px; color:black;">Director Técnico</p>
            </div>
        </div>
        <div class="jugador">
            <img src="../img/jugadores/perfil-sinfoto.png" alt="Nombre Apellido">
            <div class="texto">
                <p>Miguel</p>
                <p>Rivas</p>
                <p style="font-size: 25px; color:black;">Preparador de arqueros</p>
            </div>
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