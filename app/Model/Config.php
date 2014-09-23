<?php
class Config extends AppModel {
    public $validate = array(
        'txtSiteLogo' => array(
           'empty' => array(
               'rule' => 'notEmpty',
               'message' => 'Site logo not be blank'
           )
        ),
        'txtSiteName' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Site name not be blank'
            )
        ),
        'txtSiteSlogan' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Site slogan not be blank'
            )
        ),
        'slbSiteSlide' => array(
            'empty' => array(
                'rule' => array('multiple', array(
                    'min' => 1
                )),
                'required' => TRUE,
                'message' => 'Please select at least one news'
            )
        )
    );
    
    public function getWebsiteConfigs(){
        $listConfigs = $this->find("all");
        $configs = array();
        
        foreach($listConfigs AS $config){
            if($config["Config"]["configValue"] == "" || $config["Config"]["configValue"] == NULL){
                $configs[$config["Config"]["configName"]] = "n/a";
            }else{
                $configs[$config["Config"]["configName"]] = $config["Config"]["configValue"];
            }
        }
        
        return $configs;
    }
}

