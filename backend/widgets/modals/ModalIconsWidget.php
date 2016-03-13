<?php
namespace backend\widgets\modals;

use Yii;
use yii\base\Widget;

/**
 * Description of ModalIconsWidget
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */
class ModalIconsWidget  extends Widget
{
    public $copyElementSelector = '';
    public $usedIcon = '';
    
    public function run()
    {
        return $this->render('icons', ['copyElementSelector'=>$this->copyElementSelector, 'icon'=>$this->usedIcon]);
    }
}
