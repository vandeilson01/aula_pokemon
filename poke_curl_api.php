<?php
// Função para fazer a requisição usando cURL
function getPokemonFromApiWithCurl($pokemonName) {
    $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemonName);
    $ch = curl_init();  // Inicializa o cURL

    // Configurações da requisição
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);  // Executa a requisição
    curl_close($ch);  // Fecha a conexão

    return json_decode($response, true);  // Retorna o JSON como array
}

// Testando a função
$pokemonName = "charmander";
$pokemonData = getPokemonFromApiWithCurl($pokemonName);

// Exibir os dados do Pokémon
echo json_encode($pokemonData, JSON_PRETTY_PRINT);



// curl -X POST -d '{"name": "Pikachu", "type": "Electric"}' \
// -H "Content-Type: application/json" \
// http://localhost:8000/api.php
