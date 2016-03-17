<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
use kartik\tree\TreeViewInput;
use common\models\Category;

?>
<hr>
<?php $form = ActiveForm::begin(); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= Yii::t('app', 'Default fields') ?></h2>
            <div class="pull-right">
                <button type="submit" class="btn btn-link form-sections" id="default"><?= Yii::t('app', 'Default fields') ?></button>
                <button type="submit" class="btn btn-link form-sections" id="images"><?= Yii::t('app', 'Images') ?></button>
                <button type="submit" class="btn btn-link form-sections" id="seo"><?= Yii::t('app', 'Seo Tags') ?></button>
                <input type="hidden" name="go_to" id="go-to">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 20px;">

                <?=
                TreeViewInput::widget([
                    // single query fetch to render the tree
                    // use the Product model you have in the previous step
                    'query' => Category::find()->addOrderBy('root, lft'),
                    'headingOptions' => ['label' => 'Categories'],
                    'name' => 'kv-product', // input name
                    'value' => $categoryValues, // values selected (comma separated for multiple select)
                    'asDropdown' => false, // will render the tree input widget as a dropdown.
                    'multiple' => true, // set to false if you do not need multiple selection
                    'fontAwesome' => true, // render font awesome icons
                    'rootOptions' => [
                        'label' => '<i class="fa fa-tree"></i>', // custom root label
                        'class' => 'text-success'
                    ],
                    //'options'=>['disabled' => true],
                ]);

                ?>


            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">


                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>                      

                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'price')->textInput() ?>

                <?= $form->field($model, 'length')->textInput() ?>

                <?= $form->field($model, 'status')->dropDownList($model->statusList(), ['prompt' => Yii::t('app', 'Select status')]) ?>




                <?= $form->field($model, 'searchname')->hiddenInput(['maxlength' => true])->label(false) ?>

                <?= $form->field($model, 'url')->hiddenInput(['maxlength' => true])->label(false) ?>

                <?= $form->field($model, 'created_at')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'deleted_at')->hiddenInput()->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>


            </div>

            
        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>