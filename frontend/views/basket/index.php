<?php
$basket = \Yii::$app->session->get('basket');
$basketTotal = \Yii::$app->session->get('basketTotal');
?>
<h1><?= Yii::t('app', 'Basket') ?></h1>

<?php if ($basket): ?>
<form action="/basket/recount" method="post">
<table class="table table-bordered">
    <thead>
        <tr>
            <th><?= \Yii::t('app', 'Code'); ?></th>
            <th><?= \Yii::t('app', 'Product'); ?></th>
            <th><?= \Yii::t('app', 'Cost'); ?></th>
            <th><?= \Yii::t('app', 'Length'); ?></th>
            <th colspan="2"><?= \Yii::t('app', 'Summ'); ?></th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($basket as $item): ?>
        <tr>
            <td width="10%"><?= $item['code']; ?></td>
            <td width="50%"><a href="<?= Yii::$app->sys->getProductUrl($item) ?>"><?= $item['name']; ?></a></td>
            <td width="10%" align="right"><?= \Yii::$app->formatter->asCurrency($item['price']); ?></td>
            <td  width="10%" align="right">
               
                <input type="number" min="1" value="<?= $item['length'] ?>" class="form-control" name="length[<?= $item['id'] ?>]" id="backet-element-length-<?= $item['id'] ?>">
            </td>
            <td  width="10%" align="right"><?= \Yii::$app->formatter->asCurrency($item['summ']); ?></td>
            <td  width="10%" align="center"><a class="btn btn-danger" href="/basket/delete?id=<?= $item['id'] ?>"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>
<div class="row-fluid">
    <div class="col-xs-6">
    <a class="btn btn-default " href="/basket/clear"><span aria-hidden="true" class="glyphicon glyphicon-trash"></span> <?= Yii::t('app', 'Clear') ?></a>
    <button type="submit" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?= Yii::t('app', 'Recount') ?></button>
    </div>
    <div class="col-xs-6">
        <p class="text-right">
            <strong><?= \Yii::t('app', 'Total') ?>:
            <?= \Yii::$app->formatter->asCurrency($basketTotal['summ']) ?>
           </strong>     
        </p>
    </div>
</div>
</form>
<?php else: ?>
    <div class="alert alert-info">
    <?= Yii::t('app', 'Basket is empty'); ?>
    </div>
<?php endif; ?>



