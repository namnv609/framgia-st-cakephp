<?php
class HomesController extends AppController {

    public function index() {
        $this->loadModel('Layout');
        
        $listNewsIDs = unserialize($this->__staticSiteConfigs['siteSlide']);
        $this->set('__homeSlide', $this->Layout->getNewsSlide($listNewsIDs));
    }

}
