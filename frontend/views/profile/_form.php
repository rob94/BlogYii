<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'birthdate')->textInput() ?>

    <?//= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'gender_id')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <!--div class="form-group">
        <?//= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php// ActiveForm::end(); ?>

</div-->
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
    <br/>
    <?= $form->field($model, 'birthdate')->textInput() ?>
    * please use YYYY-MM-DD format
    <br/>
    <?= $form->field($model, 'gender_id')->dropDownList($model->genderList,
    ['prompt' => 'Please Choose One' ]);?>
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
