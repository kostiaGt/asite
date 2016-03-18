<?php
$message = \Yii::$app->session->getFlash('orderSaved');
?>

<?php if ($message): ?>
    <div class="alert alert-success"><?= $message ?></div>
<?php else: ?>
    <div class="alert alert-danger"><?= \Yii::t('app', 'Order not found') ?></div>
<?php endif; ?>

