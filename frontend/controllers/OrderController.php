<?php namespace frontend\controllers;

use Yii;
use frontend\models\Orders;
use frontend\models\OrdersProducts;

class OrderController extends \yii\web\Controller
{

    public function actionCreate()
    {
        $basket = \Yii::$app->session->get('basket');
        $basketTotal = \Yii::$app->session->get('basketTotal');

        if ($basket && $basketTotal) {
            $model = new Orders();
            $orderData = [
                'code' => strtoupper(uniqid()),
                'user_id' => Yii::$app->user->id,
                'status' => 0,
                'summ' => $basketTotal['summ'],
                'length' => $basketTotal['length'],
            ];

            if ($model->load(['Orders' => $orderData]) && $model->save()) {

                foreach ($basket as $basketItem) {
                    $orderProductsData = [
                        'order_id' => $model->id,
                        'user_id' => $model->user_id,
                        'product_id' => $basketItem['id'],
                        'product_code' => $basketItem['code'],
                        'product_name' => $basketItem['name'],
                        'product_url' => Yii::$app->sys->getProductUrl($basketItem['url']),
                        'product_image' => '',
                        'status' => 0,
                        'price' => $basketItem['price'],
                        'summ' => $basketItem['summ'],
                        'length' => $basketItem['length'],
                    ];

                    $orderProductModel = new OrdersProducts();

                    if ($orderProductModel->load(['OrdersProducts' => $orderProductsData]) && $orderProductModel->save()) {
                        Yii::$app->session->setFlash('orderSaved', Yii::t('app', 'Order success'));
                        Yii::$app->session->setFlash('orderCode', $model->code);

                        $user = \common\models\User::findOne(Yii::$app->user->id);

                        Yii::$app->session->setFlash('orderMessage', Yii::t('app', '{host} New order# {order_code}, From: {username} {created_at}', [
                                'host' => Yii::$app->request->getHostInfo(),
                                'order_code' => $model->code,
                                'username' => $user->username,
                                'created_at' => Yii::$app->formatter->asDatetime($model->created_at)
                        ]));
                        Yii::$app->session->remove('basket');
                        Yii::$app->session->remove('basketTotal');
                        return $this->redirect(['order/success', 'code'=>$model->code]);
                    } else {
                        //   var_dump($orderProductModel->getErrors());
                        //  die;
                    }
                }
            } else {
                //  var_dump($model->getErrors());
                // die;
            }
        }

        return $this->render('create');
    }

    public function actionSuccess($code)
    {

        $user = \common\models\User::findOne(Yii::$app->user->id);
    
        if ($user && isset($user->email) && !empty($user->email) && isset(Yii::$app->params['webmaster e-mail']) && !empty(Yii::$app->params['webmaster e-mail'])) {
            Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['webmaster e-mail'])
            ->setTo('to@domain.com')
            ->setSubject( Yii::$app->session->getFlash('orderMessage'))
         //   ->setTextBody('Plain text content')
                ->setHtmlBody( $this->getDetail($code))
                ->send();
        }

        return $this->render('success');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail($code)
    {
        return $this->getDetail($code);
    }

    protected function getDetail($code)
    {
        $model = Orders::find()->joinWith('products')->where("code=:code AND orders.user_id=:user_id", [":code" => $code, ":user_id" => Yii::$app->user->id])->one();

        return $this->renderAjax('detail', ['model' => $model]);
    }
}
