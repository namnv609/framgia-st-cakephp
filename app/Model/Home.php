<?php
class Home extends AppModel {
    public $useTable = "news";
    
    public function getNewNews(){
        return $this->find("all", array(
            "joins" => array(
                array(
                    "table" => "categories",
                    "type" => "INNER",
                    "alias" => "Cate",
                    "conditions" => "Cate.cateID = Home.newsID"
                )
            ),
            "fields" => array(
                "Home.newsID",
                "Home.newsTitle",
                "Home.newsImage",
                "Home.newsDesc",
                "Home.newsPublished",
                "Home.cateID",
                "Cate.cateName",
            ),
            "conditions" => array("Home.newsStatus" => 1),
            "limit" => 4,
            "order" => array("Home.newsID DESC")
        ));
    }
}
