<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */

/*$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
*/?>
<!-- <div class="profile-update">

    <h1><?/*= Html::encode($this->title) */?></h1>

    <?/*= $this->render('_form', [
        'model' => $model,
    ]) */?>

</div> -->
<?php
$this->title = 'Update '. $model->user->username . "'s Profile ";
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">
<h1><?= Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
'model' => $model,
]) ?>
</div>
