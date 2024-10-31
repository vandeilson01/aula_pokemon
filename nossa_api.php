<?php
// Definir o cabeçalho para que a resposta seja no formato JSON
header("Content-Type: application/json; charset=UTF-8");

// Verificar o método de requisição
$method = $_SERVER['REQUEST_METHOD'];

// Dados de exemplo (como se fosse um banco de dados)
$pokemon = [
    ["id" => 1, "name" => "Bulbasaur", "type" => "Grass/Poison"],
    ["id" => 2, "name" => "Charmander", "type" => "Fire"],
    ["id" => 3, "name" => "Squirtle", "type" => "Water"]
];

// Função para retornar todos os Pokémons
function getPokemons($pokemon) {
    echo json_encode($pokemon);
}

// Função para retornar um Pokémon específico por ID
function getPokemonById($pokemon, $id) {
    foreach ($pokemon as $p) {
        if ($p['id'] == $id) {
            echo json_encode($p);
            return;
        }
    }
    echo json_encode(["message" => "Pokémon not found"]);
}

// Manipulando as requisições
if ($method == 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        getPokemonById($pokemon, $id);
    } else {
        getPokemons($pokemon);
    }
} else {
    echo json_encode(["message" => "Método não suportado"]);
}
?>
