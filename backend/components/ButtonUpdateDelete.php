<?php

namespace backend\components;
 
use yii\grid\ActionColumn;
use Yii;
use yii\helpers\Html;
 
class ButtonUpdateDelete extends ActionColumn {
 
    public $template = '{update} {delete}';
    public $updateAction, $deleteAction;
 
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                return Html::a('<i class="icon-pencil bigger-125"></i>', $url, [
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                return Html::a('<i class="icon-trash bigger-125"></i>', $url, [
                    'title' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            };
        }
    }
} 
