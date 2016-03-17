<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;
use Yii;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
         'js/underscore.js',
        'js/backbone.js',
        'js/backbone-nested.js',
        'js/backbone.marionette.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
     public function init()
    {
       parent::init();

        if (is_file(Yii::getAlias('@webroot') . '/js/backbone-models.js')) {
            $this->js[] = 'js/backbone-models.js';
        }

        if (is_file(Yii::getAlias('@webroot') . '/js/backbone-views.js')) {
            $this->js[] = 'js/backbone-views.js';
        }

        if (is_file(Yii::getAlias('@webroot') . '/js/main.js'))
            $this->js[] = 'js/main.js';

        if (is_file(Yii::getAlias('@webroot') . '/js/' . Yii::$app->controller->id . '/main.js'))
            $this->js[] = 'js/' . Yii::$app->controller->id . '/main.js';


        if (is_file(Yii::getAlias('@webroot') . '/js/' . Yii::$app->controller->id . '/backbone-models.js')) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/backbone-models.js';
        }

        if (is_file(Yii::getAlias('@webroot') . '/js/' . Yii::$app->controller->id . '/backbone-views.js')) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/backbone-views.js';
        }

        if (is_file(Yii::getAlias('@webroot') . '/js/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id . '.js'))
            $this->js[] = 'js/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id . '.js';



        if (is_file(Yii::getAlias('@webroot') . '/js/' . Yii::$app->controller->id . '/form.js') && (in_array(Yii::$app->controller->action->id, ['create', 'update', 'delete']))) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/form.js';
        }
    }
}
