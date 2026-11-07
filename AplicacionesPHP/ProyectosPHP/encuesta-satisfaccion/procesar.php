<?php 

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: encuesta.php");
    exit;
}

$url = "resultado.php?";

foreach (["atencion", "rapidez", "calidad"] as $clave) {
    $valor = filter_var($_POST[$clave] ?? "", FILTER_VALIDATE_INT);

    if ($valor === false || $valor < 1 || $valor > 5) {
        header("Location: encuesta.php?error=valoracion");
        exit;
    }
    $url = $url . "$clave=$valor&";
}

$marcados = 0;

foreach(["tienda_online", "tienda_fisica", "soporte", "redes"] as $clave) {
    if (isset($_POST[$clave])) {
        $marcados++;
        $url = $url . "$clave=si&";
    }
}

if ($marcados === 0) {
    header("Location: encuesta.php?error=checkbox");
    exit;
}

header("Location: $url");
exit;
