<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="pokedex-container">
        <h1>Pokédex</h1>
        <form action="pokemon.php" method="GET">
            <input type="text" name="name" placeholder="Digite o nome ou número do Pokémon" required>
            <button type="submit">Buscar</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <p class="error-message">Pokémon não encontrado! Tente novamente.</p>
        <?php endif; ?>
    </div>
</body>
</html>
