<?php namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $searchname
 * @property string $url
 * @property string $code
 * @property double $price
 * @property integer $length
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Products extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
            'UrlTranslitBehavor' => [
                'class' => \common\behavors\UrlTranslitBehavor::className(),
                'textFieldName' => 'name',
                'urlFieldName' => 'url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'status', 'price', 'length'], 'required'],
            [['name', 'code'], 'unique'],
            [['price'], 'number'],
            [['length', 'status'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'searchname', 'url', 'code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'searchname' => Yii::t('app', 'Searchname'),
            'url' => Yii::t('app', 'Url'),
            'code' => Yii::t('app', 'Code'),
            'price' => Yii::t('app', 'Price'),
            'length' => Yii::t('app', 'Length'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }

    public function statusList()
    {
        return [
            Yii::t('app', 'Active'), // Активен
            Yii::t('app', 'Out of stock'), // Снят с продажи
            Yii::t('app', 'Sold'), // Продан
            Yii::t('app', 'Expected on stock'), // Ожидается на складе
        ];
    }
    
   
}
