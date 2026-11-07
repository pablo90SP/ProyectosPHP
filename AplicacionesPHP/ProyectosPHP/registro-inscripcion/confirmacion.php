<?php require_once "funciones.php";

$nombre = trim($_GET["nombre"] ?? "");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción completada</title>
</head>
<body>
    <h2>Inscripción completada</h2>
    <p><?= proteger($nombre) ?>, te has inscrito con éxito en el taller.</p>
</body>
</html>