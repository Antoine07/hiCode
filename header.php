<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hicode</title>
    <?php wp_head(); ?>
</head>
<body class="<?php echo al_insert_className() ; ?>">
    <h1>Hicode</h1>
    <h2>
    <?php 
    // test si on se trouve sur la page d'accueil
    if (is_home() == true) : ?>
    Bienvenu sur la page d'accueil
    <?php endif; ?>

    <?php 
    // test si on se trouve dans une catégorie
    if (is_category() == true) :
        single_cat_title();
    endif; ?>

    <?php 
    // test si on se trouve dans un article
    if (is_single() == true) :
        single_post_title();
    endif; ?>
</h2>
<header >
<?php 
// fonction WP qui permet d'aller chercher le menu définit dans l'administration
wp_nav_menu([
    'theme_location' => 'main'
]); ?>

</header>