<?php

function disable_new_posts() {
    if( current_user_can('editor') ) {
        // Hide sidebar link
        global $submenu;
        unset($submenu['edit.php?post_type=crest_of_alexandria'][10]);
        unset($submenu['edit.php?post_type=preserve_westfields'][10]);
        unset($submenu['edit.php?post_type=about_craftmark'][10]);

        // Hide link on listing page
        if ($_GET['post_type'] == 'crest_of_alexandria' || $_GET['post_type'] == 'preserve_westfields' || $_GET['post_type'] == 'about_craftmark') {
            echo '<style>.page-title-action{display: none;}</style>'; 
            echo '<style>.row-actions {display: none !important;}</style>'; 
        }
    }
}
add_action('admin_menu', 'disable_new_posts');