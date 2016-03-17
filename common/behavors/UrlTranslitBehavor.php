<?php

/*
 * Поведение для транслитирации ссылок по названию. 
 * @helper 2amigos/transliterator-helper
 */

namespace common\behavors;

use \yii\base\Behavior;
use \yii\db\ActiveRecord;
use yii\helpers\Inflector;
use dosamigos\transliterator\TransliteratorHelper;

/**
 * Description of UrlTranslitBehavor
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class UrlTranslitBehavor extends Behavior
{
    private $textFieldName;
    private $urlFieldName;
    
    public function setTextFieldName($textFieldName)
    {
        $this->textFieldName = $textFieldName;
    }
    
    public function setUrlFieldName($urlFieldName)
    {
        $this->urlFieldName = $urlFieldName;
    }


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'translit',
            
        ];
    }
    
    public function translit()
    {
        if (empty($this->owner->{$this->urlFieldName}))
            $this->owner->{$this->urlFieldName} = Inflector::slug(TransliteratorHelper::process($this->owner->{$this->textFieldName}), '-', true);
    }
}
