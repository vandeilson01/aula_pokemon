<?php
// Função para fazer a requisição à API do Pokémon
function getPokemonFromApi($pokemonName) {
    $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemonName);
    $data = file_get_contents($url);  // Fazendo a requisição à PokéAPI
    return json_decode($data, true);  // Decodificando o JSON
}

// Testando a função
$pokemonName = "pikachu";
$pokemonData = getPokemonFromApi($pokemonName);

// Exibir os dados do Pokémon
echo json_encode($pokemonData, JSON_PRETTY_PRINT);
