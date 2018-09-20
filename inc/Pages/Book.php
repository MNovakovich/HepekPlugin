<?php 
/**
 * @package HepekPlugin
 */

 namespace Inc\Pages;

 class Book{

    
    public function register(){
         add_action('init', array( $this, 'custom_post_type'));
    }

    public function custom_post_type(){
        register_post_type('book', [
            'public' => true,
            'label' => 'Books'
        ]);
    }
 }

