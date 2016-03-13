<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace backend\assets;

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
        'css/bootstrap.min.css',
        'fonts/css/font-awesome.min.css',
        'css/animate.min.css',
        'css/custom.css',
        'css/maps/jquery-jvectormap-2.0.1.cs',
        'css/icheck/flat/green.css',
        'css/floatexamples.css',
        //  'css/site.css',
    ];
    public $js = [
       
    ];

    public function init()
    {
        parent::init();
        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/backend/web/js/' . Yii::$app->controller->id . '/main.js'))
            $this->js[] = 'js/' . Yii::$app->controller->id . '/main.js';

        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/backend/web/js/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id . '.js'))
            $this->js[] = 'js/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id . '.js';

        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/backend/web/js/' . Yii::$app->controller->id . '/backbone-models.js')) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/backbone-models.js';
        }

        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/backend/web/js/' . Yii::$app->controller->id . '/backbone-views.js')) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/backbone-views.js';
        }

        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/backend/web/js/' . Yii::$app->controller->id . '/form.js') && (in_array(Yii::$app->controller->action->id, ['create', 'update', 'delete']))) {
            $this->js[] = 'js/' . Yii::$app->controller->id . '/form.js';
        }
    }
}
