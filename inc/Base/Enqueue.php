<?php 

/**
 * @package HepekPlugin
 */

 namespace Inc\Base;

 class Enqueue {

    public function register(){
         add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

     function enqueue(){
        // enqueue all our scripts
     //   wp_enqueue_style('hepekstyle',plugins_url('../../assets/css/main.css', __FILE__ ) );
        //wp_enqueue_script('hepekscript', plugins_url('../assets/js/hepek.js',__FILE__));

        // with constant path 
        wp_enqueue_style('hepekstyle',  PLUGIN_URL . 'assets/css/main.css');
        wp_enqueue_style('bootstrap-css',  PLUGIN_URL . 'assets/css/bootstrap.min.css');
        wp_enqueue_script('hepekscript', PLUGIN_URL .'assets/js/hepek.js');
        wp_enqueue_script('bootstrap-js', PLUGIN_URL .'assets/js/bootstrap.min.js', array('jquery'), true);
    }

 }