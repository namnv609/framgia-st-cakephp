<?php
class ConfigsController extends AppController {
    //public $helpers = array("Session");
    
    public function admin_index() {
        $this->loadModel('News');
        $flashMessage = $this->Session->read('Message.controllerFlashMsg.message');
        $this->Session->delete('Message.controllerFlashMsg.message');
        
        $validationErrs = NULL;
        
        if($flashMessage != null && !empty($flashMessage)){
            $validationErrs = $flashMessage;
        }
        
        $this->set(array(
                'title_for_layout',
                'websiteConfigs',
                'listNews',
                'validationErrs'
            ),
            array(
                'Website Configurations',
                $this->Config->getWebsiteConfigs(),
                $this->News->find("all", array("fields" => array("newsID", "newsTitle"), "order" => array("newsID DESC"))),
                $validationErrs
            )
        );
        //$this->set('title_for_layout', 'Website Configurations');
    }
    
    public function admin_update(){
        $validationErrs = NULL;
        
        if($this->request->isPost()){
            $formPost = $this->request->data;
            $this->Config->set($formPost);
            
            if($this->Config->validates()){
                $updateQuery = "UPDATE tbl_configs "
                        . "SET configValue = CASE configID "
                        . "WHEN 1 THEN '$formPost[txtSiteName]'"
                        . "WHEN 2 THEN '$formPost[txtSiteSlogan]'"
                        . "WHEN 3 THEN '".  serialize($formPost["slbSiteSlide"])."' "
                        . "WHEN 4 THEN '$formPost[txtSiteLogo]' "
                        . "END "
                        . "WHERE configID IN (1, 2, 3, 4)";
                
                $this->Config->query($updateQuery);
                
                $this->Session->setFlash('Update website configuration successful.', NULL);
            }else{
                $validationErrs = $this->Config->validationErrors;
            }
            
        }else{
            $this->redirect(SITE_URL . ADMIN_ALIAS);
        }
        
        $this->Session->setFlash($validationErrs, NULL, NULL, 'controllerFlashMsg');
        $this->setAction('admin_index');
    }

}