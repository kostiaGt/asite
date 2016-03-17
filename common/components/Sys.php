<?php
namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Products;

/**
 * Description of Sys
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class Sys extends Component
{
    public function init()
    {
        
    }
    
    public function getProductUrl($model)
    {
        if ($model instanceof Products)
            return '/product/id/'. $model->id;
        elseif (isset($model['id'])) {
            return '/product/id/'. $model['id'];
        }
    }
}
