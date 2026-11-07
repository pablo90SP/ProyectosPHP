<?php $titulo = "Encuesta";

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

$error = match ($_GET["error"] ?? "") {
    "valoracion" => "Debe de valorar todas las cuestiones del 1 al 5.",
    "checkbox" => "Debe de marcar al menos un servicio utilizado.",
    default => ""
};

require_once "cabecera.php";

if ($error !== "") {
    echo "<p class='error'>$error</p>";
}
?>
    <form method="post" action="procesar.php">
<?php
foreach ($preguntas as $clave => $texto) {
    echo "<p>$texto: ";
    for ($i = 1; $i <= 5; $i++) {
        echo "<label><input type='radio' name='$clave' value='$i'> $i</label> ";
    }
    echo "</p>";
}

echo "<p>¿Qué servicios has utilizado?</p>";
foreach ($servicios as $clave => $servicio) {
    echo "<label><input type='checkbox' name='$clave'> $servicio</label><br>";
}
?>
    <br>
    <button type="submit">Enviar</button>
</form>
<?php
require_once "pie.php";
