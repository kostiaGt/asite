<?php namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use yii\web\HttpException;
use yii\helpers\Json;

/**
 * Description of BasketController
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class BasketController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    protected $totalSumm = 0;
    protected $totalLength = 0;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd($id, $length)
    {
        $model = Products::findOne($id);

        $length = (int) $length;

        if ($length <= 0)
            $length = 1;

        if (!$model)
            throw new HttpException(404, Yii::t('Product not found'));

        $session = Yii::$app->session->get('basket');

        if (!isset($session[$id])) {

            $product = $this->itemToArray($model, $length);

            if (!empty($product))
                $session[$id] = $product;
            else
                throw new HttpException(501, Yii::t('Error add product item: ' . $id));
        } else {
            $session[$id]['length'] = (int) $session[$id]['length'] + $length;
            $session[$id]['summ'] = (double) $session[$id]['summ'] + ((double) $model->price * $length);
        }

        Yii::$app->session->set('basket', $session);

        $this->recount();

        return Json::encode(['basket' => $session, 'totalSumm' => $this->totalSumm, 'totalSummFormat' => Yii::$app->formatter->asCurrency($this->totalSumm), 'totalLength' => $this->totalLength]);
    }

    protected function itemToArray(Products $model, $length)
    {
        $product = [];
        foreach ($model as $field => $item) {
            if ($field == 'price') {
                $product['summ'] = (double) $item * $length;
            }
            $product[$field] = $item;
        }

        if (!empty($product))
            $product['lenght'] = $length;

        return $product;
    }

    public function actionRecount()
    {
        $length = Yii::$app->request->post('length');
        $session = Yii::$app->session->get('basket');
        
        if (!empty($length) && $session) {
            $this->totalSumm = 0;
            $this->totalLength = 0;
            
            foreach ($length as $id=>$key) {
                if (isset($session[$id]) && isset($session[$id]['length']))  {
                    $session[$id]['length'] = (int) $key;
                    $session[$id]['summ'] = $session[$id]['price'] *  $session[$id]['length'];
                }
            }
            
            Yii::$app->session->set('basket', $session);
            Yii::$app->session->set('basketTotal', ['summ' => $this->totalSumm, 'length' => $this->totalLength]);
        }
        $this->recount();
        return $this->redirect(['/basket']);
    }

    protected function recount()
    {
        $session = Yii::$app->session->get('basket');

        if ($session) {
            foreach ($session as $id => $item) {
                $this->totalSumm += (double) $item['summ'];
                $this->totalLength += (double) $item['length'];
            }

            Yii::$app->session->set('basketTotal', ['summ' => $this->totalSumm, 'length' => $this->totalLength]);
        }
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session->get('basket');

        if (isset($session[$id])) {
            unset($session[$id]);
            Yii::$app->session->set('basket', $session);
            $this->recount();
        }
         return $this->redirect(['/basket']);
    }

    public function actionClear()
    {
        Yii::$app->session->remove('basket');
        Yii::$app->session->remove('basketTotal');
         return $this->redirect(['/basket']);
    }
}
