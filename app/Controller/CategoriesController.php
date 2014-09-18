<?php
class CategoriesController extends AppController {

    public function index() {
        //do stuff.
        // main function in Cake
    }
    
    
    /**
     * Admin actions
     */
    public function admin_index(){
        $listCategories = $this->Category->admin_getAllCategories();
        
        $this->set(
                array(
                    'title_for_layout',
                    'listNewsCategories'
                ),
                array(
                    'News Categories Manage',
                    $listCategories
                )
        );
    }
    
    public function adminAJAXChangeStatus(){
        if($this->request->is("ajax")){
            $session        = $this->Session->read("AdminSess");
            $postData       = $this->request->data;
            
            if($session["isLogin"] === TRUE){
                if($postData["id"] && $postData["status"] >= 0){
                    $this->Category->updateAll(
                        array(
                            "Category.cateStatus" => $postData["status"]
                        ),
                        array(
                            "Category.cateID" => (int) $postData["id"]
                        )
                    );
                    echo "OK";
                }else{
                    echo 'Error. Please try again later.';
                    //var_dump($postData);
                }
            }else{
                echo 'Error 403. Unauthorized';
            }
        }else{
            $this->redirect(SITE_URL, 403);
        }
        
        $this->autoRender = FALSE;
    }
    
    public function adminajaxdelete(){
        if($this->request->is("post")){
            $session        = $this->Session->read("AdminSess");
            $postData       = $this->request->data;
            
            if($session["isLogin"] === TRUE){
                if($postData["id"]){
                    $this->loadModel('News');
                    $hasNews = $this->News->find("count", array(
                        "conditions" => array(
                            "News.cateID" => (int) $postData["id"]
                        )
                    ));
                    
                    if($hasNews <= 0){
                        $this->Category->delete((int) $postData["id"]);
                        echo "OK";
                    }else{
                        echo 'Cannot delete this category because this category has news.';
                    }
                }else{
                    echo 'Error. Please try again later.';
                }
            }else{
                echo 'Error 403. Unauthorized';
            }
        }else{
            $this->redirect(SITE_URL, 403);
        }
        
        $this->autoRender = FALSE;
    }
    
    public function admin_edit($cateID = 0){
        $title_for_layout = "Edit Category";
        $flashMessage = $this->Session->read('Message.categoryFlashMessage.message');
        $validationErrs = NULL;
        
        $this->Session->delete(Message.categoryFlashMessage.message);
        
        $cateData = $this->Category->find("first", array(
            'conditions' => array(
                'cateID' => $cateID
            )
        ));
        
        if(count($cateData) <= 0){
            $cateData = array(
                "Category" => array(
                    "cateID" => 0,
                    "cateName" => "",
                    "cateParentID" => 0,
                    "cateStatus" => 1
                )
            );
            $title_for_layout = "Add new Category";
        }
        
        $this->set(
            array(
                'title_for_layout',
                'cateData'
            ),
            array(
                $title_for_layout,
                $cateData
            )
        );
    }
    
    public function admin_save(){
        
    }
}

