<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Zelenin\yii\widgets\Summernote\Summernote;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'excerpt')->widget(Summernote::className(),[
            'clientOptions' => [
                'lang' =>'es-ES',
                'toolbar' => [
                    ['style',['bold','italic','underline','clear']],
                    ['font',['strikethrough','superscript','subscript']],
                    ['fontsize',['fontsize']],
                    ['color',['color']],
                    ['para',['ul','ol','paragraph']],
                    ['height',['height']]
                ]
            ],
    ])/*textarea(['rows' => 6])*/ ?>

    <?= $form->field($model, 'body')->widget(Summernote::className(),[
            'clientOptions' => [
                'lang' =>'es-ES',
                'toolbar' => [
                    ['style',['bold','italic','underline','clear']],
                    ['font',['strikethrough','superscript','subscript']],
                    ['fontsize',['fontsize']],
                    ['color',['color']],
                    ['para',['ul','ol','paragraph']],
                    ['height',['height']]
                ]
            ],
    ])/*textarea(['rows' => 6])*/ ?>

    <?= $form->field($model, 'blog_category_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'comment_status')->textInput() ?>

    <?= $form->field($model, 'comment_count')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'publish_up')->textInput() ?>

    <?= $form->field($model, 'publish_down')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
