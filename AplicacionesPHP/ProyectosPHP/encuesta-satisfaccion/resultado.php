<?php 

$preguntas = [
    "atencion" => "Atención recibida",
    "rapidez" => "Rapidez del servicio",
    "calidad" => "Calidad del producto"
];
$servicios = [
    "tienda_online" => "Tienda online",
    "tienda_fisica" => "Tienda física",
    "soporte" => "Soporte técnico",
    "redes" => "Redes sociales"
];

$titulo = "Resultado";
require_once "cabecera.php";

echo "<h2>Resumen de tus respuestas</h2>";

foreach ($preguntas as $clave => $texto) {
    $valor = htmlspecialchars($_GET[$clave] ?? "");
    echo "<p><strong>$texto:</strong> $valor / 5</p>";
}

echo "<p><strong>Servicios utilizados:</strong></p>";
echo "<ul>";
foreach ($servicios as $clave => $servicio) {
    if (isset($_GET[$clave])) {
        echo "<li>$servicio</li>";
    }
}
echo "</ul>";

require_once "pie.php";