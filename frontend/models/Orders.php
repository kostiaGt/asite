<?php namespace frontend\models;

use common\models\Orders as CommonOrders;
use frontend\models\OrdersProducts;
/**
 * Description of Orders
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class Orders extends CommonOrders
{

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }
    
    public function getProducts()
    {
        return $this->hasMany(OrdersProducts::className(), ["order_id"=>"id"]);
    }
}
