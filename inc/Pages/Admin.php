<?php 
/**
 *  @package HepekPlugin
 */
namespace Inc\Pages;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    public $subpages = array();


    public function register(){

       $this->settings = new SettingsApi();
       $this->callbacks =  new AdminCallbacks();
       $this->callbacks_mngr =  new ManagerCallbacks();
       $this->setPages();
       $this->setSubpages();

       $this->setSettings();
       $this->setSections();
       $this->setFields();
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
				'callback'  => array($this->callbacks, 'adminCpt')
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

     public function setSettings(){

        $args = array(
            array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'cpt_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
            
           array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'taxonomy_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'media_widget',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'gallery_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'testimonial_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'templates_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'login_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'membership_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
             array(
                'option_group' => 'hepek_options_settings', 
                'option_name' =>'chat_manager',
                'callback'    => array($this->callbacks, 'checkboxSanitize')
            ),
       );


       $this->settings->setSettings( $args );
     }


     public function setSections(){
          
        $args = array(
            array(
                'id'       => 'hepek_admin_index', 
                'title'    =>'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page'     =>'hepek_plugin'  // isto kao menu_slug 
             )
       );

        $this->settings->setSections( $args );
     }

       public function setFields(){
          
        $args = array(
            array(
                'id'       => 'cpt_manager', 
                'title'    =>'Activate CTP Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'cpt_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           array(
                'id'       => 'taxonomy_manager', 
                'title'    =>'Activate Taxonomy Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'taxonomy_manager',
                    'class'    =>'ui-toggle'
                )

           ),
            array(
                'id'       => 'media_widget', 
                'title'    =>'Activate Media Widget',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'media_widget',
                    'class'    =>'ui-toggle'
                )

           ),

            array(
                'id'       => 'gallery_manager', 
                'title'    =>'Activate Galery',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'gallery_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           array(
                'id'       => 'testimonial_manager', 
                'title'    =>'Activate Testimonial',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'testimonial_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           array(
                'id'       => 'templates_manager', 
                'title'    =>'Activate Templates Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'templates_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           array(
                'id'       => 'login_manager', 
                'title'    =>'Activate Login Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'login_manager',
                    'class'    =>'ui-toggle'
                )

           ),
          array(
                'id'       => 'membership_manager', 
                'title'    =>'Activate Membership Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'membership_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           array(
                'id'       => 'chat_manager', 
                'title'    =>'Activate Chat Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page'     =>'hepek_plugin',  // isto kao menu_slug 
                'section'  =>'hepek_admin_index',
                'args'     => array(
                    'label_for' =>'chat_manager',
                    'class'    =>'ui-toggle'
                )

           ),
           

       );

        $this->settings->setFields( $args );
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
