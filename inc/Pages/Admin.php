<?php 
/**
 *  @package HepekPlugin
 */
namespace Inc\Pages;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();


    public function register(){
     
       $this->settings = new SettingsApi();
       $this->callbacks =  new AdminCallbacks();
       $this->setPages();
       $this->setSubpages();
        //  * register Hepek page in dashboard
      // add_action('admin_menu', array($this, 'add_admin_pages'));

       $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();
     // add_submenu_page($this->pages[0]['menu_slug'],'Onepage Theme Support', 'Theme Options', 'manage_options', 'markooo_onepage_theme', array($this, 'onepage_theme_support_page'));
    }

     public function setPages(){

        $this->pages =  array(
             array(
                'page_title'=>'Hepek Plugin',
                'menu_title'=>'Hepek',
                'capability'=>'manage_options',
                'menu_slug' => 'hepek_plugin',
                'callback'  => array( $this->callbacks, 'adminDashboard' ),
                'icon_url'  =>'dashicons-store',
                'position'  =>25

            )
        );

     }


     public function setSubpages(){

        $this->subpages =  array(
			array(
				'parent_slug'=> 'hepek_plugin',
				'page_title'=> 'Custom Post Types',
				'menu_title'=> 'CPT',
				'capability'=> 'manage_options',
				'menu_slug' => 'hepek_cpt',
				'callback'  => function(){ echo "<h1>CTP Manager </h1>"; }
            ),
            array(
				'parent_slug'=> 'hepek_plugin',
				'page_title'=> 'Custom Taxonomies',
				'menu_title'=> 'Taxonomies',
				'capability'=> 'manage_options',
				'menu_slug' => 'hepek_taxonomies',
				'callback'  => function(){ echo "<h1>Taxonomies Manager </h1>"; }
            ),
              array(
				'parent_slug'=> 'hepek_plugin',
				'page_title'=> 'Custom Widgets',
				'menu_title'=> 'Widgets',
				'capability'=> 'manage_options',
				'menu_slug' => 'hepek_widgets',
				'callback'  => function(){ echo "<h1>Widgets Manager </h1>"; }
			)
		);

     }
/* 
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
     */
}
