<?php

function contactForm() {
	wp_enqueue_style('s-F-styles',plugins_url().'/contact-form/css/sFstyle.css');
	wp_enqueue_script( 's-F-mainjs', plugins_url() . '/contact-form/js/sFmain.js', array('jquery'), true );
    /* Create Nonce */
    wp_localize_script('s-F-mainjs', 'ajax_var_url', array(
        'url' => plugins_url().'/contact-form/includes/contact-action.php',
        'nonce' => wp_create_nonce('ajax-nonce'),
    ));	

}
add_action( 'wp_enqueue_scripts', 'contactForm' );