<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Category;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItemsCategory = [];
            $roots = Category::find()->roots()->all();

            if ($roots) {
                foreach ($roots as $index => $root) {



                    $childrens = $root->leaves()->all();
                    if ($childrens) {
                        $menuItemsSubCategory = [];

                        if ($index == 0) {
                            $menuItemsSubCategory[] = [
                                'label' => $root->name,
                                'url' => ['/category/id/' . $root->id]
                            ];
                        }

                        foreach ($childrens as $children) {
                            $menuItemsSubCategory[] = [
                                'label' => $children->name,
                                'url' => ['/category/id/' . $children->id]
                            ];
                        }
                    }



                    $menuItemsCategory[] = [
                        'label' => $root->name,
                        'url' => ['/category/id/' . $root->id],
                        'items' => $menuItemsSubCategory
                    ];
                }
            }
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
              
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            
            $basketToatal = \Yii::$app->session->get('basketTotal');
           
            $menuItems[] = ['label' => 'Basket', 'url' => ['/basket'], 'linkOptions' => [ 'id'=>'basket-menu-batton']];
            if (($basketToatal = \Yii::$app->session->get('basketTotal'))) 
                $menuItems[] = ['label' => Yii::$app->formatter->asCurrency((double)$basketToatal["summ"]).' '.$basketToatal["length"], 'url' => ['/basket'], 'linkOptions' => [ 'id'=>'basket-menu-batton-cost']];
            else
                $menuItems[] = ['label' => 'Empty', 'url' => ['/basket'], 'linkOptions' => [ 'id'=>'basket-menu-batton-cost']];
            
            $menuItems = array_merge($menuItemsCategory, $menuItems);


            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();

            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])

                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
