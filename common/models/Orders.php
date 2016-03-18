<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $code
 * @property integer $user_id
 * @property integer $status 0 - new 
 * @property double $summ
 * @property integer $length
 * @property string $created_at
 * @property string $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'length'], 'integer'],
            [['summ'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'summ' => Yii::t('app', 'Summ'),
            'length' => Yii::t('app', 'Length'),
            'created_at' => Yii::t('app', 'Creted At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
