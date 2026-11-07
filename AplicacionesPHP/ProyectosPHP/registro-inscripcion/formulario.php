<?php require_once "funciones.php";

$nombre = trim($_POST["nombre"] ?? "");
$email = trim($_POST["email"] ?? "");
$edad = trim($_POST["edad"] ?? "");
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($nombre === "") {
        $errores[] = "Debe de introducir un nombre.";
    }
    if (!emailValido($email)) {
        $errores[] = "Debe de introducir un correo electrónico válido";
    }
    if (!edadValida($edad)) {
        $errores[] = "La edad debe de ser un número entero en 1 y 100";
    }

    if (empty($errores)) {
        $nombreUrl = str_replace("&", "%26", $nombre);
        $nombreUrl = str_replace(" ", "+", $nombreUrl);
        header("Location: confirmacion.php?nombre=" . $nombreUrl);
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción al taller</title>
    <style>.error { color: red; }</style>
</head>
<body>
    <h2>Inscripción al taller</h2>
<?php
if (!empty($errores)) {
    echo "<ul class='error'>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
?>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <br><br>
        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
