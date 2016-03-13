<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthRule
 *
 * @author kot
 */

namespace common\components;

use yii\rbac\Rule;

class AuthRule extends Rule {
    public $name = 'isUser';
    
    public function execute($user, $item, $params) {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}
