<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $__staticSiteConfigs;
    
    public function beforeFilter() {
        //parent::beforeRender();
        $excludeFunctions = array('admin_login', 'admin_logout');
        
        if($this->params['prefix'] == 'admin' && isset($this->params['prefix'])){
            if($this->__adminAuth() == TRUE){
                $this->layout = "admin";
            }else{
                if(!in_array($this->action, $excludeFunctions)){
                    $this->redirect(SITE_URL . ADMIN_ALIAS . '/login');
                }
            }
        }else{
            $this->loadModel('Layout');

            $__listCategories = $this->Layout->getAllCategories();
            $__listSiteConfigs = $this->Layout->gellAllWebConfigs();
            $__listFeaturedNews = $this->Layout->getFeaturedNews();

            $_listConfigs = array();
            foreach($__listSiteConfigs as $__config){
                $_listConfigs[$__config['Layout']['configName']] = $__config['Layout']['configValue'];
            }

            $this->set("__listCategories", $__listCategories);
            $this->set('__globalSiteConfigs', $_listConfigs);
            $this->set('__globalFeaturedNews', $__listFeaturedNews);
            $this->__staticSiteConfigs = $_listConfigs; 
        }
    }
    
    /**
     * Check admin authentication
     * 
     * @return boolean Is auth or unauth
     */
    private function __adminAuth(){
        $session = $this->Session->read('AdminSess');
        
        if(isset($session) || $session['isLogin'] == TRUE){
            //$this->redirect(SITE_URL . ADMIN_ALIAS . '/login');
            return TRUE;
        }
        
        return FALSE;
    }
}
