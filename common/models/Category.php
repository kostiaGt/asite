<?php namespace common\models;


use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class Category extends \yii\db\ActiveRecord
{

    use \kartik\tree\models\TreeTrait {
        isDisabled as parentIsDisabled; // note the alias
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public $activeOrig = true;
    
    public $encodeNodeNames = false;

    public function isReadonly()
    {
        return false;
    }

    public $purifyNodeIcons = true;

    /**
     * @var array activation errors for the node
     */
    public $nodeActivationErrors = [];

    /**
     * @var array node removal errors
     */
    public $nodeRemovalErrors = [];

    /**
     * Override isDisabled method if you need as shown in the  
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        // if (Yii::$app->user->username !== 'admin') {
        //   return true;
        // }
        return false;
        //return parent::isDisabled();
    }
    
    public function isLeaf()
    {
        // if (Yii::$app->user->username !== 'admin') {
        //   return true;
        // }
        return true;
        //return parent::isDisabled();
    }

    public function rules()
    {
        $rules = parent::rules();
         $rules[] = ['name', 'required'];
        return $rules;
    }
}
