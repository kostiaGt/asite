<?php

namespace common\models;

use Yii;
use common\models\Products;
/**
 * This is the model class for table "categoryProductRelations".
 *
 * @property integer $id
 * @property integer $categoryId
 * @property integer $productId
 */
class CategoryProductRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoryProductRelations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId', 'productId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoryId' => Yii::t('app', 'Category ID'),
            'productId' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryProductRelationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryProductRelationsQuery(get_called_class());
    }
    
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ["id"=> "productId"]);
    }
}
