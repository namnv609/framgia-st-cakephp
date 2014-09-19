<?php
class NewsController extends AppController{

    public function index($cateID = 0) {
        $pageTitle = "All News";
        $options = array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Cate',
                    'type'  => 'INNER',
                    'conditions' => 'Cate.cateID = News.cateID'
                )
            ),
            'fields' => array('News.*', 'Cate.cateName'),
            'limit' => 10,
            'order' => array('News.newsID DESC')
        );
        
        if($cateID > 0){
            $options['conditions'] = array(
                'News.cateID' => $cateID
            );
        }
        
        $listNews = $this->News->find('all', $options);
        
        if($cateID > 0 && isset($listNews[0])){
            $pageTitle = $listNews[0]['Cate']['cateName'];
        }else{
//            $pageTitle = $this->Category->find("first", array(
//                "conditions" => array(
//                    "cateID" => $cateID
//                ),
//                "fields" => array("cateName")
//            ));
            $pageTitle = "News";
        }
        
        $this->set('pageTitle', $pageTitle);
        $this->set('listNews', $listNews);
        $this->set('title_for_layout', $pageTitle);
    }
    
    public function getNewsDetail($newsID = 0){
//        $newsDetail = $this->News->find('first', array(
//            'joins' => array(
//               array(
//                   'table' => 'categories',
//                   'alias' => 'Cate',
//                   'type' => 'INNER',
//                   'conditions' => 'Cate.cateID = News.cateID'
//               ) 
//            ),
//            'conditions' => array(
//                'newsID' => $newsID
//            ),
//            'fields' => array('News.*', 'Cate.cateName')
//        ));
        $newsDetail = $this->News->getNewsDetail($newsID);
        
        $this->set('newsDetail', $newsDetail);
        $this->set('title_for_layout', $newsDetail['News']['newsTitle']);
    }
    

    /**
     * Admin functions
     */
    public function admin_index(){
        
        $this->set(
            array(
                'title_for_layout',
                'listNews'
            ),
            array(
                'News Manage',
                $this->News->adminGetAllNews()
            )
        );
    }
    
    public function admin_edit($newsID = 0){
        $this->loadModel('Category');
        $validationErrs = $this->Session->read('Message.newsFlashMessage.message');
        $this->Session->delete('Message.newsFlashMessage.message');
        
        if($validationErrs != NULL && !empty($validationErrs)){
            $newsID = $this->Session->read('Message.newsIDFlashMessage.message');
            $this->Session->delete('Message.newsIDFlashMessage.message');
        }
        
        $title_for_layout = "Edit news";
        $listCategories = $this->Category->find("all", array("order" => array("cateID DESC")));
        $newsData = $this->News->findByNewsid($newsID);
        
        if(count($newsData) <= 0){
            $title_for_layout = "Add new News";
            $newsData = array(
                "News" => array(
                    "newsID" => 0,
                    "newsTitle" => "",
                    "newsImage" => "",
                    "newsDesc" => "",
                    "newsContent" => "",
                    "newsFeatured" => 0,
                    "cateID" => "",
                    "newsStatus" => 1
                )
            );
        }
        
        $this->set(
            array(
                'title_for_layout',
                'newsData',
                'listCategories',
                'validationErrs'
            ),
            array(
                $title_for_layout,
                $newsData,
                $listCategories,
                $validationErrs
            )
        );
    }
    
    public function admin_save(){
        $validationErrs         = NULL;
        $newsID                 = 0;
        
        if($this->request->is("post")){
            $formPost = $this->request->data;
            $this->News->set($formPost);
            $newsID = $formPost["txtNewsID"];
            
            if($this->News->validates()){
                $this->Session->setFlash('Save news successfull.', NULL);
                
                if($newsID <= 0){
                    $insertData = array(
                        "News" => array(
                            "newsTitle" => $formPost["txtNewsTitle"],
                            "newsImage" => $formPost["txtNewsImage"],
                            "newsDesc" => $formPost["txtNewsDesc"],
                            "newsContent" => $formPost["txtNewsContent"],
                            "newsFeatured" => (int) $formPost["slbNewsFeatured"],
                            "cateID" => (int) $formPost["slbCateID"],
                            "newsStatus" => (int) $formPost["slbNewsStatus"]
                        )
                    );
                    
                    $this->News->save($insertData);
                }else{
                    $this->News->updateAll(
                        array(
                            'newsTitle' => "'" . $formPost["txtNewsTitle"] . "'",
                            'newsImage' => "'" . $formPost["txtNewsImage"] . "'",
                            'newsDesc' => "'" . $formPost["txtNewsDesc"] . "'",
                            'newsContent' => "'" . $formPost["txtNewsContent"] . "'",
                            'cateID' => (int) $formPost["slbCateID"],
                            'newsFeatured' => (int) $formPost["slbNewsFeatured"],
                            'newsStatus' => (int) $formPost["slbNewsStatus"]
                        ),
                        array(
                            'newsID' => (int) $formPost["txtNewsID"]
                        )
                    );
                    
                    $this->redirect(SITE_URL . ADMIN_ALIAS . '/edit-news-' . $newsID);
                }
            }else{
                $validationErrs = $this->News->validationErrors;
            }
            
        }else{
            $this->redirect(SITE_URL . ADMIN_ALIAS . '/news');
        }
        
        $this->Session->setFlash($validationErrs, NULL, NULL, 'newsFlashMessage');
        $this->Session->setFlash($newsID, NULL, NULL, 'newsIDFlashMessage');
        
        $this->setAction('admin_edit');
    }
}

