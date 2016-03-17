<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
/**
 * Description of AdminController
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    protected function getGoTo($goDefault = 'update')
    {
        if (isset($_POST['go_to']) && !empty($_POST['go_to']) ) {
            return $_POST['go_to'];
        }
        return $goDefault;
    }

}
