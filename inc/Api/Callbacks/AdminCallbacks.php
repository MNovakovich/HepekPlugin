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

}
