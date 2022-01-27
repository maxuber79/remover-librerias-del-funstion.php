<?php
add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );
function remove_default_stylesheet() {
    wp_dequeue_style( 'original-enqueue-stylesheet-handle' );
    wp_deregister_style( 'original-register-stylesheet-handle' );
 
    wp_register_style( 'new-style', get_stylesheet_directory_uri() . '/new.css', false, '1.0.0' ); 
    wp_enqueue_style( 'new-style' );
}

function remove_register_styles() {
   /* a la page temaplate */
		if(is_page_template('name theme')) {
			wp_deregister_style( '[name wp_register_script / name wp_register_style]' );
		}
 	/* Mas de un temaplet */
	 if ( is_page_template( array('page-name.php', 'page-theme.php'))) {
    	wp_deregister_style('[name wp_register_script / name wp_register_style]');
    }
		/* a la fornt page */
		if(is_front_page('[name theme]')) {
			wp_deregister_style( '[name wp_register_script / name wp_register_style]' );
		} 
		/* A la pagina 404 */
  	if(is_404()) {
        wp_deregister_style( '[name wp_register_script / name wp_register_style]' );
    }
	/* A una pagina especifica*/		
	if(is_page('page.php')) {
		wp_deregister_style( '[name wp_register_script / name wp_register_style]' );
	} 
}
add_action( 'wp_enqueue_scripts', 'remove_register_styles', 100);
