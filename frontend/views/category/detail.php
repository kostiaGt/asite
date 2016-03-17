<?php use yii\widgets\ListView; ?>
<h1><?= $model->name ?></h1>

<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'layout' => "<div class=\"clearfix\"></div>{pager}\n<div class=\"clearfix\"></div>{items}\n<div class=\"clearfix\"></div>{summary}<div class=\"clearfix\"></div>",
    'itemView' => $view,
]);
?>



