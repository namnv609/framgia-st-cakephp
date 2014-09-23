<?php
class LoginController extends AppController {

    public function admin_loginIndex() {
        $this->set('title_for_layout', 'Login to Administrator Control Panel');
        $formPost = $this->request->data;
        
        if(isset($formPost) && count($formPost) > 0){
            
        }
        
        $this->layout = NULL;
    }

}
