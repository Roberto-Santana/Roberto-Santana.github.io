<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forestawebbd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST["titulo"];
  $fecha = $_POST["fecha"];
  $categoria = $_POST["categoria"];
  $contenido = $_POST["contenido"];

  $imagen = $_FILES["imagen"]["name"];
  $temp_imagen = $_FILES["imagen"]["tmp_name"];
  $ruta_imagen = "../img/imgnoticiasimport" . $imagen;

  move_uploaded_file($temp_imagen, $ruta_imagen);

  $sql = "INSERT INTO noticias (titulo, fecha, categoria, contenido, imagen)
          VALUES ('$titulo', '$fecha', '$categoria', '$contenido', '$ruta_imagen')";

  if ($conn->query($sql) === TRUE) {
    echo "Datos agregados correctamente";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Cerrar conexión
$conn->close();
?>