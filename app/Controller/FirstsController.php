<?php
class FirstsController extends AppController {

    public function index() {
        echo 'OK';
        
        $this->autoRender = FALSE;
    }

}

