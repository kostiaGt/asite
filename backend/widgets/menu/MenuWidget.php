<?php
/*
 * Admin menu
 */
namespace backend\widgets\menu;

use Yii;
use yii\base\Widget;
use yii\helpers\Inflector;

/*
 * Description of MenuWidget
 *
 * @author Anisimov Kostya <kostiaGm@gmail.com>
 */

class MenuWidget extends Widget
{

    public $isAutoInitMenu = false;
    public $icons = [];
    public $hideControllers = [];
    public $urls = [];
    public $defaultIcon = 'fa fa-edit';
    private $menu;

    public function init()
    {
        $this->menu = include Yii::getAlias('@backend') . '/config/menu.php';
        if ($this->isAutoInitMenu)
            $this->autoInit();
    }

    public function run()
    {
        return $this->render('menu', ['menu' => $this->menu]);
    }

    protected function autoInit()
    {
        $dir = Yii::getAlias("@backend") . '/controllers';
        if (is_dir($dir)) {
            $files = scandir($dir);
            if (!empty($files)) {
                foreach ($files as $file) {
                    if (preg_match('/(.+)Controller\.php/', $file, $arr) && isset($arr[1])) {
                        if (!$this->isItemExists($arr[1]) && !in_array($arr[1], $this->hideControllers)) {
                            $this->menu[] = [
                                'title' => Inflector::camel2words( Yii::t('app', $arr[1])),
                                'icon' => (isset($this->icons[$arr[1]]) ? $this->icons[$arr[1]] : $this->defaultIcon),
                                'items' => [
                                    [
                                        'title' => Yii::t('app', 'Items'),
                                        'url' => '/admin/'.  (isset($this->urls[$arr[1]]) ? $this->urls[$arr[1]] : strtolower($arr[1]))
                                    ],
                                    [
                                        'title' => Yii::t('app', 'Create'),
                                        'url' => '/admin/'. (isset($this->urls[$arr[1]]) ? $this->urls[$arr[1]] : strtolower($arr[1]))  .'/create'
                                    ]
                                ]
                            ];
                        }
                    }
                }
            }
        }
    }

    private function isItemExists($title)
    {
        if (!empty($this->menu)) {
            foreach ($this->menu as $item) {
                if (isset($item['title']) && $item['title'] == $title)
                    return true;
            }
        }
        return false;
    }
}
