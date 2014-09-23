<?php
class HomesController extends AppController {
    /**
     * Front-end functions
     */
    public function index() {
        $this->loadModel('Layout');
        
        $listNewsIDs = unserialize($this->__staticSiteConfigs['siteSlide']);
        $this->set(
            array(
                '__homeSlide',
                'listNewNews'
            ),
            array(
                $this->Layout->getNewsSlide($listNewsIDs),
                $this->Home->getNewNews()
            )
        );
    }
    
    
    /**
     * Back-end functions
     */
    public function admin_index(){
        $this->set('title_for_layout', 'Dashboard');
    }
    
    public function admin_login(){
        $this->set('title_for_layout', 'Login to Administrator Control Panel');
        $formPost = $this->request->data;
        
        if(isset($formPost) && count($formPost) > 0){
            $this->loadModel('Login');
            $this->Login->set($formPost);
            
            if($this->Login->validates()){
                $userInfo = $this->Login->userLogin($formPost['txtUserName']);
                if(count($userInfo['Login']) > 0 && $userInfo['Login']['userPass'] == md5($formPost['txtPassword'])){
                    pr($userInfo);
                    $this->Session->write('AdminSess.isLogin', TRUE);
                    $this->Session->write('AdminSess.userName', $userInfo['Login']['userFullName']);
                    $this->Session->write('AdminSess.userID', $userInfo['Login']['userID']);
                    
                    $this->redirect(SITE_URL . ADMIN_ALIAS);
                }else{
                    $this->Session->setFlash('Email or Password is not valid.');
                }
            }else{
                $this->set('validationErrs', $this->Login->validationErrors);
            }
        }
        
        $this->layout = NULL;
    }
    
    public function admin_logout(){
        $this->Session->delete('AdminSess');
        
        $this->redirect(SITE_URL . ADMIN_ALIAS . '/login');
    }

}
