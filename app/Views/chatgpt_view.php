<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse de l'IA</title>
</head>
<body>
    <h1>Générateur d'Offre d'Emploi</h1>
    
    <!-- Formulaire de requête -->
    <form action="<?= site_url('chatgpt_view/generate') ?>" method="POST">
        <label for="prompt">Description du poste :</label><br>
        <textarea id="prompt" name="prompt" rows="4" cols="50" required></textarea><br><br>

        <label for="keywords">Mots-clés :</label><br>
        <input type="text" id="keywords" name="keywords" placeholder="Exemple : PHP, gestion de projet, leadership"><br><br>

        <button type="submit">Générer</button>
    </form>

    <!-- Affichage de la réponse générée -->
    <?php if (isset($generatedText)): ?>
        <h2>Offre d'Emploi Générée</h2>
        <p><?= esc($generatedText) ?></p>
    <?php endif; ?>
</body>
</html>
