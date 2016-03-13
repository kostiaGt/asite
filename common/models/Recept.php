<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recept".
 *
 * @property integer $id
 * @property string $name
 * @property string $about
 * @property string $language
 */
class Recept extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'recept';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['receptId'], 'integer'],
            [['about'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'about' => Yii::t('app', 'About'),
            'language' => Yii::t('app', 'Language'),
        ];
    }

}
