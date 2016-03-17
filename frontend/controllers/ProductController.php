<?php

namespace frontend\controllers;

use Yii;
use common\models\Products;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $model = Products::findOne($id);
        if (!$model)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

        return $this->render('detail', ['model'=>$model]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
