<?php

// Hook after_setup_theme
add_action('after_setup_theme', 'al_setup_theme');

// callback 
function al_setup_theme(){

    register_nav_menus([
        'main' => 'Mon menu principal',
        'footer' => 'Menu dans le footer',
        'sidebar' => 'Menu dans la sidebar'
    ]);

}