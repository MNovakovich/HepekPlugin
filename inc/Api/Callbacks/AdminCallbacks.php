<?php 
/**
 * @package  HepekPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

    public function adminDashboard(){
        return require_once(PLUGIN_PATH. '/templates/admin.php');
    }

    public function adminCpt(){
        return require_once(PLUGIN_PATH. '/templates/cpt.php');

    }

    public function hepekOptionsGroup( $input ){
       return $input;
    }


    public function hepekAdminSection(){
      echo 'check this beautiful section';
    }

    public function hepekTExtExample(){

      $value =  esc_attr( get_option('text_example') );
      echo '<input type="text"  class="regular-text" name="text_example" value="'.$value.'"  placeholder="Write Something Here" >';
    }

    public function hepekFirstName(){
      $value =  esc_attr( get_option('first_name') );
      echo '<input type="text"  class="regular-text" name="first_name" value="'.$value.'"  placeholder="Write First Name" >';
    }

}
