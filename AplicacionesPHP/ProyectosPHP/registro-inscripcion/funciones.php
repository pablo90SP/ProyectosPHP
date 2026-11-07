<?php

function emailValido(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function edadValida(string $edad): bool {
    $numero = filter_var($edad, FILTER_VALIDATE_INT);
    return $numero !== false && $numero >= 1 && $numero <= 100;
}

function proteger(string $texto): string {
    return htmlspecialchars($texto);
}
