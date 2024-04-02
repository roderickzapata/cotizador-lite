<?php
// Leer el último número de cotización y devolverlo
$ultimoNumero = file_get_contents('ultimoNumeroCotizacion.txt');
echo $ultimoNumero;
?>