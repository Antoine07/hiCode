# chapitre 2

## Templating de WP Introduction

* On a vu hier la boucle de WP elle permet d'afficher les articles dans un template

### Changer le style du permalink dans WP url simple

Dans les paramètres mettez les permalinks : plain, cette option permet d'avoir les url avec une syntaxe proche

du code : ?p=123 ~ indique dans l'url que l'on souhaite récupérer le post dont l'identifiant est 123 en base de données.

En SQL voici la requête qu'il faudrait taper pour récupérer tous les posts en affichant ID et post_title uniquement :

SELECT ID, post_title FROM `wp_posts`;

Pour récupérer un article dont l'indifiant est p = 1 par exemple :

SELECT ID, post_title FROM wp_posts WHERE ID=1;

Lorsque vous cliquez sur un permalink dans le site WP fait une requête identique à celle que nous venons de voir.

## Personnalisation de la page des articles

Objectif c'est d'avoir tous les articles en page d'accueil avec un extrait + titre du contenu et avoir un template (modèle) pour les
articles afin d'afficher le contenu de l'article + titre.

## Exercice 2

Pour personnaliser les deux pages il faut avoir deux templates différents, respectivement pour la page d'accueil index.php et pour les articles : single.php

Remarque attention les noms des fichiers sont déterminés par WP.

Créez un fichier single.php dans le thème hicode pour les articles (personnalisation) et essayer d'afficher le contenu de votre artcile dans cette page.

## Correction

il faut créer un fichier single.php et écrire dans ce fichier la boucle PHP de WP. La boucle est contextuelle, elle récupère l'url. La syntaxe de l'url permet à WP de savoir quel type de page il doit afficher :

?p=1  ~ table posts en base de données ID = 1 en SQL ~ templating à single.php

Dans la page index.php utiliser the_excerpt() pour afficher un extrait de l'article.

Dans la page single.php utiliser the_content() pour afficher le contenu de l'article en entier.

## Exercice 3

Créez deux catégories dans l'administration "formation" et "cours" placez des articles dans ces deux catégories puis, créez le template category.php pour afficher les articles d'une catégorie dans une page personnalisée.

Utilisez la fonction the_category() de WP pour afficher le lien de la catégorie dans laquelle se trouve l'article.

Attention the_category() doit se placer dans la boucle WP.

## Correction exercice 3

remarquez l'url vous avez pour les catégories cat=2 ~ requête SQL ~ le template category.php + la boucle

## Exercice 4

Créez le template permettant d'afficher les articles d'un auteur (ici c'est l'administrateur).

```php

<?php the_author_posts_link(); ?>

```

## Correction exercice 4

Il faut créer le fichier author.php dans lequel on place la boucle de WP. Et ajouter le lien the_author_posts_link(); dans la boucle WP.

## Syntaxe PHP adaptée au templating

Vous allez faire du PHP dans des fichiers dédiés au PHP et vous allez écrire du PHP dans des fichiers HTML + PHP. Pour le templating on utilise une syntaxe particulière pour le PHP plus lisible.

```php

<?php if(have_posts() ) : ?>

Du code HTML ...

<?php endif ; ?>


<?php

while( $condition) :


// code ...

endwhile;


if($condition) :


// code...

else:


// code...


endif;


?>

```

## Exemple concret dans un template, syntaxe alternative PHP

```php

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


DU HTML + PHP ouvert/fermé


<?php endwhile; else: ?>


SINON HTML + PHP ...


<?php endif; ?>

```

## fichier functions.php du thème

Le fichier functions.php doit être créer dans le thème hicode, il permettra d'étendre et de modifier le comportement du CMS.

Dans ce fichier vous allez créer le hook suivant "after_setup_theme" :

```php

<?php


// premier paramètre le nom du HOOK et deuxième paramètre le nom de la fonction callback permettant de modifier ou d'étendre les fonctionnalités du CMS 

add_action('after_setup_theme', 'al_setup_theme');


function al_setup_theme(){

    register_nav_menus([
        'main' => 'Mon menu principal',
        'footer' => 'Menu dans le footer'
    ]);

}


?>

```

Dans l'administration ajouter deux items de menu : "cours" et "formations".

Dans un deuxième temps vous allez devoir placer les/le menu(s) dans un template, dans l'index.php vous allez écrire :

```html

<body>
    <h1>Hicode</h1>
    <h2>Page d'accueil</h2>

<header>

```html

<?php

// fonction WP qui permet d'aller chercher le menu définit dans l'administration
wp_nav_menu([

    'theme_location'  => 'main'

]); ?>

</header>

```

## Exercice 5

Créez un menu dans le footer avec les liens suivants : home, mentions légales

Les mentions légales seront placées dans une page.

## Correction voir github

## Template hierarchy

urL (contexte) + le boucle de WP (requête pour récupérer les articles)

La template hierarchy est conditionnelle voir la documentation officielle :

https://developer.wordpress.org/files/2014/10/wp-hierarchy.png

## Exercice 6

Créez un template spécifique pour la catégorie formation.

## Correction 

Pour avoir un fichier spécifique pour la catégorie formation :

category-ID.php

Avec le slug (voir dans l'administration CMS dans la catégorie)

category-formation.php

## Exercice 7 (TP)

Créez un thème enfant pour le thème twentyseventeen que vous appelerez twentyseventeen-child. Dans ce thème enfant créer les deux fichiers suivants :

style.css et functions.php

fichier style.css écrivez le code suivant, le tag Template: twentyseventeen indique à WP le nom du thème parent.

```css

/*
 Theme Name:   Twenty seventeen Child
 Theme URI:    http://example.com/twenty-seventeen-child/
 Description:  Twenty seventeen Child Theme
 Author:       John Doe
 Author URI:   http://example.com
 Template:     twentyseventeen
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
 Text Domain:  twenty-seventeen-child
*/

```

fichier functions.php

```php

add_action('wp_enqueue_scripts', 'twenty_enqueue_styles');

function twenty_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

}

```

Activez ce thème. Puis personnaliser le site avec les contraintes suivante :

* 1/ Changez la couleur de fond des articles du site. 

* 2/ Mettez une image de fond en CSS au site.

* 3/ Modifiez la couleur de la première lettre des titres des articles.