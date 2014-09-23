<?php
class News extends AppModel {
    public $primaryKey = "newsID";
    public $validate = array(
        'txtNewsID' => array(
            'isValid' => array(
                'rule' => array('numeric', 'notEmpty'),
                'message' => 'News ID is invalid'
            )
        ),
        'txtNewsTitle' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'News title not be blank'
            )
        ),
        'txtNewsImage' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'News image not be blank'
            )
        ),
        'txtNewsDesc' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Short description not be blank'
            )
        ),
        'txtNewsContent' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Content not be blank'
            )
        ),
        'slbCateID' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Category not be blank'
            )
        )
    );
    
    public function getNewsDetail($newsID = 0){
        return $this->find('first', array(
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
    }
    
    
    /**
     * Admin functions
     */
    public function adminGetAllNews(){
        return $this->find("all", array(
            "joins" => array(
                array(
                    "table" => 'categories',
                    "alias" => "Cate",
                    "type" => "INNER",
                    "conditions" => "Cate.cateID = News.cateID"
                )
            ),
            "fields" => array(
                "News.newsID",
                "News.newsTitle",
                "News.newsImage",
                "News.newsPublished",
                "News.newsFeatured",
                "News.cateID",
                "News.newsStatus",
                "Cate.cateName"
            ),
            "order" => array("News.newsID DESC")
        ));
    }
}