<?php
// Verifica o método de requisição
$method = $_SERVER['REQUEST_METHOD'];

$pokemon = [
    ["id" => 1, "name" => "Bulbasaur", "type" => "Grass/Poison"],
    ["id" => 2, "name" => "Charmander", "type" => "Fire"]
];

// Função para adicionar um novo Pokémon
function addPokemon($pokemon) {
    // Recebendo os dados do corpo da requisição
    $input = json_decode(file_get_contents('php://input'), true);

    // Validando dados
    if (isset($input['name']) && isset($input['type'])) {
        $newPokemon = [
            "id" => count($pokemon) + 1,
            "name" => $input['name'],
            "type" => $input['type']
        ];
        $pokemon[] = $newPokemon;
        echo json_encode($newPokemon);
    } else {
        echo json_encode(["message" => "Dados inválidos"]);
    }
}

if ($method == 'POST') {
    addPokemon($pokemon);
} else {
    echo json_encode(["message" => "Método não suportado"]);
}
?>

