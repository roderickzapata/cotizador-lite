<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contenido = file_get_contents('php://input');
    $datos = json_decode($contenido, true);

    // Leer el último número de cotización
    $ultimoNumero = file_get_contents('ultimoNumeroCotizacion.txt');
    $nuevoNumero = intval($ultimoNumero) + 1;

    // Actualizar el número de cotización
    $datos['datosCotizacion']['idCotizacion'] = "#" . $nuevoNumero;
    file_put_contents("cotizaciones/{$nuevoNumero}.json", json_encode($datos['datosCotizacion']));

    // Guardar el nuevo último número
    file_put_contents('ultimoNumeroCotizacion.txt', $nuevoNumero);

    echo "Cotización guardada con número: #$nuevoNumero.";
}
?>