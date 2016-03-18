<?php namespace frontend\models;

use common\models\OrdersProducts as CommonOrdersProducts;

/**
 * Description of OrdersProducts
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class OrdersProducts extends CommonOrdersProducts
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
}
