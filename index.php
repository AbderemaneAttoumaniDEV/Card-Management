<?php

require __DIR__ . '/vendor/autoload.php';

use Abderemane\Poo\Card;
use Abderemane\Poo\ListCards;

// Session pour stocker les cartes
session_start();

// Initialise la liste des cartes si elle n'existe pas encore
if (!isset($_SESSION['listCards'])) {
    $_SESSION['listCards'] = [];
}

// Fonction pour gérer les actions (ajouter, modifier, supprimer)
function handleActions() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['addCard'])) {
            // Ajouter une carte
            $question = trim($_POST['question']);
            $answer = trim($_POST['answer']);
            if ($question && $answer) {
                $_SESSION['listCards'][] = new Card($question, $answer);
            }
        } elseif (isset($_POST['deleteCard'])) {
            // Supprimer une carte
            $index = intval($_POST['deleteCard']);
            unset($_SESSION['listCards'][$index]);
            $_SESSION['listCards'] = array_values($_SESSION['listCards']); // Réindexation
        } elseif (isset($_POST['editCard'])) {
            // Modifier une carte
            $index = intval($_POST['editCard']);
            $_SESSION['listCards'][$index] = new Card($_POST['question'], $_POST['answer']);
        }
    }
}

// Appeler la gestion des actions
handleActions();

// Inverser l'ordre des cartes pour afficher les plus récentes en premier
$listCards = array_reverse($_SESSION['listCards']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Cartes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-5">

<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-5">Gestion de Cartes</h1>

    <!-- Formulaire d'ajout -->
    <div class="mb-5">
        <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Ajouter une carte</h2>
            <div class="mb-4">
                <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question :</label>
                <input type="text" name="question" id="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Réponse :</label>
                <input type="text" name="answer" id="answer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" name="addCard" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
        </form>
    </div>

    <!-- Liste des cartes -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold mb-4">Liste des cartes</h2>
        <?php if (count($listCards) === 0): ?>
            <p>Aucune carte disponible.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($listCards as $index => $card): ?>
                    <li class="mb-4">
                        <div class="p-4 bg-gray-50 border rounded">
                            <p><strong>Question:</strong> <?= htmlspecialchars($card->getQuestion()) ?></p>
                            <p><strong>Réponse:</strong> <?= htmlspecialchars($card->getAnswer()) ?></p>
                            <!-- Formulaire de modification -->
                            <form method="POST" class="inline">
                                <input type="hidden" name="editCard" value="<?= $index ?>">
                                <input type="text" name="question" value="<?= htmlspecialchars($card->getQuestion()) ?>" class="border rounded px-2">
                                <input type="text" name="answer" value="<?= htmlspecialchars($card->getAnswer()) ?>" class="border rounded px-2">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Modifier</button>
                                <button type="submit" name="deleteCard" value="<?= $index ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
