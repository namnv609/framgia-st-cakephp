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
            $pageTitle = "N/A";
        }
        
        $this->set('pageTitle', $pageTitle);
        $this->set('listNews', $listNews);
        $this->set('title_for_layout', $pageTitle);
    }
    
    public function getNewsDetail($newsID = 0){
        $newsDetail = $this->News->find('first', array(
            'joins' => array(
               array(
                   'table' => 'categories',
                   'alias' => 'Cate',
                   'type' => 'INNER',
                   'conditions' => 'Cate.cateID = News.cateID'
               ) 
            ),
            'conditions' => array(
                'newsID' => $newsID
            ),
            'fields' => array('News.*', 'Cate.cateName')
        ));
        
        $this->set('newsDetail', $newsDetail);
        $this->set('title_for_layout', $newsDetail['News']['newsTitle']);
    }

}

