<?php

function calcularSubtotal(float $precio, int $cantidad): float {
    return $precio * $cantidad;
}

function calcularIva(float $subtotal): float {
    return $subtotal * IVA;
}

function calcularEnvio(float $subtotal): float {
    if ($subtotal > ENVIO_GRATIS) {
        return 0.0;
    }
    return GASTOS_ENVIO;
}

function calcularTotal(float $subtotal, float $iva, float $envio): float {
    return $subtotal + $iva + $envio;
}
