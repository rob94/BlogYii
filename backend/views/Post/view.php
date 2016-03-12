<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Categories;
/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
       <?php $categories = Categories::find()->where(['id' => $model->blog_category_id])->one(); //modelo basado en la consulta para encontrar el nombre de relacion al post. Esto lo hace la funcion de relacion del modelo, pero por el charset no lo logra completar ?> 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_by',
            'title:ntext',
            'excerpt:html',
            'body:html',
            'blog_category_id',
            //'categories.nombre'
            [
                'attribute' => 'blog_category_id',
                'value' => $categories->nombre //se llama el modelo creado arriba, especificamente el campo nombre
            ],
            'status',
            'comment_status',
            'comment_count',
            'views',
            'publish_up',
            'publish_down',
        ],
    ]) ?>

</div>
