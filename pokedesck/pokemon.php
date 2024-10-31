<?php

if (isset($_GET['name'])) {
    $pokemonName = strtolower(trim($_GET['name']));
    $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemonName;

    // Fazendo requisição para a API do Pokémon
    $response = file_get_contents($url);

    if ($response === FALSE) {
        // Redireciona de volta à página inicial com mensagem de erro
        header("Location: index.php?error=1");
        exit;
    }

    // Decodificando o JSON retornado pela API
    $pokemonData = json_decode($response, true);

    // Pega as informações do Pokémon
    $pokemonName = ucfirst($pokemonData['name']);
    $pokemonImage = $pokemonData['sprites']['front_default'];
    $pokemonId = $pokemonData['id'];
    $pokemonType = $pokemonData['types'][0]['type']['name'];
    $pokemonAbilities = array_map(function($ability) {
        return $ability['ability']['name'];
    }, $pokemonData['abilities']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon <?php echo $pokemonName; ?> - Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="pokedex-container">
        <h1><?php echo $pokemonName; ?> (#<?php echo $pokemonId; ?>)</h1>
        <img src="<?php echo $pokemonImage; ?>" alt="Imagem do <?php echo $pokemonName; ?>">
        <p><strong>Tipo:</strong> <?php echo ucfirst($pokemonType); ?></p>
        <p><strong>Habilidades:</strong> <?php echo implode(', ', $pokemonAbilities); ?></p>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
