<?php 
/**
 *  @package HepekPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController
{

    public function register(){
        // register Hepek page in dashboard
        add_action('admin_menu', array($this, 'add_admin_pages'));

    }

     // create Hepek page in dashborad
    public  function add_admin_pages(){
        add_menu_page('Hepek Plugin', 'Hepek', 'manage_options', 'hepek_plugin', array($this, 'admin_index'), 'dashicons-store', 11);
    }

    // template for Hepek page
    public function admin_index(){
        // require template
         //  require_once plugin_dir_path(__FILE__).'../../templates/admin.php' ;
           require_once $this->plugin_path . 'templates/admin.php' ;
    }
    
}
