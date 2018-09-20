<?php

/**
 *  @package HepekPlugin
 */

 namespace Inc;

 final class Init {
    /**
     *  Store all the classes inside array
     * @return array Full list of classes
     */
    public static function get_services(){
        return [
            Base\Enqueue::class,
            Base\SettingsLink::class,
            Pages\Admin::class,
            Pages\Book::class,
        
        ];
    }
    
    /**
     * Loop through the classes, initialize them, 
     * and call register method if it exists
     *  @return 
     */
    public static function register_services(){
         foreach (self::get_services() as $class ) {
             $service = self::instantiante( $class );

             if ( method_exists($service ,'register')) {
                  $service->register();
             }
         }
    }
    /**
     *  Initialize the class 
     * @param class $class class from the services array
     * @return class instance new instance of class
     */
    private static function instantiante( $class ){
       
        return new $class();

    
    }
 }



/* 

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Pages\Admin;

if( ! class_exists('HepekPlugin') ) {
class HepekPlugin{

    public $plugin; // registrujemo rutu plugina zbog add_filter('plugin_action_link)
    
    function __construct(){
       $this->plugin = plugin_basename(__FILE__);
       $this->create_post_type();
    }

    protected function create_post_type(){
        add_action('init', array( $this, 'custom_post_type'));
    }

    function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        // register Hepek page in dashboard
        add_action('admin_menu', array($this, 'add_admin_pages'));

       // add_filter('plugin_action_link_hepek-plugin', array($this, 'settings_link'));
       add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));  // funkcija radi isto kao i prethodna

       // echo $this->plugin;
         
    }

    public function settings_link( $links ){
       $settings_link = '<a href="options-general.php?page=hepek_plugin">Settings</a>';
       array_push( $links , $settings_link );
       return $links;
    }
    // create Hepek page in dashborad
    public  function add_admin_pages(){
        add_menu_page('Hepek Plugin', 'Hepek', 'manage_options', 'hepek_plugin', array($this, 'admin_index'), 'dashicons-store', 11);
    }

    // template for Hepek page
    public function admin_index(){
        // require template
           require_once plugin_dir_path(__FILE__).'templates/admin.php' ;
    }
    
   
    function custom_post_type(){
        register_post_type('book', [
            'public' => true,
            'label' => 'Books'
        ]);
    }

    function enqueue(){
        // enqueue all our scripts
        wp_enqueue_style('hepekstyle',plugins_url('/assets/css/main.css', __FILE__ ) );
       wp_enqueue_script('hepekscript', plugins_url('/assets/js/hepek.js',__FILE__));
    }

    function activate(){
        // require_once plugin_dir_path(__FILE__).'inc/hepek-plugin-activate.php' ;
         Activate::activate();
    }

   
}

    $hepekPlugin =  new HepekPlugin;
    $hepekPlugin->register();





    // activate

    // ovo je isto kao do_action() hook

    register_activation_hook(__FILE__, array(hepekPlugin, 'activate'));

    //deactivate
   //  require_once plugin_dir_path(__FILE__).'inc/hepek-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

} // if ! class_exists */