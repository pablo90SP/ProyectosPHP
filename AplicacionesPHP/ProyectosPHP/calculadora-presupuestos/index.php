<?php
require_once "config.php";
require_once "funciones.php";

$producto = $_POST["producto"] ?? "";
$cantidadTexto = trim($_POST["cantidad"] ?? "");
$errores = [];
$desglose = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cantidad = filter_var($cantidadTexto, FILTER_VALIDATE_INT);

    if (!isset($catalogo[$producto])) {
        $errores[] = "El producto seleccionado no existe en el catálogo.";
    }
    if ($cantidad === false || $cantidad < 1 ) {
        $errores[] = "La cantidad debe ser un número entero positivo.";
    }

    if (empty($errores)) {
        $subtotal = calcularSubtotal($catalogo[$producto], $cantidad);
        $iva = calcularIva($subtotal);
        $envio = calcularEnvio($subtotal);

        $desglose = [
            "Producto" => "$producto x $cantidad",
            "Subtotal" => number_format($subtotal, 2, ",", ".") . " €",
            "IVA (21%)" => number_format($iva, 2, ",", ".") . " €",
            "Gastos de envío" => number_format($envio, 2, ",", ".") . " €",
            "Total" => number_format(calcularTotal($subtotal, $iva, $envio), 2, ",", ".") . " €"
            ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de presupuestos</title>
    <style>.error { color: red; }</style>
</head>
<body>
    <h2>Calculadora de presupuestos</h2>
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
        <label for="producto">Producto</label>
        <select id="producto" name="producto">
<?php
foreach ($catalogo as $nombre => $precio) {
    echo "<option value='$nombre'>$nombre (" . number_format($precio, 2, ",", ".") . " €)</option>";
}
?>
        </select>
        <br><br>
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad">
        <br><br>
        <button type="submit">Calcular</button>
    </form>
<?php
if (!empty($desglose)) {
    echo "<h3>Desglose</h3>";
    foreach ($desglose as $concepto => $valor) {
        echo "<p><strong>$concepto:</strong> $valor</p>";
    }
}
?>
</body>
</html>