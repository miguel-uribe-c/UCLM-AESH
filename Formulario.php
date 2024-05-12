<?php
// Verificar la existencia de las variables antes de acceder a ellas
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';

$respuesta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : null;
$respuesta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : null;
$respuesta3 = isset($_POST['pregunta3']) ? $_POST['pregunta3'] : null;
$respuesta4 = isset($_POST['pregunta4']) ? $_POST['pregunta4'] : null;
$respuesta5 = isset($_POST['pregunta5']) ? $_POST['pregunta5'] : null;

$puntos = 0;
$puntos += ($respuesta1 === '2') ? 2 : 0;
$puntos += ($respuesta2 === '2') ? 2 : 0;
$puntos += ($respuesta3 === '2') ? 2 : 0;
$puntos += ($respuesta4 === '2') ? 2 : 0;
$puntos += ($respuesta5 === '2') ? 2 : 0;

$host = "localhost:3607";
$usuario = "root";
$contrasena = "12345";
$base_datos = "formulario1";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Utilizar una consulta preparada para prevenir la inyección SQL
$sql = $conn->prepare("INSERT INTO resultados (nombre, email, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, puntos, comentarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssis", $nombre, $email, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuesta5, $puntos, $comentarios);

if ($sql->execute()) {
    echo "Test enviado. Tu puntuación es: $puntos puntos. Tu ID de usuario es: " . $conn->insert_id;
} else {
    echo "Error al enviar el test. Por favor, inténtalo de nuevo.";

}

$sql->close();
$conn->close();
?>