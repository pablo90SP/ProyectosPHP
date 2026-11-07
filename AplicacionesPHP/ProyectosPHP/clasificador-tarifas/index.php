<?php

$tipos = ["Estudiante", "Socio", "Desempleado", "General"];

$nombre = trim($_POST["nombre"] ?? "");
$tipo = trim($_POST["tipo"] ?? "");
$edad = trim ($_POST["edad"] ?? "");
$errores = [];
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $edadNum = filter_var($edad, FILTER_VALIDATE_INT);

    if ($nombre === "") {
        $errores[] = "Debe de introducir un nombre";
    }
    if (!in_array($tipo, $tipos)) {
        $errores[] = "Debe de seleccionar un tipo de usuario válido.";
    }
    if ($edadNum === false || $edadNum < 0 || $edadNum > 100) {
        $errores[] = "La edad debe de ser un número entre 0 y 100.";
    }

    if (empty($errores)) {
        $descuento = match(true) {
            $edadNum < 12 => 50,
            $edadNum >= 65 => 40,
            $tipo === "Estudiante" && $edadNum <= 25 => 30,
            $tipo === "Desempleado" => 25,
            $tipo === "Socio" => 20,
            $tipo === "Estudiante" => 15,
            default => 0
        };

        $resultado = htmlspecialchars($nombre) . " ($tipo, $edadNum años): descuento del $descuento%";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clasificador de tarifas</title>
    <style>.error { color: red; }</style>
</head>
<body>
    <h2>Clasificador de tarifas</h2>

    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <br><br>
        <label for="tipo">Tipo de usuario</label>
        <select id="tipo" name="tipo">
            <option value="">-- Selecciona --</option>
<?php
// Se mantiene seleccionado el tipo elegido
foreach ($tipos as $t) {
    $seleccionado = "";
    if ($t === $tipo) {
        $seleccionado = "selected";
    }
    echo "<option value='$t' $seleccionado>$t</option>";
}
?>
        </select>
        <br><br>
        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad" value="<?= htmlspecialchars($edad) ?>">
        <br><br>
        <button type="submit">Calcular</button>
    </form>
<?php
if (!empty($errores)) {
    echo "<ul class='error'>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

if ($resultado !== "") {
    echo "<h3>Resultado</h3>";
    echo "<p>$resultado</p>";
}

?>
</body>
</html>
