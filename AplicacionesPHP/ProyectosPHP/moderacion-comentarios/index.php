<?php require_once "funciones.php";

$nombre = trim($_POST["nombre"] ?? "");
$comentario = trim($_POST["comentario"] ?? "");
$errores = [];
$enviado = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($nombre === "") {
        $errores[] = "Debe de introducir un nombre.";
    }
    $enviado = empty($errores);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Moderación de comentarios</title>
    <style>.error { color: red; }</style>
</head>
<body>
    <h2>Deja tu comentario</h2>
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
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <br><br>
        <label for="comentario">Comentario</label><br>
        <textarea id="comentario" name="comentario" rows="6" cols="50"><?= htmlspecialchars($comentario) ?></textarea>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
<?php

if ($enviado) {
?>
    <h3>Comentario</h3>
    <p><?= mostrarTexto(censurar($comentario)) ?></p>
    <p>Palabras: <?= contarPalabras($comentario) ?></p>
    <p>Caracteres: <?= contarCaracteres($comentario) ?></p>
<?php
}
?>
</body>
</html>
