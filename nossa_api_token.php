<?php
$authToken = "123456";  // Token simples

function isAuthenticated() {
    $headers = apache_request_headers();
    if (isset($headers['Authorization']) && $headers['Authorization'] == "Bearer $authToken") {
        return true;
    }
    return false;
}

// Verifica se o usuário está autenticado
if (!isAuthenticated()) {
    echo json_encode(["message" => "Não autorizado"]);
    exit;
}
?>
