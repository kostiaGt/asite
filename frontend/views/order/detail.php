<?php
?>

<?php if ($model && isset($model->products)): ?>
<h1><?= \Yii::t('app', 'Order#') ?> <?= $model->code ?> <?= \Yii::$app->formatter->asDatetime($model->created_at) ?></h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= \Yii::t('app', 'Code'); ?></th>
                <th><?= \Yii::t('app', 'Product'); ?></th>
                <th><?= \Yii::t('app', 'Cost'); ?></th>
                <th><?= \Yii::t('app', 'Length'); ?></th>
                <th><?= \Yii::t('app', 'Summ'); ?></th>
                <th><?= \Yii::t('app', 'Date'); ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($model->products as $item): ?>
                <tr>
                    <td width="10%"><?= $item->product_code; ?></td>
                    <td width="50%"><a href="<?= \Yii::$app->sys->getProductUrl(['url'=>$item->product_url]) ?>"><?= $item->product_name; ?></a></td>
                    <td width="10%" ><?= \Yii::$app->formatter->asCurrency($item->price); ?></td>
                    <td  width="10%">

                        <input type="number" min="1" value="<?= $item->length ?>" class="form-control" name="length[<?= $item->id ?>]" id="backet-element-length-<?= $item->id ?>">
                    </td>
                    <td  width="10%"><?= \Yii::$app->formatter->asCurrency($item->summ); ?></td>
                 </tr>
            <?php endforeach; ?>

        </tbody>

    </table>    
<?php else: ?>
    <div class="alert alert-success"><?= Yii::t('app', 'Order not found') ?></div>
<?php endif; ?>
