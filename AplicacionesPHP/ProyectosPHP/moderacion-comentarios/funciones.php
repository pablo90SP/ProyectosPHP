<?php

function contarPalabras(string $texto): int {
    $palabras = 0;
    $dentroPalabra = false;

    for ($i = 0; $i < strlen($texto); $i++) {
        $esEspacio = $texto [$i] === " " || $texto[$i] === "\n"|| $texto[$i] === "\r" || $texto[$i] === "\t";

        if (!$esEspacio && !$dentroPalabra) {
            $palabras++;
        }
        $dentroPalabra = !$esEspacio;
    }
    return $palabras;
}

function contarCaracteres(string $texto): int {
    return strlen($texto);
}

function censurar(string $texto): string {
    $prohibidas = ["lechuga", "patata", "pepinillo", "tomate"];

    foreach ($prohibidas as $palabra) {
        $asteriscos = "";
        for ($i = 0; $i < strlen($palabra); $i++) {
            $asteriscos = $asteriscos . "*";
        }
        $texto = str_replace($palabra, $asteriscos, $texto);
        $texto = str_replace(strtoupper($palabra), $asteriscos, $texto);
    }
    return $texto;
}

function mostrarTexto(string $texto): string {
    return nl2br(htmlspecialchars($texto));
}