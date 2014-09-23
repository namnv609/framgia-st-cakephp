<?php
class Category extends AppModel {
    //public $name = "Category";
    public $primaryKey = "cateID";
    public $validate = array(
        'txtCateID' => array(
            'validID' => array(
                'rule' => array('notEmpty', 'numeric'),
                'message' => 'Category ID is invalid'
            )
        ),
        'txtCateName' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Category is not be blank'
            )
        )
    );

    /**
     * Admin functions
     */
    public function admin_getAllCategories(){
        return $this->find("all", array(
            "order" => array("cateID DESC")
        ));
    }
}
