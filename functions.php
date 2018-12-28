<?php

// Hook after_setup_theme
add_action('after_setup_theme', 'al_setup_theme');

// callback 
function al_setup_theme()
{

    register_nav_menus([
        'main' => 'Mon menu principal',
        'footer' => 'Menu dans le footer',
        'sidebar' => 'Menu dans la sidebar'
    ]);

}

function foo()
{
    echo "hello foo !!";
}

function al_insert_className()
{
     /* echo (is_home())? 
            "hicode__home" : 
            ((is_category())? "hicode_category" : "hicode_single") ; */

    if (is_home()) {
        return "hicode__home";
    } elseif (is_category()) {
        return "hicode__category";
    } elseif (is_single() || is_page()) {
        return "hicode__single";
    } else {
        return "hicode_none";
    }
}