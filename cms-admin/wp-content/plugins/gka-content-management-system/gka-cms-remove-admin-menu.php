<?php

// Remove menu from Admin bar
function remove_menus(){
  
  remove_menu_page( 'edit.php' );                  //Dashboard
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'remove_menus' );
?>