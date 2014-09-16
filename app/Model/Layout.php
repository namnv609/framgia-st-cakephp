<?php
class Layout extends AppModel {
    var $name = "Layout";
    var $useTable = FALSE;
    
    /**
     * Get all categories
     * 
     * @return array All categories
     */
    public function getAllCategories(){
        $this->setSource('categories');
        
        return $this->find("all", array(
            "conditions" => array(
                "cateStatus" => 1
            ),
            "order" => array("cateID DESC")
        ));
    }
    
    /**
     * Get all website configs
     * 
     * @return array All website configs
     */
    public function gellAllWebConfigs(){
        $this->setSource('configs');
        
        return $this->find('all');
    }
    
    /**
     * Get news for slide
     * 
     * @param array $listIDs List id of news
     * @return array List news
     */
    public function getNewsSlide($listIDs = array()){
        $this->setSource('news');
        
        return $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'type'  => 'INNER',
                    'alias' => 'Cate',
                    'conditions'    => array('Cate.cateID = Layout.cateID'),
                )
            ),
            'conditions'    => array(
                'Layout.newsID' => $listIDs
            ),
            'fields' => array('Layout.*', 'Cate.cateName')
        ));
    }
    
    /**
     * Get featured post for sidebar
     * 
     * @return array List featured news
     */
    public function getFeaturedNews(){
        $this->setSource('news');
        
        return $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'type' => 'INNER',
                    'alias' => 'Cate',
                    'conditions' => array('Cate.cateID = Layout.cateID')
                )
            ),
            'conditions' => array(
                'Layout.newsFeatured' => 1
            ),
            'fields' => array('Layout.*', 'Cate.cateName'),
            'limit' => 6,
            'order' => array('Layout.newsID DESC')
        ));
    }
}
