<?php
// Comprueba si se envió el ID de la cotización
if (isset($_GET['idCotizacion'])) {
    $idCotizacion = $_GET['idCotizacion'];
    $rutaArchivo = "cotizaciones/{$idCotizacion}.json";

    // Verifica si el archivo de la cotización existe
    if (file_exists($rutaArchivo)) {
        $contenido = file_get_contents($rutaArchivo);
        echo $contenido; // Devuelve el contenido del archivo JSON
    } else {
        // En caso de que el archivo no exista
        http_response_code(404);
        echo json_encode(array("mensaje" => "Cotización no encontrada."));
    }
} else {
    // Si no se proporciona un ID de cotización
    http_response_code(400);
    echo json_encode(array("mensaje" => "No se proporcionó el ID de la cotización."));
}
?>
