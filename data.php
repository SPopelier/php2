<!-------------------------------data.php------------------------------->
<?php

function getpageData(string $route): array
{
    $default = [
        'title' => 'Accueil',
        'description' => 'Bienvenue sur la page d’accueil de Sarah.',
        'header' => 'Bienvenue chez Sarah 🌸',
        'footer' => 'Merci pour votre visite ❤️'
    ];

    $pages = [
        'page-accueil' => $default,
        'page-contact' => [
            'title' => 'Entraînement',
            'description' => 'Découvrez mes exercices d’apprentissage.',
            'header' => 'On s’entraîne avec style 💪🎀',
            'footer' => 'Merci pour votre visite',
        ],
        'page-contactWithFiles' => [  // Ajout de cette page manquante
            'title' => 'Contact avec fichiers',
            'description' => 'Envoyez-nous vos fichiers',
            'header' => 'Envoi de fichiers 📎',
            'footer' => 'Merci pour votre visite'
        ]
    ];
    return $pages[$route] ?? $default;
}