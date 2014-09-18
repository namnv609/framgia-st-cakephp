<?php
class Login extends AppModel {
    public $useTable = 'users';
    public $validate = array(
        'txtUserName' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Email not be blank'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'Email is not valid'
            )
        ),
        'txtPassword' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Password not be blank'
            )
        )
    );
    
    public function userLogin($user){
        return $this->find('first', array(
            'conditions' => array(
                'userEmail' => $user
            )
        ));
    }
}

