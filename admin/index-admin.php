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

$sql = "SELECT titulo, fecha, categoria, contenido  FROM noticias";
$result = $conn->query($sql);

if (isset($_POST['eliminar'])) {
    $titulo_a_eliminar = $_POST['titulo'];

    $sql_eliminar = "DELETE FROM noticias WHERE titulo = '$titulo_a_eliminar'";

    if ($conn->query($sql_eliminar) === TRUE) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDLL La Foresta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/equipos.css">
    <style>
        .contenedor {
            display: flex;
            margin: 50px;
        }

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
            <a href="#"><img src="../img/logo_twitter_navbar.png" alt="twitter"></a>
            <a href="#"><img src="../img/logo_instagram_navbar.png" alt="instagram"></a>
            <a href="#"><img src="../img/logo_youtube_navbar.png" alt="youtube"></a>
            <a href="#"><img src="../img/logo_facebook_navbar.png" alt="facebook"></a>
            <a href="#"><img src="../img/logo_tiktok_navbar.png" alt="tiktok"></a>
            <a href="#"><img style="width: 40px; margin-left: 30px; margin-right: 20px;" src="../img/logo_user_navbar.png" alt="user"></a>
        </div>
    </div>
    <div class="navbarnavegacion">
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="equipos.php">Equipos</a></li>
            <li><a href="#servicios">El Club</a></li>
            <li><a href="#contacto">Noticias</a></li>
            <li><a href="#contacto">Partidos</a></li>
            <li><a href="#contacto">Escuelas</a></li>
            <li><a href="#contacto">Tienda</a></li>
        </ul>
    </div>


    <div style="margin: 50px;">
        <h2>Noticias</h2>
        <?php
            if ($result->num_rows > 0) {
                echo "<table border='1' style='width: 100%;'>";
                echo "<tr>";
                echo "<th style='width: 20%;'>Titulo</th>";
                echo "<th style='width: 7%;'>Fecha</th>";
                echo "<th style='width: 10%;'>Categoría</th>";
                echo "<th style='width: 63%;'>Contenido</th>";
                echo "<th style='width: 10%;'>Acciones</th>"; // Nueva columna para acciones
                echo "</tr>";

                // Mostrar datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["titulo"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<td>" . $row["categoria"] . "</td>";
                    echo "<td>" . $row["contenido"] . "</td>";
                    echo "<td>
                            <form method='POST'>
                                <input type='hidden' name='titulo' value='" . $row["titulo"] . "'>
                                <input type='submit' value='Eliminar' name='eliminar'>
                            </form>
                        </td>"; // Formulario para eliminar el registro
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "0 resultados";
            }
        ?>
        <h2>Agregar una noticia</h2>
          <form action="add-notices.php" method="post" enctype="multipart/form-data">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo"><br><br>

            <label for="fecha">Fecha:</label><br>
            <input type="date" id="fecha" name="fecha"><br><br>

            <label for="categoria">Categoría:</label><br>
            <input type="text" id="categoria" name="categoria"><br><br>

            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="4" cols="50"></textarea><br><br>

            <label for="imagen">Imagen:</label><br>
            <input type="file" id="imagen" name="imagen"><br><br>

            <input type="submit" value="Agregar">
        </form>
    </div>

    <form action="add-matchs.php" method="post" enctype="multipart/form-data">
        <label for="nombre_torneo">Nombre del Torneo:</label><br>
        <input type="text" id="nombre_torneo" name="nombre_torneo" required><br><br>

        <label for="equipo_1">Equipo 1:</label><br>
        <input type="text" id="equipo_1" name="equipo_1" required><br><br>

        <label for="logo_equipo_1">Logo Equipo 1:</label><br>
        <input type="file" id="logo_equipo_1" name="logo_equipo_1" required><br><br>

        <label for="equipo_2">Equipo 2:</label><br>
        <input type="text" id="equipo_2" name="equipo_2" required><br><br>

        <label for="logo_equipo_2">Logo Equipo 2:</label><br>
        <input type="file" id="logo_equipo_2" name="logo_equipo_2" required><br><br>

        <label for="fechapartidos">Fecha:</label><br>
        <input type="date" id="fechapartidos" name="fechapartidos"><br><br>

        <label for="resultado">Resultado:</label><br>
        <input type="text" id="resultado" name="resultado" required><br><br>

        <input type="submit" value="Agregar Partido">
    </form>

    <footer class="footer-rojo">
        <div style="text-align: center; margin: 20px; font-size: 30px; font-family: Bahnschrift; color: #ecdd00">Auspiciadores del club</div>
        <div class="contenedor-auspiciadores">
            <img style="margin-top: 20px; margin-bottom: 50px; margin-right: 50px;" src="../img/logo_fermall_navbar.png" alt="Auspiciador 1">
        </div>
        <p style="font-family: Bahnschrift;">Club Deportivo Los Lingues de La Foresta - © 2024, Todos los derechos reservados.</p>
        <p style="font-family: Bahnschrift;">Puente Alto, Chile - +56937563346 - info@cdlaforesta.cl</p>
    </footer>
    <div style="margin-top: 0;" class="barraamarillafooter"></div>

</body>
</html>