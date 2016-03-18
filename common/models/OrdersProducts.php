<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders_products".
 *
 * @property integer $id
 * @property string $order_id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $product_code
 * @property double $product_name
 * @property double $product_url
 * @property double $product_image
 * @property integer $status
 * @property double $summ
 * @property integer $length
 * @property string $created_at
 * @property string $updated_at
 */
class OrdersProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'product_id', 'status', 'length'], 'integer'],
            [['product_name', 'product_url', 'product_image', 'product_code'], 'string'],
            [['summ', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_url' => Yii::t('app', 'Product Url'),
            'product_image' => Yii::t('app', 'Product Image'),
            'status' => Yii::t('app', 'Status'),
            'summ' => Yii::t('app', 'Summ'),
            'length' => Yii::t('app', 'Length'),
            'created_at' => Yii::t('app', 'Creted At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return OrdersProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersProductsQuery(get_called_class());
    }
}
