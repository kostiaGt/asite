<?php namespace frontend\controllers;

use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use common\models\CategoryProductRelations;

class CategoryController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail($id)
    {
        $model = \frontend\models\Category::findOne($id);
        if (!$model)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

        $products = CategoryProductRelations::find()->joinWith('product')->where(["categoryId" => $model->id]);
        $view = '_items';
        if ($products->count() == 0) {

            $dataProvider = new ActiveDataProvider([
                'query' => $model->leaves(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => $products,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            $view = '_itemsProducts';
        }

        $this->view->title = 'Posts List';

        return $this->render('detail', ['model' => $model, 'dataProvider' => $dataProvider, 'view'=>$view]);
    }
}
