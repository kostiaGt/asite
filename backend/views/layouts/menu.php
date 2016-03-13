<?php
use Yii;
?>
<ul class="nav nav-list">
    <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? 'active' : ''); ?>">
        <a href="/admin">
            <i class="icon-dashboard"></i>
            <span class="menu-text"> Главная </span>
        </a>
    </li>

    <li class="<?= (Yii::$app->controller->id == 'recept' ? 'active open' : ''); ?>">
        <a class="dropdown-toggle" href="#">
            <i class="icon-desktop"></i>
            <span class="menu-text"> Рецепты </span>

            <b class="arrow icon-angle-down"></b>
        </a>

        <ul class="submenu">
            <li class="<?= (Yii::$app->controller->id == 'recept' && Yii::$app->controller->action->id == 'index' ? 'active' : ''); ?>">
                <a href="/admin/recept">
                    <i class="icon-double-angle-right"></i>
                    Список рецептов
                </a>
            </li>

            <li class="<?= (Yii::$app->controller->id == 'recept'  && (Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update' || Yii::$app->controller->action->id == 'delete')  ? 'active' : ''); ?>">
                <a href="/admin/recept/create">
                    <i class="icon-double-angle-right"></i>
                    Управление 
                </a>
            </li>

          
        </ul>
    </li>
    
    <li class="<?= (Yii::$app->controller->id == 'products' ? 'active open' : ''); ?>">
        <a class="dropdown-toggle" href="#">
            <i class="icon-desktop"></i>
            <span class="menu-text"> Продукты </span>

            <b class="arrow icon-angle-down"></b>
        </a>

        <ul class="submenu">
            <li class="<?= (Yii::$app->controller->id == 'products' && Yii::$app->controller->action->id == 'index' ? 'active' : ''); ?>">
                <a href="/admin/products">
                    <i class="icon-double-angle-right"></i>
                    Список продуктов
                </a>
            </li>

            <li class="<?= (Yii::$app->controller->id == 'products'  && (Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update' || Yii::$app->controller->action->id == 'delete')  ? 'active' : ''); ?>">
                <a href="/admin/recept/products">
                    <i class="icon-double-angle-right"></i>
                    Управление 
                </a>
            </li>

          
        </ul>
    </li>


</ul><!--/.nav-list-->