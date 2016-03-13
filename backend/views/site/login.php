<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-container container-fluid">
    <div class="main-content">
        <div class="row-fluid">
            <div class="span12">
                <div class="login-container">
                    <div class="row-fluid">
                        <div class="center">
                            <h1>
                                <i class="icon-leaf green"></i>
                                <span class="red">Ace</span>
                                <span class="white">Application</span>
                            </h1>
                            <h4 class="blue">&copy; Company Name</h4>
                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="row-fluid">
                        <div class="position-relative">
                            <div class="login-box visible widget-box no-border" id="login-box">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="icon-coffee green"></i>
                                            Please Enter Your Information
                                        </h4>

                                        <div class="space-6"></div>
                                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>





                                        <fieldset>
                                            <label>
                                                <span class="block input-icon input-icon-right">
                                                    <?= $form->field($model, 'username')->textInput(['class' => 'span12', 'placeholder' => 'e-mail'])->label(false) ?>
                                                    <i class="icon-user"></i>
                                                </span>
                                            </label>

                                            <label>
                                                <span class="block input-icon input-icon-right">
                                                    <?= $form->field($model, 'password')->passwordInput(['class' => 'span12'])->label(false) ?>
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input class="ace" name="LoginForm[rememberMe]" type="checkbox">
                                                    <span class="lbl"> Remember Me</span>
                                                </label>
                                                <?= Html::submitButton('Login', ['class' => 'width-35 pull-right btn btn-small btn-primary', 'name' => 'login-button']) ?>

                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                        <?php ActiveForm::end(); ?>


                                    </div><!--/widget-main-->


                                </div><!--/widget-body-->
                            </div><!--/login-box-->


                        </div><!--/position-relative-->
                    </div>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div>
</div>



