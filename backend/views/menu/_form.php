<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Lang;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(Yii::$app->sys->dropdownListMenuArray(0, 0, false)) ?>

    <?= $form->field($model, 'status')->dropDownList([ Yii::t("app", "In progress"), Yii::t("app", "Active"), Yii::t("app", "Deleted")]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horisontal')->dropDownList([ '0' =>  Yii::t("app",'N'), '1' =>  Yii::t("app",'Y'), ]) ?>

    <?= $form->field($model, 'horisontal_category')->dropDownList([ 'n' =>  Yii::t("app",'N'), 'y' =>  Yii::t("app",'Y'), ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->dropDownList(ArrayHelper::map(Lang::find()->all(), "local", "name")) ?>

    <?= $form->field($model, 'domain')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
