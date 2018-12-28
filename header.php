<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hicode</title>
    <?php wp_head(); ?>
</head>
<body>
    <h1>Hicode</h1>
    <h2>Page d'accueil</h2>

<header>
<?php 
// fonction WP qui permet d'aller chercher le menu définit dans l'administration
wp_nav_menu([
    'theme_location' => 'main'
]); ?>

</header>